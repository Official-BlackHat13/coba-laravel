@extends('layouts.main')


@section('container')
<div class="container section" id="{{ $title }}">

  <h1 class="mb-4">Data Siswa</h1>

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
          <td>{{ $siswa->extracurricular->name }}</td>
			  </tr>
			@endforeach
	  </tbody>
	</table>
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

@endsection