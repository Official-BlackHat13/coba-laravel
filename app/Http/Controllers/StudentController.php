<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\School_Schedule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa_auth = Student::where('nis', auth()->user()->kode_warga_sekolah)->get()->first();
        if (Gate::allows('admin')) {
            return view('siswa.dashboard', [
                'title' => 'Siswa',
                'data_siswa' => Student::with('extracurricular')->filter(request(['search', 'extracurricular']))->get()->sortBy('nis'),
                'extracurriculars' => Extracurricular::all(),
            ]);
        }
        return view('siswa.index', [
            'title' => 'Siswa',
            'data_siswa' => Student::with('extracurricular')->where('kelas', $siswa_auth->kelas)->filter(request(['search', 'extracurricular']))->get()->sortBy('nis'),
            'data_mapel' => School_Schedule::where('kelas', $siswa_auth->kelas)->get(),
            'extracurriculars' => Extracurricular::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $validated['extracurricular_id'] = Extracurricular::all()->where('name', $validated['extracurricular'])->pluck('id')->first();
        unset($validated['extracurricular']);

        Student::create($validated);
        
        $request->session()->flash('siswa', ' berhasil ditambahkan');
        $request->session()->flash('success_fail', 'success');
        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
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

        $id = intval($request->input('id'));
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

        $student = Student::find($id);
        $student->nama = $validated['nama'];
        $student->nis = $validated['nis'];
        $student->jurusan = $validated['jurusan'];
        $student->kelas = $validated['kelas'];
        $student->email = $validated['email'];
        $student->extracurricular_id = Extracurricular::where('name', $validated['extracurricular'])->get()->first()->id;
        $student->hp_number = $validated['hp_number'];
        $student->alamat = $validated['alamat'];

        $student->save();

        $request->session()->flash('siswa', ' berhasil diubah');
        $request->session()->flash('success_fail', 'success');
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {

    }

    public function getAPI(Student $siswa)
    {
        Gate::authorize('admin');

        return json_encode($siswa);
    }
}
