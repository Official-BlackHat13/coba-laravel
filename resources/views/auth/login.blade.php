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
            <h2 class="auth-title">Log in.</h2>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

            @if (session()->has('auth') || session()->has('reset_password'))
            <div class="row mb-1">
              <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ (session()->has('auth')) ? session('auth') : session('reset_password') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
            @elseif (session()->has('login'))
            <div class="row mb-1">
              <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('login') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
            @endif

            <form action="/auth" method="post">
                @csrf
                <div class="form-group position-relative mb-4">
                    <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div id="validationMessage" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" name="remember_me" value="true">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="/auth/register" class="font-bold">Sign
                        up</a>.</p>
                <p><a class="font-bold" href="/auth/forgot-password">Forgot password?</a>.</p>
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
