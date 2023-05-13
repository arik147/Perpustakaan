<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>{{$koleksi->kode_buku}}</title>
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
      <h3>{{$koleksi->biblio->judul}}</h3>
      <div class="d-flex">
      <a href="{{ route('koleksis.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
      <a href="{{ route('koleksis.edit',['koleksi' => $koleksi->id]) }}"
        class="btn btn-warning ms-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <form method="POST" action="{{ route('koleksis.destroy',
        ['koleksi' => $koleksi->id]) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger ms-3"><i class="fa-solid fa-trash-can"></i></button>
        </form>
      </div>
    </div>
 
    <hr>

  <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('storage/' . $koleksi->biblio->image) }}" class="img-fluid rounded-start" alt="" style="max-width:300px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <dl class="row">
        <dt class="col-sm-2">Kode Buku </dt>
        <dd class="col-sm-9">{{$koleksi->kode_buku}}</dd>

        <dt class="col-sm-2">Lokasi </dt>
        <dd class="col-sm-9">{{$koleksi->lokasi}}</dd>

        <dt class="col-sm-2">Penerbit </dt>
        <dd class="col-sm-9">{{$koleksi->biblio->penerbit}}</dd>

        <dt class="col-sm-2">Penulis </dt>
        <dd class="col-sm-9">{{$koleksi->biblio->penulis}}</dd>

        <dt class="col-sm-2">Edisi</dt>
        <dd class="col-sm-9">{{$koleksi->biblio->edisi}}</dd>

        <dt class="col-sm-2">Tahun Terbit </dt>
        <dd class="col-sm-9">{{$koleksi->biblio->tahun}}</dd>

        <dt class="col-sm-2">ISBN </dt>
        <dd class="col-sm-9">{{$koleksi->biblio->isbn}}</dd>

        <dt class="col-sm-2">Jumlah Halaman</dt>
        <dd class="col-sm-9">{{$koleksi->biblio->jumlah_halaman}}</dd>

        <dt class="col-sm-2">Kategori</dt>
        <dd class="col-sm-9">{{$koleksi->biblio->kategori}}</dd>

        <dt class="col-sm-2">Sinopsis</dt>
        <dd class="col-sm-9">{{$koleksi->biblio->sinopsis}}</dd>

        <dt class="col-sm-2">Kondisi</dt>
        <dd class="col-sm-9">{{$koleksi->kondisi}}</dd>

        <dt class="col-sm-2">Status</dt>

        @if($koleksi->status === 'dipinjam')
        @foreach ($koleksi->sirkulasis as $sirkulasi)
            @if($sirkulasi->status === 'y')
        <dd class="col-sm-9 text-capitalize btn btn-secondary">{{$koleksi->status}} - {{$sirkulasi->anggota->nama}}</dd>
            @endif
        @endforeach
        @else
        <dd class="col-sm-9 text-capitalize btn btn-success">Tersedia</dd>
        @endif
      </dl>
      </div>
    </div>
  </div>
</div>


<script src="https://kit.fontawesome.com/319d2c5844.js" crossorigin="anonymous"></script>
</body>
</html>