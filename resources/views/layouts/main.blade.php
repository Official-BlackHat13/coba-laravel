<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Ijabocroptool -->
    <link rel="stylesheet" href="/storage/ijabocroptool/ijaboCropTool.min.css">

    <style>
      * {
        font-family: Nunito, sans-serif;
      }
      .navbar {
        background: #9EC5FE !important;
      }
      a {
        text-decoration: none;
      }
      .user .user-img {
        width: 50px;
        height: 50px;
      }
      .user-name {
        font-size: 20px;
        margin-left: 8px;
      }
      .profile-card img {
        width: 200px;
        height: 200px;
        margin: auto;
      }
      .profile-card input[type=file] {
        display: none;
        opacity: 0;
      }
    </style>

    <title>Website Saya - {{$title}}</title>
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="/">Data Siswa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link{{ Request::is('/siswa') ? ' active' : '' }}" href="/siswa">Siswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link{{ Request::is('/guru') ? ' active' : '' }}" href="/guru">Guru</a>
            </li>
            <li class="nav-item">
              <a class="nav-link{{ Request::is('/about') ? ' active' : '' }}" href="/about">About</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto user">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-flex flex-row align-items-center">
                  <img src="/storage/profile_picture/{{ auth()->user()->picture }}" alt="" class="img-fluid rounded-circle user-img">
                  <div class="user-name">{{ auth()->user()->name }}</div>
                </div>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/auth/profile"><i class="bi bi-person"></i> Profile</a></li>
                <li><a class="dropdown-item" href="/auth/change-password"><i class="bi bi-key"></i> Change Password</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="/auth/logout" method="post">
                  @csrf
                  <li><button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button></li>
                </form>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    @yield('container')


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Jika ada error pada form modal box -->
    <script>
      let error = document.querySelectorAll('#exampleModal .is-invalid');
      if (error.length > 0) {
        let myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
        myModal.show();
      }
    </script>

  </body>
</html>