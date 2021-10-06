@extends('layouts.main')


@section('container')
<div class="container section" id="{{ $title }}">

  <h1 class="mb-4">Data Siswa</h1>

  @if (session()->has('siswa'))
    <div class="row">
      <div class="col-6">
        <div class="alert alert-{{ session('success_fail') }} alert-dismissible fade show" role="alert">
          Data Siswa{{ session('siswa') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  @endif

  <button type="button" class="btn btn-primary mb-2 tombolTambahData" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>

  <div class="col-6">
    <form action="/siswa">
      @if (request('extracurricular'))
        <input type="hidden" name="extracurricular" value="{{ request('extracurricular') }}">
      @endif
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
	      <th scope="col">NIS</th>
	      <th scope="col">Email</th>
	      <th scope="col">Kelas</th>
	      <th scope="col">Ekstrakurikuler</th>
	      <th></th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach ($data_siswa as $siswa)
			  <tr>
			  	<td>{{ $loop->iteration }}</td>
			  	<td>{{ $siswa->nama }}</td>
			  	<td>{{ $siswa->nis }}</td>
			  	<td>{{ $siswa->email }}</td>
			  	<td>{{ $siswa->kelas }}</td>
          <td><a href="/extracurriculars/{{ $siswa->extracurricular->slug }}">{{ $siswa->extracurricular->name }}</a></td>
			  	<td>
			  		<button class="btn btn-danger tombolHapusData" data-bs-toggle="modal" data-bs-target="#modalPeringatan" data-nis="{{ $siswa->nis }}"><i class="bi bi-trash"></i></button>
			  	</td>
			  	<td>
			  		<button class="btn btn-warning tombolUbahData" data-bs-toggle="modal" data-bs-target="#exampleModal" data-nis="{{ $siswa->nis }}" data-extracurricular="{{ $siswa->extracurricular->name }}"><i class="bi bi-pencil-square"></i> </button>
			  	</td>
			  </tr>
			@endforeach
	  </tbody>
	</table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/siswa" method="post" class="modalForm">
      	@csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('nama'))->first() }}
				      </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}">
            @error('nis')
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('nis'))->first() }}
				      </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('email'))->first() }}
				      </div>
            @enderror
          </div>
          <div class="mb-3">
          	<label for="jurusan" class="form-label">Jurusan</label>
						<input class="form-control @error('jurusan') is-invalid @enderror" list="jurusan-datalist" id="jurusan" placeholder="Type to search..." value="{{ old('jurusan') }}" name="jurusan" autocomplete="off">
						<datalist id="jurusan-datalist">
              <option value="Teknik Komputer Jaringan" id="tkj">
              <option value="Rekayasa Perangkat Lunak" id="rpl">
              <option value="Multimedia" id="mm">
              <option value="Desain Komunikasi Visual" id="dkv">
              <option value="Animasi" id="an">
						</datalist>
            @error('jurusan')
            <div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('jurusan'))->first() }}
				    </div>
            @enderror
          </div>
          <div class="mb-3">
          	<label for="kelas" class="form-label">Kelas</label>
						<input class="form-control @error('kelas') is-invalid @enderror" list="kelas-datalist" id="kelas" placeholder="Type to search..." value="{{ old('kelas') }}" name="kelas" autocomplete="off">
						<datalist id="kelas-datalist">
						  <option value="X TKJ 1" class="xtkj">
              <option value="X TKJ 2" class="xtkj">
              <option value="X TKJ 3" class="xtkj">
              <option value="X RPL 1" class="xrpl">
              <option value="X RPL 2" class="xrpl">
              <option value="X RPL 3" class="xrpl">
              <option value="X MM 1" class="xmm">
              <option value="X MM 2" class="xmm">
              <option value="X MM 3" class="xmm">
              <option value="X MM 4" class="xmm">
              <option value="X MM 5" class="xmm">
              <option value="X MM 6" class="xmm">
              <option value="X DKV" class="xdkv">
              <option value="X AN" class="xan">
						</datalist>
            @error('kelas')
            <div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('kelas'))->first() }}
				      </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="extracurricular" class="form-label">Ekstrakurikuler</label>
            <input class="form-control @error('extracurricular') is-invalid @enderror" list="extracurricular-datalist" id="extracurricular" placeholder="Type to search..." value="{{ old('extracurricular') }}" name="extracurricular" autocomplete="off">
            <datalist id="extracurricular-datalist">
              @foreach ($extracurriculars as $extracurricular)
                <option value="{{ $extracurricular->name }}">
              @endforeach
            </datalist>
            @error('extracurricular')
            <div id="validationMessage" class="invalid-feedback">
                {{ collect($errors->get('extracurricular'))->first() }}
              </div>
            @enderror
          </div>
          <label for="hp_number" class="form-label">No. Telp.</label>
					<div class="input-group mb-3">
					  <span class="input-group-text" id="basic-addon3">+62</span>
					  <input type="number" class="form-control @error('hp_number') is-invalid @enderror" id="hp_number" name="hp_number" value="{{ old('hp_number') }}" aria-describedby="basic-addon3">
					  @error('hp_number')
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('hp_number'))->first() }}
				      </div>
            @enderror
					</div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
            @error('alamat')
            	<div id="validationMessage" class="invalid-feedback">
				        {{ collect($errors->get('alamat'))->first() }}
				      </div>
            @enderror
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
      <form action="{{ url('/siswa/hapus'); }}" method="post" class="modalForm">
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
  // Live search

  // document.querySelector('.inputCari').addEventListener('keyup', function () {
  //   let keyword = this.value;
  //   fetch(`http://127.0.0.1:8000/siswa/cari/${keyword}`)
  //   .then(response => response.json())
  //   .then(response => {
  //     let str = ``;
  //     response.forEach( function(siswa, index) {
  //       str += `
  //       <tr>
  //         <td>${index+1}</td>
  //         <td>${siswa.nama}</td>
  //         <td>${siswa.nis}</td>
  //         <td>${siswa.email}</td>
  //         <td>${siswa.kelas}</td>
  //         <td><a href="http://127.0.0.1:8000/extracurriculars/${siswa.extracurricular.slug}">${siswa.extracurricular.name}</a></td>
  //         <td>
  //           <button class="btn btn-danger tombolHapusData" data-bs-toggle="modal" data-bs-target="#modalPeringatan" data-nis="${siswa.nis}">Hapus</button>
  //         </td>
  //         <td>
  //           <button class="btn btn-warning tombolUbahData" data-bs-toggle="modal" data-bs-target="#exampleModal" data-nis="${siswa.nis}" data-extracurricular="${siswa.extracurricular.name}">Ubah</button>
  //         </td>
  //       </tr>
  //       `;
  //     });
  //     document.querySelector('tbody').innerHTML = str;
  //   })
  //   .catch(error => {
  //     console.error(error);
  //   });
  // });
  
</script>


<script>
  document.querySelector('#jurusan').addEventListener('keyup', function () {
    let jurusan = document.querySelector('#jurusan').value;
    if (jurusan == 'Teknik Komputer Jaringan') {
      let element = `<option value="X TKJ 1">
          <option value="X TKJ 2">
          <option value="X TKJ 3">
          <option value="X TKJ 4">`;
      document.querySelector('#kelas-datalist').innerHTML = element;
    }
    else if (jurusan == 'Rekayasa Perangkat Lunak') {
      let element = `<option value="X RPL 1">
          <option value="X RPL 2">
          <option value="X RPL 3">`;
      document.querySelector('#kelas-datalist').innerHTML = element;
    }
    else if (jurusan == 'Multimedia') {
      let element = `<option value="X MM 1">
          <option value="X MM 2">
          <option value="X MM 3">
          <option value="X MM 4">
          <option value="X MM 5">
          <option value="X MM 6">`;
      document.querySelector('#kelas-datalist').innerHTML = element;
    }
    else if (jurusan == 'Desain Komunikasi Visual') {
      let element = `<option value="X DKV">`;
      document.querySelector('#kelas-datalist').innerHTML = element;
    }
    else if (jurusan == 'Rekayasa Perangkat Lunak') {
      let element = `<option value="X AN">`;
      document.querySelector('#kelas-datalist').innerHTML = element;
    }
    else {
      let element = `<option value="X TKJ 1" class="xtkj">
          <option value="X TKJ 2">
          <option value="X TKJ 3">
          <option value="X RPL 1">
          <option value="X RPL 2">
          <option value="X RPL 3">
          <option value="X MM 1">
          <option value="X MM 2">
          <option value="X MM 3">
          <option value="X MM 4">
          <option value="X MM 5">
          <option value="X MM 6">
          <option value="X DKV">
          <option value="X AN">`;
      document.querySelector('#kelas-datalist').innerHTML = element;
    }
  });
</script>

<script>
  document.querySelector('.tombolTambahData').addEventListener('click', function () {
    document.querySelector('.modal-title').innerHTML = 'Tambah Data Siswa';
    document.querySelector('.modal-footer button[type=submit]').innerHTML = 'Tambah Data';
    document.querySelector('#nama').value = '';
    document.querySelector('#nis').value = '';
    document.querySelector('#email').value = '';
    document.querySelector('#jurusan').value = '';
    document.querySelector('#kelas').value = '';
    document.querySelector('#extracurricular').value = '';
    document.querySelector('#hp_number').value = '';
    document.querySelector('#alamat').value = '';
  });

  let tombolHapusData = document.getElementsByClassName('tombolHapusData');
  for (let i = 0; i < tombolHapusData.length; i++) {
    tombolHapusData[i].addEventListener('click', function() {
      let nis = this.getAttribute('data-nis');
      console.log(nis);
      document.querySelector('#modalPeringatan .modal-dialog .modal-content .modal-header .modal-title').innerHTML = 'Peringatan!!!';
      document.querySelector('#modalPeringatan .modal-dialog .modal-content form .modal-footer button[type=submit]').innerHTML = 'Hapus Data';
      document.querySelector('#modalPeringatan .modal-dialog .modal-content form .modal-body').innerHTML = `
      <input type="hidden" name="nis" id="nis" value="${nis}">
      Anda yakin ingin menghapus data siswa tersebut?
      `;
      document.querySelector('#modalPeringatan .modal-dialog .modal-content form').setAttribute('action', 'http://127.0.0.1:8000/siswa/hapus');
    });
  }

  let tombolUbahData = document.getElementsByClassName('tombolUbahData');
  for (let i = 0; i < tombolUbahData.length; i++) {
    tombolUbahData[i].addEventListener('click', function() {
      document.querySelector('#nama').classList.remove('is-invalid');
      document.querySelector('#nis').classList.remove('is-invalid');
      document.querySelector('#email').classList.remove('is-invalid');
      document.querySelector('#jurusan').classList.remove('is-invalid');
      document.querySelector('#kelas').classList.remove('is-invalid');
      document.querySelector('#extracurricular').classList.remove('is-invalid');
      document.querySelector('#hp_number').classList.remove('is-invalid');
      document.querySelector('#alamat').classList.remove('is-invalid');
      let nis = this.getAttribute('data-nis');
      document.querySelector('.modal-title').innerHTML = 'Ubah Data Siswa';
      document.querySelector('.modal-footer button[type=submit]').innerHTML = 'Ubah Data';
      console.log(nis);
      fetch(`http://127.0.0.1:8000/siswa/getAPI/${nis}`)
      .then(response => response.json())
      .then(response => {
        console.log(response);
        response.hp_number = response.hp_number.replace('(+62)', '').replace(/\s/g, '');
        document.querySelector('#nama').value = response.nama;
        document.querySelector('#nis').value = response.nis;
        document.querySelector('#email').value = response.email;
        document.querySelector('#jurusan').value = response.jurusan;
        document.querySelector('#kelas').value = response.kelas;
        let extracurricular = this.getAttribute('data-extracurricular');
        document.querySelector('#extracurricular').value = extracurricular;
        document.querySelector('#hp_number').value = response.hp_number;
        document.querySelector('#alamat').value = response.alamat;
        let inputId = document.createElement('input');
        inputId.setAttribute('type', 'hidden');
        inputId.setAttribute('name', 'id');
        inputId.value = response.id;
        document.querySelector('.modal-body').appendChild(inputId);
      })
      .catch(e => console.error(e));
    });
  }
</script>

@endsection