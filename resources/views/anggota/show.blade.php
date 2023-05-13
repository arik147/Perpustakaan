<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>{{$anggota->nama}}</title>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-md-flex justify-content-between align-items-center" id="navbar">
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
<div class="alert alert-success" role="alert">
    {{ session()->get('pesan')}}
</div>
@endif

<div class="container mt-3">
  <div class="row">
    <div class="col-12">
 
    <div class="pt-3 d-flex justify-content-between align-items-center">
      <h3>{{$anggota->nama}}</h3>
      <div class="d-flex">
      <a href="{{ route('anggotas.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
      <a href="{{ route('anggotas.edit',['anggota' => $anggota->id]) }}"
        class="btn btn-warning ms-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <form method="POST" action="{{ route('anggotas.destroy',
        ['anggota' => $anggota->id]) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger ms-3"><i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>
    </div>
 
    <hr>

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="{{ asset('storage/' . $anggota->image) }}" class="img-fluid rounded-start" alt="" style="max-width:300px;">
    </div>
    <div class="col-md-7">
      <div class="card-body p-5">
        <dl class="row">
        <dt class="col-sm-3">NIK</dt>
        <dd class="col-sm-7">{{$anggota->nik}}</dd>

        <dt class="col-sm-3">Alamat</dt>
        <dd class="col-sm-7">{{$anggota->alamat}}</dd>
        
        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-7">{{$anggota->email}}</dd>

        <dt class="col-sm-3">Username</dt>
        <dd class="col-sm-7">{{$anggota->username}}</dd>

      </dl>
      </div>
    </div>
  </div>
</div>
 

    <div class="container card mt-3 shadow py-3 px-5 mt-5 mb-5">
      <div class="card-header text-center bg-white">Sedang Dipinjam</div>
        
        <div class="card-body">
  
          <table class="table table-striped">
            <thead>
              <tr>
              <th>Kode Buku</th>
              <th>Judul</th>
              <th>Tanggal Pinjam</th>
              <th>Lama Pinjam</th>
              </tr>
            </thead>
            <tbody class="text-capitalize">
              @forelse ($anggota->sirkulasis as $sirkulasi)
              <tr>

                @if ($sirkulasi->status === 'y')
                  <td>{{$sirkulasi->koleksi->kode_buku}}</td>
                  <td>{{$sirkulasi->koleksi->biblio->judul}}</td>
                  <td>{{$sirkulasi->tanggal_pinjam}}</td>
                  <td>{{$sirkulasi->lama_pinjam}} hari</td>
                @endif

              </tr>
              @empty
              <td colspan="6" class="text-center">Tidak ada data...</td>
              @endforelse
            </tbody>
          </table>
        </div>
        
    </div>

    <div class="container card mt-3 shadow py-3 px-5 mt-5 mb-5">
      <div class="card-header text-center bg-white">Riwayat Transaksi</div>
        
        <div class="card-body">
  
          <table class="table table-striped">
            <thead>
              <tr>
              <th>Kode Buku</th>
              <th>Judul</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Pengembalian</th>
              </tr>
            </thead>
            <tbody class="text-capitalize">
              @forelse ($anggota->sirkulasis as $sirkulasi)
              <tr>

                @if ($sirkulasi->status === 'n')
                  <td>{{$sirkulasi->koleksi->kode_buku}}</td>
                  <td>{{$sirkulasi->koleksi->biblio->judul}}</td>
                  <td>{{$sirkulasi->tanggal_pinjam}}</td>
                  <td>{{$sirkulasi->pengembalian->tanggal_kembali}}</td>
                @endif

              </tr>
              @empty
              <td colspan="6" class="text-center">Tidak ada data...</td>
              @endforelse
            </tbody>
          </table>
        </div>
        
    </div>
 
<script src="https://kit.fontawesome.com/319d2c5844.js" crossorigin="anonymous"></script>
</body>
</html>