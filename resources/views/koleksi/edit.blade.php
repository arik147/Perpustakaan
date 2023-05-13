<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Update Koleksi</title>
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
    <div class="card-header text-center bg-white">Update Data Bibliografi</div>
    
    <div class="card-body">
 
      <form action="{{ route('koleksis.update',['koleksi' => $koleksi->id]) }}"
        method="POST">
        @method('PUT')
        @csrf
 
        <div class="mb-3">
          <label class="form-label me-3" for="biblio_id">Judul Buku</label>
          <select class="form-select" name="biblio_id" id="biblio_id">

            @foreach ($biblios as $biblio)
            
            <option value="{{ $biblio->id }}">{{$biblio->judul}}</option>

            @endforeach
          </select>
          @error('judul')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="mb-3">
          <label class="form-label" for="kode_buku">Kode Buku</label>
          <input type="text" id="kode_buku" name="kode_buku"
            value="{{ old('kode_buku') ?? $koleksi->kode_buku }}"
            class="form-control @error('kode_buku') is-invalid @enderror">
            @error('kode_buku')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
          <label class="form-label" for="lokasi">Lokasi Penyimpanan</label>
          <input type="text" id="lokasi" name="lokasi"
          value="{{ old('lokasi') ?? $koleksi->lokasi }}"
          class="form-control @error('lokasi') is-invalid @enderror">
          @error('lokasi')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="kondisi">Kondisi</label>
          <input type="text" id="kondisi" name="kondisi"
          value="{{ old('kondisi') ?? $koleksi->kondisi }}"
          class="form-control @error('kondisi') is-invalid @enderror">
          @error('kondisi')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        
 
        <button type="submit" class="btn btn-primary mb-2">Update</button>

        <a href="{{ route('koleksis.show',['koleksi' => $koleksi->id]) }}" class="btn btn-primary mb-2">
          Cancel
        </a>
      </form>
 
    </div>
</div>
 
</body>
</html>
