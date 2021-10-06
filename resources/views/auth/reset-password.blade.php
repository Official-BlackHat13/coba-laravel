<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Saya - {{ $title }}</title>
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
            <h1 class="auth-title">Reset Password</h1>
            <p class="auth-subtitle mb-5">Silahkan reset password anda</p>

            <form action="/auth/reset-password" method="post">
                @csrf
                <div class="form-group position-relative mb-4">
                    <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                    @error('email')
                        <div id="validationMessage" class="invalid-feedback">
                          {{ collect($errors->get('email'))->first() }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Konfirmasi Password" name="password_confirmation">
                </div>
                <input type="hidden" class="form-control form-control-xl" value="{{ $token }}" name="token">
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Reset Password</button>
            </form>
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
