<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
	// header("Content-type: application/vnd-ms-excel");
	// header("Content-Disposition: attachment; filename=Data_Siswa.xlsx");
	?>
	<table class="table table-striped table-hover">
	  <thead>
	    <tr>
	      <th scope="col">No.</th>
	      <th scope="col">Nama</th>
	      <th scope="col">NIS</th>
	      <th scope="col">Email</th>
	      <th scope="col">Jurusan</th>
	      <th scope="col">Kelas</th>
	      <th scope="col">No. HP</th>
	      <th scope="col">Ekstrakurikuler</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach ($students as $siswa)
			<tr>
			  	<td>{{ $loop->iteration }}</td>
			  	<td>{{ $siswa['nama'] }}</td>
			  	<td>{{ $siswa['nis'] }}</td>
			  	<td>{{ $siswa['email'] }}</td>
			  	<td>{{ $siswa['jurusan'] }}</td>
			  	<td>{{ $siswa['kelas'] }}</td>
			  	<td>{{ $siswa['hp_number'] }}</td>
          		<td>{{ $siswa->extracurricular->name }}</td>
			 </tr>
		@endforeach
	  </tbody>
	</table>
</body>
</html>