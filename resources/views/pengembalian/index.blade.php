<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Pengembalian</title>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-md-flex justify-content-between
    align-items-center" id="navbar">
    <ul class="navbar-nav mr-auto">
        <a href="{{url('/')}}" class="fs-4 fw-bold text-decoration-none" style="color:white;">Perpusku</a>
      </ul>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/biblios')}}">
            Bibliografi
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/anggotas')}}">
            Anggota
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/koleksis')}}">
            Koleksi
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/sirkulasis')}}">
            Sirkulasi
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/pengembalians')}}">
            Pengembalian
        </a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

  @if(session()->has('pesan'))
  <div class="alert alert-success">
    {{ session()->get('pesan')}}
  </div>
  @endif

  <div class="container card shadow py-3 px-5 my-4">
    <div class="card-header text-center bg-white">Data Pengembalian</div>
      
      <div class="card-body">
 
        <table class="table table-striped">
          <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengembalians as $pengembalian)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$pengembalian->sirkulasi->anggota->nama}}</td>
                <td>{{$pengembalian->sirkulasi->koleksi->kode_buku}}</td>
                <td>{{$pengembalian->sirkulasi->koleksi->biblio->judul}}</td>
                <td>{{$pengembalian->sirkulasi->tanggal_pinjam}}</td>
                <td>{{$pengembalian->tanggal_kembali}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
  <script src="https://kit.fontawesome.com/319d2c5844.js" crossorigin="anonymous"></script>
</body>
</html>