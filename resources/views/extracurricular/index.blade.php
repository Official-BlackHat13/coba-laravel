@extends('layouts.main')


@section('container')
<div class="container section" id="{{ $title }}">

  <h1 class="mb-4">{{ $title }}</h1>

  @foreach ($extracurriculars as $extracurricular)
    <div class="col--8">
      <h4><a href="{{ url('extracurriculars/'. $extracurricular->slug) }}" style="color: #000;">{{ $loop->iteration }}.  {{ $extracurricular->name }}</a></h4>
    </div>
  @endforeach

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
  document.querySelector('.inputCari').addEventListener('keyup', function () {
    let keyword = this.value;
    fetch(`http://127.0.0.1:8000/siswa/cari/${keyword}`)
    .then(response => response.json())
    .then(response => {
      let str = ``;
      response.forEach( function(siswa, index) {
        str += `
        <tr>
          <td>${index+1}</td>
          <td>${siswa.nama}</td>
          <td>${siswa.nis}</td>
          <td>${siswa.email}</td>
          <td>${siswa.jurusan}</td>
          <td>${siswa.kelas}</td>
          <td>
            <button class="btn btn-danger tombolHapusData" data-bs-toggle="modal" data-bs-target="#modalPeringatan" data-nis="${siswa.nis}">Hapus</button>
          </td>
          <td>
            <button class="btn btn-warning tombolUbahData" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah</button>
          </td>
        </tr>
        `;
      });
      document.querySelector('tbody').innerHTML = str;
    })
    .catch(error => {
      // 
    });
  });
  
</script>

@endsection