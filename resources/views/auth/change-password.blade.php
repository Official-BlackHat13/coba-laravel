@extends('layouts.main')


@section('container')
<div class="container section mt-4" id="{{ $title }}">
  <h1 class="text-center">Ubah Password</h1>
  <div class="row justify-content-center">
    <div class="col-lg-6">
      @if (session()->has('success'))
      <div class="row mb-1">
        <div class="col">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
      @elseif (session()->has('error'))
      <div class="row mb-1">
        <div class="col">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
      @endif
      <form action="/auth/change-password" method="post">
        @csrf
        <div class="mb-3">
          <label for="password_lama" class="form-label">Password Lama</label>
          <input type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama" name="password_lama">
          @error('password_lama')
            <div id="validationMessage" class="invalid-feedback">
              {{ collect($errors->get('password_lama'))->first() }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password_baru" class="form-label">Password Baru</label>
          <input type="password" class="form-control @error('password_baru') is-invalid @enderror" id="password_baru" name="password_baru">
          @error('password_baru')
            <div id="validationMessage" class="invalid-feedback">
              {{ collect($errors->get('password_baru'))->first() }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password_baru_confirm" class="form-label">Konfirmasi Password Baru</label>
          <input type="password" class="form-control @error('password_baru_confirm') is-invalid @enderror" id="password_baru_confirm" name="password_baru_confirm">
          @error('password_baru_confirm')
            <div id="validationMessage" class="invalid-feedback">
              {{ collect($errors->get('password_baru_confirm'))->first() }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <button type="submit" name="submit" class="btn btn-primary">Ganti Password</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection