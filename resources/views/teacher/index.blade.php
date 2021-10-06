@extends('layouts.main')


@section('container')
<div class="container section" id="{{ $title }}">

  <h1 class="mb-4">Data Guru</h1>

  @if (session()->has('guru'))
    <div class="row">
      <div class="col-6">
        <div class="alert alert-{{ session('success_fail') }} alert-dismissible fade show" role="alert">
          Data Guru{{ session('guru') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  @endif

  <button type="button" class="btn btn-primary mb-2 tombolTambahData" data-bs-toggle="modal" data-bs-target="#exampleModalTeacherTeacher">Tambah Data</button>

  <div class="col-6">
    <form action="/guru">
    	<div class="input-group mb-3">
  		  <input type="text" class="form-control inputCari" placeholder="Masukkan pencarian" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
  		  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
  		</div>
    </form>
  </div>
  
  <table class="table table-striped table-hover">
	  <thead>
	    <tr>
	      <th scope="col">No.</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Kode Guru</th>
	      <th scope="col">Email</th>
	      <th scope="col">Kode Mapel</th>
	      <th scope="col">No. Telepon</th>
	      <th></th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach ($data_teacher as $guru)
			  <tr>
			  	<td>{{ $loop->iteration }}</td>
			  	<td>{{ $guru['nama'] }}</td>
			  	<td>{{ $guru['teacher_id'] }}</td>
			  	<td>{{ $guru['email'] }}</td>
			  	<td>{{ $guru['mapel_id'] }}</td>
			  	<td>{{ $guru['hp_number'] }}</td>
			  	<td>
			  		<button class="btn btn-danger tombolHapusData" data-bs-toggle="modal" data-bs-target="#modalPeringatan" data-teacher_id="{{ $guru['teacher_id'] }}"><i class="bi bi-trash"></i></button>
			  	</td>
			  	<td>
			  		<button class="btn btn-warning tombolUbahData" data-bs-toggle="modal" data-bs-target="#exampleModalTeacherTeacher" data-teacher_id="{{ $guru['teacher_id'] }}" data-id="{{ $guru['id'] }}"><i class="bi bi-pencil-square"></i></button>
			  	</td>
			  </tr>
			@endforeach
	  </tbody>
	</table>
</div>


<div class="modal fade" id="exampleModalTeacherTeacher" tabindex="-1" aria-labelledby="exampleModalTeacherLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" data-error="{{ ($errors->any()) ? 'true' : 'false' }}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalTeacherLabel">Tambah Data Guru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/guru/tambah'); }}" method="post" class="modalForm">
      	@csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control{{ ($errors->has('nama')) ? ' is-invalid' : '' }}" id="nama" name="nama" value="{{ old('nama') }}">
            @if ($errors->has('nama'))
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('nama'))->first() }}
				      </div>
            @endif
          </div>
          <div class="mb-3">
            <label for="teacher_id" class="form-label">Kode Guru</label>
            <input type="text" class="form-control{{ ($errors->has('teacher_id')) ? ' is-invalid' : '' }}" id="teacher_id" name="teacher_id" value="{{ old('teacher_id') }}">
            @if ($errors->has('teacher_id'))
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('teacher_id'))->first() }}
				      </div>
            @endif
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control{{ ($errors->has('email')) ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('email'))->first() }}
				      </div>
            @endif
          </div>
          <div class="mb-3">
          	<label for="nik" class="form-label">NIK</label>
						<input type="number" class="form-control{{ ($errors->has('nik')) ? ' is-invalid' : '' }}" list="nik-datalist" id="nik" value="{{ old('nik') }}" name="nik" autocomplete="off">
            @if ($errors->has('nik'))
            <div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('nik'))->first() }}
				      </div>
            @endif
          </div>
          <div class="mb-3">
          	<label for="mapel_id" class="form-label">Mata Pelajaran</label>
            <select class="form-select{{ ($errors->has('mapel_id')) ? ' is-invalid' : '' }}" aria-label="Default select example" id="mapel_id" name="mapel_id" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1; this.blur();">
              @foreach ($data_mapel as $mapel)
                @if ($errors->any())
                  @if (old('mapel_id') == $mapel['kode_mapel'])
                    <option value="{{ $mapel['kode_mapel'] }}" selected="selected" class="mapel">{{ $mapel['mata_pelajaran']. ' (' .$mapel['kelas'].')' }}</option>
                  @else
                    <option value="{{ $mapel['kode_mapel'] }}" class="mapel">{{ $mapel['mata_pelajaran']. ' (' .$mapel['kelas'].')' }}</option>
                  @endif
                @else
                  <option value="{{ $mapel['kode_mapel'] }}" class="mapel">{{ $mapel['mata_pelajaran']. ' (' .$mapel['kelas'].')' }}</option>
                @endif
              @endforeach
            </select>
            @if ($errors->has('mapel_id'))
            <div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('mapel_id'))->first() }}
				    </div>
            @endif
          </div>
          <label for="hp_number" class="form-label">No. Telp.</label>
					<div class="input-group mb-3">
					  <span class="input-group-text" id="basic-addon3">+62</span>
					  <input type="number" class="form-control{{ ($errors->has('hp_number')) ? ' is-invalid' : '' }}" id="hp_number" name="hp_number" value="{{ old('hp_number') }}" aria-describedby="basic-addon3">
					  @if ($errors->has('hp_number'))
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('hp_number'))->first() }}
				      </div>
            @endif
					</div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control{{ ($errors->has('alamat')) ? ' is-invalid' : '' }}" id="alamat" name="alamat" value="{{ old('alamat') }}">
            @if ($errors->has('alamat'))
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('alamat'))->first() }}
				      </div>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalPeringatan" tabindex="-1" aria-labelledby="modalPeringatanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPeringatanLabel">Peringatan!!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/guru/hapus'); }}" method="post" class="modalForm">
      	@csrf
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  
  let error = document.querySelector('#exampleModalTeacherTeacher .modal-dialog .modal-content').getAttribute('data-error');
  console.log(error);
  if (error == 'true') {
    let myModal = new bootstrap.Modal(document.getElementById('exampleModalTeacherTeacher'), {});
    myModal.show();
  }

  document.querySelector('.tombolTambahData').addEventListener('click', function () {
    document.querySelector('.modal-title').innerHTML = 'Tambah Data Guru';
    document.querySelector('.modal-footer button[type=submit]').innerHTML = 'Tambah Data';
    document.querySelector('#nama').value = '';
    document.querySelector('#teacher_id').value = '';
    document.querySelector('#email').value = '';
    document.querySelector('#nik').value = '';
    document.querySelector('#mapel_id').value = '';
    document.querySelector('#hp_number').value = '';
    document.querySelector('#alamat').value = '';
    document.querySelector('.modal-content form').setAttribute('action', 'http://127.0.0.1:8000/guru/tambah');
  });

  let tombolHapusData = document.getElementsByClassName('tombolHapusData');
  for (let i = 0; i < tombolHapusData.length; i++) {
    tombolHapusData[i].addEventListener('click', function() {
      let teacher_id = this.getAttribute('data-teacher_id');
      console.log(teacher_id);
      document.querySelector('#modalPeringatan .modal-dialog .modal-content .modal-header .modal-title').innerHTML = 'Peringatan!!!';
      document.querySelector('#modalPeringatan .modal-dialog .modal-content form .modal-footer button[type=submit]').innerHTML = 'Hapus Data';
      document.querySelector('#modalPeringatan .modal-dialog .modal-content form .modal-body').innerHTML = `
      <input type="hidden" name="teacher_id" id="teacher_id" value="${teacher_id}">
      Anda yakin ingin menghapus data guru tersebut?
      `;
      document.querySelector('#modalPeringatan .modal-dialog .modal-content form').setAttribute('action', 'http://127.0.0.1:8000/guru/hapus');
    });
  }

  let tombolUbahData = document.getElementsByClassName('tombolUbahData');
  for (let i = 0; i < tombolUbahData.length; i++) {
    tombolUbahData[i].addEventListener('click', function() {
      let teacher_id = this.getAttribute('data-teacher_id');
      teacher_id = teacher_id.split('.');
      teacher_id = teacher_id[1];
      document.querySelector('.modal-title').innerHTML = 'Ubah Data Guru';
      document.querySelector('.modal-footer button[type=submit]').innerHTML = 'Ubah Data';
      fetch(`http://127.0.0.1:8000/guru/getAPI/${teacher_id}`)
      .then(response => response.json())
      .then(response => {
        console.log(response);
        response.hp_number = response.hp_number.replace('(+62)', '').replace(/\s/g, '');
        document.querySelector('#nama').value = response.nama;
        document.querySelector('#teacher_id').value = response.teacher_id;
        document.querySelector('#email').value = response.email;
        document.querySelector('#nik').value = response.nik;
        document.querySelector(`.mapel[value=${response.mapel_id}]`).setAttribute('selected', 'selected');
        document.querySelector('#hp_number').value = response.hp_number;
        document.querySelector('#alamat').value = response.alamat;
        document.querySelector('.modal-content form').setAttribute('action', 'http://127.0.0.1:8000/guru/ubah');
        let inputId = document.createElement('input');
        inputId.setAttribute('type', 'hidden');
        inputId.setAttribute('name', 'id');
        inputId.value = response.id;
        document.querySelector('.modal-body').appendChild(inputId);
      })
      .catch(e => console.error(e));
    });
  }


  // Live search

  // document.querySelector('.inputCari').addEventListener('keyup', function () {
  //   let keyword = this.value;
  //   fetch(`http://127.0.0.1:8000/guru/cari/${keyword}`)
  //   .then(response => response.json())
  //   .then(response => {
  //     let str = ``;
  //     response.forEach( function(guru, index) {
  //       str += `
  //       <tr>
  //         <td>${index+1}</td>
  //         <td>${guru.nama}</td>
  //         <td>${guru.teacher_id}</td>
  //         <td>${guru.email}</td>
  //         <td>${guru.nik}</td>
  //         <td>${guru.mapel_id}</td>
  //         <td>
  //           <button class="btn btn-danger tombolHapusData" data-bs-toggle="modal" data-bs-target="#modalPeringatan" data-teacher_id="${guru.teacher_id}">Hapus</button>
  //         </td>
  //         <td>
  //           <button class="btn btn-warning tombolUbahData" data-bs-toggle="modal" data-bs-target="#exampleModalTeacher">Ubah</button>
  //         </td>
  //       </tr>
  //       `;
  //     });
  //     document.querySelector('tbody').innerHTML = str;
  //   })
  //   .catch(error => {
  //     // 
  //   });
  // });

</script>

@endsection