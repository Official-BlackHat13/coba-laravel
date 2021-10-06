<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
	private $data_mapel = [["kode_mapel" =>"Ing-X", "mata_pelajaran" => "Bahasa Inggris", "kelas" => "X"],
				["kode_mapel" =>"Pemdas-X", "mata_pelajaran" => "Pemrograman Dasar", "kelas" => "X"],
				["kode_mapel" =>"D3G-X", "mata_pelajaran" => "Dasar-Dasar Desain Grafis", "kelas" => "X"],
				["kode_mapel" =>"Mtk-X", "mata_pelajaran" => "Matematika", "kelas" => "X"],
				["kode_mapel" =>"Indo-X", "mata_pelajaran" => "Bahasa Indonesia", "kelas" => "X"],
				["kode_mapel" =>"Komjar-X", "mata_pelajaran" => "Komputer dan Jaringan Dasar", "kelas" => "X"],
				["kode_mapel" =>"Ing-XI", "mata_pelajaran" => "Bahasa Inggris", "kelas" => "XI"],
				["kode_mapel" =>"PBO-XI", "mata_pelajaran" => "Pemrograman Berorientasi Objek", "kelas" => "XI"],
				["kode_mapel" =>"WebPG-XI", "mata_pelajaran" => "Pemrograman Web dan Perangkat Bergerak", "kelas" => "XI"],
				["kode_mapel" =>"DGP-XI", "mata_pelajaran" => "Desain Grafis Percetakan", "kelas" => "XI"],
				["kode_mapel" =>"AIJ-XI", "mata_pelajaran" => "AIJ", "kelas" => "XI"],
				["kode_mapel" =>"Indo-XI", "mata_pelajaran" => "Bahasa Indonesia", "kelas" => "XI"],
				["kode_mapel" =>"Ing-XII", "mata_pelajaran" => "Bahasa Inggris", "kelas" => "XII"],
				["kode_mapel" =>"PBO-XII", "mata_pelajaran" => "Pemrograman Berorientasi Objek", "kelas" => "XII"],
				["kode_mapel" =>"WebPG-XII", "mata_pelajaran" => "Pemrograman Web dan Perangkat Bergerak", "kelas" => "XII"],
				["kode_mapel" =>"DGP-XII", "mata_pelajaran" => "Desain Grafis Percetakan", "kelas" => "XII"],
				["kode_mapel" =>"AIJ-XII", "mata_pelajaran" => "AIJ", "kelas" => "XII"],
				["kode_mapel" =>"Indo-XII", "mata_pelajaran" => "Bahasa Indonesia", "kelas" => "XII"]];

    public function index()
    {
        return view('teacher.index', [
        	"title" => "Guru",
        	"data_teacher" => Teacher::filter(request(['search']))->get()->sortBy('teacher_id'),
        	"data_mapel" => $this->data_mapel
        ]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
        	'nama' => 'required',
        	'teacher_id' => 'required|unique:teachers',
        	'email' => 'required|email:rfc,filter|unique:teachers',
        	'nik' => 'required|unique:teachers',
        	'mapel_id' => 'required',
        	'hp_number' => 'required|integer',
        	'alamat' => 'required'
        ]);

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
        	// error
        }

        $affected = DB::table('teachers')->insertGetId([
        	'nama' => ucwords($validated['nama']),
        	'teacher_id' => $validated['teacher_id'],
        	'email' => $validated['email'],
        	'mapel_id' => $validated['mapel_id'],
        	'nik' => $validated['nik'],
        	'hp_number' => $validated['hp_number'],
        	'alamat' => $validated['alamat']
        ]);

        if ($affected > 0) {
            $request->session()->flash('guru', ' berhasil ditambahkan');
            $request->session()->flash('success_fail', 'success');
        }
        else {
            $request->session()->flash('guru', ' gagal ditambahkan');
            $request->session()->flash('success_fail', 'danger');
        }
        return redirect('/guru');
    }

    public function getAPI($teacher_id)
    {
    	$teacher_id = '0021.'. $teacher_id;
    	$data = Teacher::all()->where('teacher_id', $teacher_id);
    	$datafiltered = [];
    	foreach ($data as $value) {
    	    return json_encode($value);
    	}
    }

    public function hapus(Request $request)
    {
    	$teacher_id = $request->input('teacher_id');
        $affected = DB::table('teachers')->where('teacher_id', $teacher_id)->delete();
        if ($affected > 0) {
            $request->session()->flash('guru', ' berhasil dihapus');
            $request->session()->flash('success_fail', 'success');
        }
        else {
            $request->session()->flash('guru', ' gagal dihapus');
            $request->session()->flash('success_fail', 'danger');
        }
        return redirect('/guru');
    }

    public function ubah(Request $request)
    {
    	$validated = $request->validate([
        	'nama' => 'required',
        	'teacher_id' => 'required',
        	'email' => 'required|email:rfc,filter',
        	'nik' => 'required',
        	'mapel_id' => 'required',
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
        else {
        	// error
        }

    	$id = intval($request->input('id'));
        $affected = DB::table('teachers')
              ->where('id', $id)
              ->update([
              	'nama' => ucwords($validated['nama']),
	        	'teacher_id' => $validated['teacher_id'],
	        	'email' => $validated['email'],
	        	'nik' => $validated['nik'],
	        	'mapel_id' => $validated['mapel_id'],
	        	'hp_number' => $validated['hp_number'],
	        	'alamat' => $validated['alamat']
          ]);
        
        if ($affected > 0) {
            $request->session()->flash('guru', ' berhasil diubah');
            $request->session()->flash('success_fail', 'success');
        }
        else {
            $request->session()->flash('guru', ' gagal diubah');
            $request->session()->flash('success_fail', 'danger');
        }
        return redirect('/guru');
    }

    public function cari($keyword)
    {
        $data = DB::table('teachers')->where('nama', 'like', '%'.$keyword.'%')->get();
        return $data->toJson();
    }
}
