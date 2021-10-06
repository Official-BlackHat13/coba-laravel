<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Saya - {{$title}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/storage/css_js/bootstrap.css">
    <link rel="stylesheet" href="/storage/css_js/app.css">
    <link rel="stylesheet" href="/storage/css_js/auth.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-6 col-12">
        <div id="auth-left">
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

            @if (session()->has('fail'))
            <div class="row mb-1">
              <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('fail') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
            @endif

            <form action="/auth/register" method="post">
                @csrf
                <div class="form-group position-relative mb-4">
                    <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="text" class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="text" class="form-control form-control-xl @error('kode_warga_sekolah') is-invalid @enderror" placeholder="NIS" name="kode_warga_sekolah" value="{{ old('kode_warga_sekolah') }}">
                    @error('kode_warga_sekolah')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password">
                    @error('password')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" name="password_confirmation">
                    @error('password_confirmation')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="/auth" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>

    <script src="/storage/css_js/bootstrap.bundle.min.js"></script>
    
    <script src="/storage/css_js/main.js"></script>
</body>

</html>
