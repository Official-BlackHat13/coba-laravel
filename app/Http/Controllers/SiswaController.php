<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('siswa.dashboard', [
                'title' => 'Siswa',
                'data_siswa' => Student::with('extracurricular')->filter(request(['search', 'extracurricular']))->get()->sortBy('nis'),
                'extracurriculars' => Extracurricular::all()
            ]);
        }
        
        return view('siswa.index', [
            'title' => 'Siswa',
            'data_siswa' => Student::with('extracurricular')->filter(request(['search', 'extracurricular']))->get()->sortBy('nis'),
            'extracurriculars' => Extracurricular::all()
        ]);
    }

    public function tambah(Request $request)
    {
        Gate::authorize('admin');

        $validated = $request->validate([
        	'nama' => 'required',
        	'nis' => 'required|unique:students',
        	'email' => 'required|email:rfc,filter|unique:students',
        	'jurusan' => 'required',
        	'kelas' => 'required',
            'extracurricular' => 'required',
        	'hp_number' => 'required|integer',
        	'alamat' => 'required'
        ]);

        $validated['nama'] = ucwords($validated['nama']);

        // Ubah tulisan nomor hp
        $validated['hp_number'] = strval($validated['hp_number']);
        if (strlen($validated['hp_number']) == 11) {
            $validated['hp_number'] = '(+62) '. Str::substr($validated['hp_number'], 0, 3). ' ' .Str::substr($validated['hp_number'], 3, 4). ' ' .Str::substr($validated['hp_number'], 7, 4);
        }
        else if (strlen($validated['hp_number']) == 10) {
            $validated['hp_number'] = '(+62) '. Str::substr($validated['hp_number'], 0, 2). ' ' .Str::substr($validated['hp_number'], 2, 4). ' ' .Str::substr($validated['hp_number'], 6, 4);
        }
        else if (strlen($validated['hp_number']) == 9) {
            $validated['hp_number'] = '(+62) '. Str::substr($validated['hp_number'], 0, 2). ' ' .Str::substr($validated['hp_number'], 2, 4). ' ' .Str::substr($validated['hp_number'], 6, 3);
        }
        else {
            return back()->withError(['hp_number' => 'Nomor hp tidak valid']);
        }

        // Ekstrakurikuler
        $validated['extracurricular_id'] = Extracurricular::all()->where('name', $validated['extracurricular'])->pluck('id')[0];

        $affected = DB::table('students')->insertGetId([
        	'nama' => $validated['nama'],
        	'nis' => $validated['nis'],
        	'email' => $validated['email'],
        	'jurusan' => $validated['jurusan'],
        	'kelas' => $validated['kelas'],
            'extracurricular_id' => $validated['extracurricular_id'],
        	'hp_number' => $validated['hp_number'],
        	'alamat' => $validated['alamat']
        ]);

        if ($affected > 0) {
            $request->session()->flash('siswa', ' berhasil ditambahkan');
            $request->session()->flash('success_fail', 'success');
        }
        else {
            $request->session()->flash('siswa', ' gagal ditambahkan');
            $request->session()->flash('success_fail', 'danger');
        }
        return redirect('/siswa');
    }

    public function getAPI(Student $siswa)
    {
        Gate::authorize('admin');

        return json_encode($siswa);
    }

    public function hapus(Request $request, User $user)
    {
        Gate::authorize('admin');

    	$nis = intval($request->input('nis'));
        $affected = DB::table('students')->where('nis', $nis)->delete();
        if ($affected > 0) {
        	$request->session()->flash('siswa', ' berhasil dihapus');
            $request->session()->flash('success_fail', 'success');
        }
        else {
            $request->session()->flash('siswa', ' gagal dihapus');
            $request->session()->flash('success_fail', 'danger');
        }
        return redirect('/siswa');
    }

    public function ubah(Request $request)
    {
        Gate::authorize('admin');

    	$validated = $request->validate([
        	'nama' => 'required',
        	'nis' => 'required',
        	'email' => 'required|email:rfc,filter',
        	'jurusan' => 'required',
        	'kelas' => 'required',
            'extracurricular' => 'required',
        	'hp_number' => 'required',
        	'alamat' => 'required'
        ]);

        // Ubah tulisan no. hp
        $validated['hp_number'] = strval($validated['hp_number']);
        if (strlen($validated['hp_number']) == 11) {
            $validated['hp_number'] = '(+62) '. Str::substr($validated['hp_number'], 0, 3). ' ' .Str::substr($validated['hp_number'], 3, 4). ' ' .Str::substr($validated['hp_number'], 7, 4);
        }
        else if (strlen($validated['hp_number']) == 10) {
            $validated['hp_number'] = '(+62) '. Str::substr($validated['hp_number'], 0, 2). ' ' .Str::substr($validated['hp_number'], 2, 4). ' ' .Str::substr($validated['hp_number'], 6, 4);
        }
        else if (strlen($validated['hp_number']) == 9) {
            $validated['hp_number'] = '(+62) '. Str::substr($validated['hp_number'], 0, 2). ' ' .Str::substr($validated['hp_number'], 2, 4). ' ' .Str::substr($validated['hp_number'], 6, 3);
        }

    	$id = intval($request->input('id'));
        $validated['extracurricular'] = Extracurricular::all()->where('name', $validated['extracurricular'])->pluck('id')[0];

        $affected = DB::table('students')
              ->where('id', $id)
              ->update([
              	'nama' => ucwords($validated['nama']),
	        	'nis' => $validated['nis'],
	        	'email' => $validated['email'],
	        	'jurusan' => $validated['jurusan'],
	        	'kelas' => $validated['kelas'],
                'extracurricular_id' => $validated['extracurricular'],
	        	'hp_number' => $validated['hp_number'],
	        	'alamat' => $validated['alamat']
          ]);
        
        if ($affected > 0) {
            $request->session()->flash('siswa', ' berhasil diubah');
            $request->session()->flash('success_fail', 'success');
        }
        else {
            $request->session()->flash('siswa', ' gagal diubah');
            $request->session()->flash('success_fail', 'danger');
        }
        return redirect('/siswa');
    }

    public function cari($keyword)
    {
        $data = Student::with('extracurricular')->where('nama', 'like', '%'. $keyword . '%')->orWhere('email', 'like', '%'. $keyword . '%');
        return $data->get()->sortBy('nis')->toJson();
    }
}
