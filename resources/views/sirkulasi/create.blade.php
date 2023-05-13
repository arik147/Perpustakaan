<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Store Sirkulasi</title>
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


<div class="container card shadow py-3 px-5 mt-5">
    <div class="card-header text-center bg-white">Store Data Sirkulasi</div>
    
    <div class="card-body">
      
      <form action="{{ route('sirkulasis.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label me-3" for="koleksi_id">Koleksi</label>
          <select class="form-select" name="koleksi_id" id="koleksi_id">

            @foreach ($koleksis as $koleksi)
            
            <option value="{{ $koleksi->id }}">{{$koleksi->kode_buku}} : {{$koleksi->biblio->judul}}</option>

            @endforeach
          </select>
          @error('judul')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label me-3" for="anggota_id">Anggota</label>
          <select class="form-select" name="anggota_id" id="anggota_id">

            @foreach ($anggotas as $anggota)
            
            <option value="{{ $anggota->id }}">{{$anggota->nik}} - {{$anggota->nama}}</option>

            @endforeach
          </select>
          @error('judul')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="lama_pinjam">Lama Pinjam</label>

          <select class="form-select" name="lama_pinjam" id="lama_pinjam">
          <option value="1" selected>1 Hari</option>
          <option value="3">3 Hari</option>
          <option value="7">7 Hari</option>


          </select>
            @error('lama_pinjam')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        <a href="{{ route('sirkulasis.index') }}" class="btn btn-primary mb-2">
          Cancel
        </a>
      </form>

  </div>
</div>

</body>
</html>
