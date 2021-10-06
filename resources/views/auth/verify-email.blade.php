@component('mail::message')
# Verifikasi Email

<p>Silahkan klik tombol verifikasi email di bawah ini untuk memverifikasi email anda. Jika anda merasa tidak pernah mendaftar sebagai user di sistem kami, maka abaikan saja email ini.</p>

<p>Link ini akan hangus dalam waktu 60 menit. Jika link ini sudah hangus, anda bisa klik <a href="{{ $resend }}">disini</a> untuk mendapatkan link verifikasi yang baru. Kami akan mengirim link verifikasi yang baru via email.</p>

@component('mail::button', ['url' => $url])
Verifikasi Email

@endcomponent

Thanks,<br>
Tim Website Saya
@endcomponent