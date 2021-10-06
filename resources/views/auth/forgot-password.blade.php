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
            <h1 class="auth-title">Forgot Password</h1>
            <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>

            @if (session()->has('forgot_password'))
            <div class="row mb-1">
              <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('forgot_password') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
            @endif

            <form action="/auth/forgot-password" method="post">
                @csrf
                <div class="form-group position-relative mb-4">
                    <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Send</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Remember your account? <a href="/auth" class="font-bold">Log in</a>.
                </p>
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
