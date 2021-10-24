<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CobaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;
use App\Models\Extracurricular;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Notifications\VerifikasiEmail;

Route::get('/', [HomeController::class, 'index'])->middleware(['auth']);
Route::get('/siswa', [StudentController::class, 'index']);
Route::post('/siswa/tambah', [StudentController::class, 'tambah'])->middleware(['auth']);
Route::post('/siswa/hapus', [StudentController::class, 'hapus'])->middleware(['auth']);
Route::post('/siswa/ubah', [StudentController::class, 'ubah'])->middleware(['auth']);
Route::get('/about', [AboutController::class, 'index'])->middleware(['auth']);

Route::get('/siswa/getAPI/{siswa:nis}', [StudentController::class, 'getAPI'])->middleware(['auth']);

Route::get('extracurriculars/{extracurricular:slug}', function (Extracurricular $extracurricular) {
	return view('extracurricular.extracurricular', [
		'title' => 'Ekstrakurikuler',
		'students' => $extracurricular->students,
		'extracurricular' => $extracurricular->name
	]);
})->middleware(['auth']);
Route::get('extracurriculars/', function () {
	return view('extracurricular.index', [
		'title' => 'Ekstrakurikuler',
		'extracurriculars' => Extracurricular::all()
	]);
})->middleware('auth');

Route::get('/guru', [TeacherController::class, 'index'])->middleware(['auth']);
Route::post('/guru/tambah', [TeacherController::class, 'tambah'])->middleware(['auth']);
Route::post('/guru/hapus', [TeacherController::class, 'hapus'])->middleware(['auth']);
Route::post('/guru/ubah', [TeacherController::class, 'ubah'])->middleware(['auth']);
Route::get('/guru/getAPI/{teacher:teacher_id}', [TeacherController::class, 'getAPI'])->middleware(['auth']);
Route::get('/guru/cari/{keyword}', [TeacherController::class, 'cari'])->middleware(['auth']);


// Login dan register
Route::get('/auth', [UserController::class, 'index'])->middleware(['guest'])->name('login');
Route::post('/auth', [UserController::class, 'authenticate'])->middleware(['guest']);
Route::get('/auth/register', [UserController::class, 'sign_up'])->middleware('guest');
Route::post('/auth/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/auth/logout', [UserController::class, 'logout'])->middleware('auth');


// Forgot Password
Route::get('/auth/forgot-password', function () {
    return view('auth.forgot-password', ['title' => 'Forgot Password']);
})->middleware('guest')->name('password.request');

Route::post('/auth/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['forgot_password' => 'Kami sudah kirimkan email berupa link untuk reset password'])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/auth/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['title' => 'Forgot Password', 'token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/auth/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect('/auth')->with('reset_password', 'Password berhasil direset')
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


// Verifikasi Email (manual)
Route::get('/auth/notification-verify', function () {
    return view('auth.verify-notification', ['title' => 'Verifikasi Email']);	
})->middleware('guest')->name('verification.notice');

Route::get('/auth/email-verification', function (Request $request)
{
	$user = User::find($request->id);
	if ($request->token != $user->email_verify_token || intval($request->expired) < time()) {
		return abort(403, 'Link ini sudah hangus atau tidak bisa digunakan');
	}
	$user->email_verified_at = now();
	$user->email_verify_token = null;
	$user->save();
	$request->session()->forget('email-verification');
	return redirect('/auth')->with('auth', 'Email anda sudah terverifikasi');
});
Route::get('/auth/resend-verification', function (Request $request) {
    $user = User::find($request->id);
    $user->email_verify_token = Str::random(rand(15,25));
    $user->save();
    $expired = time()+3600;
    session(['email-verification' => $expired]);
    $user->notify(new VerifikasiEmail($user->id, $user->email_verify_token, $user->name, $expired));
    return redirect('/auth/notification-verify');
});


// Settings Profile
Route::get('/auth/change-password', function () {
	return view('auth.change-password', ['active' => '', 'title' => 'Ubah Password']);
})->middleware('auth');
Route::post('/auth/change-password', [UserController::class, 'changePassword'])->middleware('auth');
Route::get('/auth/profile', function () {
    return view('auth.change-profile', ['title' => 'Ubah Profil']);
});
Route::post('auth/profile/crop-image', [UserController::class, 'changePicture'])->name('crop');