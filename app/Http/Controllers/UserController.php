<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\School_Schedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Notifications\VerifikasiEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        // $schedule = [
        //     [
        //         'kelas' => 'X RPL 1',
        //         'hari' => 'Senin',
        //         'jam_1' => 'Bahasa Inggris',
        //         'jam_2' => 'Bahasa Inggris',
        //         'jam_3' => 'Pemrograman Dasar',
        //         'jam_4' => 'Pemrograman Dasar',
        //         'jam_5' => 'Dasar Dasar Desain Grafis',
        //         'jam_6' => 'Dasar Dasar Desain Grafis',
        //         'jam_7' => 'Matematika',
        //         'jam_8' => 'Matematika',
        //         'istirahat' => '4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kelas' => 'X RPL 1',
        //         'hari' => 'Selasa',
        //         'jam_1' => 'Pendidikan Agama & Budi Pekerti',
        //         'jam_2' => 'Pendidikan Agama & Budi Pekerti',
        //         'jam_3' => 'Seni Budaya',
        //         'jam_4' => 'Seni Budaya',
        //         'jam_5' => 'Sejarah Indonesia',
        //         'jam_6' => 'Sejarah Indonesia',
        //         'jam_7' => 'Bahasa Indonesia',
        //         'jam_8' => 'Bahasa Indonesia',
        //         'istirahat' => '4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kelas' => 'X RPL 1',
        //         'hari' => 'Rabu',
        //         'jam_1' => 'Pemrograman Dasar',
        //         'jam_2' => 'Pemrograman Dasar',
        //         'jam_3' => 'Simulasi dan Komunikasi Digital',
        //         'jam_4' => 'Komputer dan Jaringan Dasar',
        //         'jam_5' => 'Matematika',
        //         'jam_6' => 'Matematika',
        //         'jam_7' => 'Kimia',
        //         'jam_8' => 'Kimia',
        //         'istirahat' => '4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kelas' => 'X RPL 1',
        //         'hari' => 'Kamis',
        //         'jam_1' => 'Pendidikan Agama & Budi Pekerti',
        //         'jam_2' => 'Pendidikan Agama & Budi Pekerti',
        //         'jam_3' => 'Komputer dan Jaringan Dasar',
        //         'jam_4' => 'Komputer dan Jaringan Dasar',
        //         'jam_5' => 'Bahasa Indonesia',
        //         'jam_6' => 'Bahasa Indonesia',
        //         'jam_7' => 'Bahasa Inggris',
        //         'jam_8' => 'Kimia',
        //         'istirahat' => '4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kelas' => 'X RPL 1',
        //         'hari' => 'Jumat',
        //         'jam_1' => null,
        //         'jam_2' => 'Seni Budaya',
        //         'jam_3' => 'Pendidikan Agama & Budi Pekerti',
        //         'jam_4' => 'PKN',
        //         'jam_5' => 'PKN',
        //         'jam_6' => 'Fisika',
        //         'jam_7' => 'Sejarah Indonesia',
        //         'jam_8' => null,
        //         'istirahat' => '4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kelas' => 'X RPL 1',
        //         'hari' => 'Sabtu',
        //         'jam_1' => 'Simulasi dan Komunikasi Digital',
        //         'jam_2' => 'Simulasi dan Komunikasi Digital',
        //         'jam_3' => 'Bahasa Bali',
        //         'jam_4' => 'Bahasa Bali',
        //         'jam_5' => 'Dasar Dasar Desain Grafis',
        //         'jam_6' => 'Dasar Dasar Desain Grafis',
        //         'jam_7' => 'Fisika',
        //         'jam_8' => 'Fisika',
        //         'istirahat' => '4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ];
        // DB::table('school__schedules')->insert($schedule);
        
        return view('auth.login', [
        	'title' => 'Login'
        ]);
    }

    public function sign_up()
    {
        return view('auth.register', [
        	'title' => 'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
        	'username' => 'required|unique:users|max:255',
            'kode_warga_sekolah' => 'required|unique:users',
        	'email' => 'required|email:rfc,filter|unique:users',
        	'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => 'required',
        ]);

        $siswa = Student::where('nis', $validatedData['kode_warga_sekolah'])->get()->first();

        if (is_null($siswa)) {
            return back()->with('fail', 'Registrasi gagal')->withInput();
        }
        if ($siswa->email !== $validatedData['email']) {
            return back()->with('fail', 'Registrasi gagal')->withInput();
        }

        $validatedData['name'] = $siswa->nama;
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $user->email_verify_token = Str::random(rand(15,25));

        $user->save();

        $expired = time()+3600;

        $user->notify(new VerifikasiEmail($user->id, $user->email_verify_token, $user->name, $expired));

        // event(new Registered($user));

        return redirect('/auth/notification-verify');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,filter',
            'password' => 'required'
        ]);

        $remember = ($request->input('remember_me') == 'true') ? true : false;

        $user = User::where('email', $credentials['email'])->get()->first();

        if (Auth::attempt($credentials, $remember)) {
            if ($user->email_verified_at == null) {
                return back()->with('login', 'Email belum terverifikasi');
            }
            $request->session()->regenerate();
            return redirect()->intended('/siswa');
        }

        return back()->with([
            'login' => 'Login gagal',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

	    $request->session()->invalidate();

	    $request->session()->regenerateToken();

	    $request->session()->flash('auth', 'Anda berhasil logout');

	    return redirect('/auth');
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'password_baru_confirm' => 'required|min:5|same:password_baru'
        ]);
        $user = User::find(auth()->user()->id);
        if (!Hash::check($validatedData['password_lama'], $user->password)) {
            $request->session()->flash('error', 'Password gagal diubah');
            return back();
        }
        $user->password = Hash::make($validatedData['password_baru']);
        $user->save();
        return back()->with('success', 'Password berhasil diubah');
    }

    public function changePicture(Request $request)
    {
        $path = 'storage/profile_picture';
        $file = $request->file('profile_picture');
        $new_image_name = 'user-' . auth()->user()->username .'.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        if ($upload) {
            $user = User::find(auth()->user()->id);
            $user->picture = $new_image_name;
            $user->save();
            return response()->json(['status'=>1, 'msg'=>'Foto profil berhasil diubah', 'name'=>$new_image_name]);
        } else {
            return response()->json(['status'=>0, 'msg'=>'Foto profil gagal diubah']);
        }
    }
}
