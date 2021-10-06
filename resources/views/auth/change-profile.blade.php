@extends('layouts.main')


@section('container')
<div class="container section mt-4" id="{{ $title }}">
  <h1 class="text-center">{{ $title }}</h1>
  <div class="row justify-content-between mt-4">
    <div class="col-lg-4">
      <div class="card profile-card" style="width: 100%;">
        <img src="/storage/profile_picture/{{ auth()->user()->picture }}" class="card-img-top rounded-circle mt-3 img-thumbnail user-img">
        <div class="card-body text-center">
          <h5 class="card-title text-center mb-4">{{ auth()->user()->name }}</h5>
          <input type="file" name="profile_picture" id="profile_picture">
          <a href="javascript:void(0)" class="btn btn-primary change-btn" style="background: #33adff; border: #33adff;">Pilih Gambar</a>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card profile-card" style="width: 100%; padding: 20px 30px;">
        <h3 class="text-center mb-4">Data Pribadi</h3>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input class="form-control" type="email" value="{{ auth()->user()->email }}" aria-label="readonly input example" readonly id="email">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input class="form-control" type="username" value="{{ auth()->user()->username }}" id="username">
          </div>
        </div>
        <div class="col">
          <a href="/auth/change-profile" class="btn btn-primary change-btn" style="background: #33adff; border: #33adff;">Simpan Perubahan</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<script src="/storage/ijabocroptool/ijaboCropTool.min.js"></script>

<script>
  $(document).ready(function () {

    $(document).on('click', '.change-btn', function () {
      $('#profile_picture').click();
    });
    $('#profile_picture').on('change', function (e) {
      console.log(e);
    });

    $('#profile_picture').ijaboCropTool({
      preview : '.user-img',
      setRatio:1,
      allowedExtensions: ['jpg', 'jpeg','png'],
      buttonsText:['CROP','QUIT'],
      buttonsColor:['#30bf7d','#ee5155', -15],
      processUrl:'{{ route("crop") }}',
      withCSRF:['_token','{{ csrf_token() }}'],
      onSuccess:function(message, element, status){
         // alert(message);
         var myModal = new bootstrap.Modal(document.getElementById('myModal'));
         $('#myModal .modal-body').html(message);
         myModal.show();

      },
      onError:function(message, element, status){
        // alert(message);
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        $('#myModal .modal-body').html(message);
        myModal.show();
      }
    });

  });
</script>


@endsection