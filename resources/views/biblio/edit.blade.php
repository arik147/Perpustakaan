<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Update Bibliografi</title>
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
 
<div class="container card shadow py-3 px-5 mt-5 mb-5">
    <div class="card-header text-center bg-white">Update Data Bibliografi</div>
    
    <div class="card-body">
 
      <form action="{{ route('biblios.update',['biblio' => $biblio->id]) }} " enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
 
        <div class="mb-3">
          <label class="form-label" for="judul">Judul</label>
          <input type="text" id="judul" name="judul"
            value="{{ old('judul') ?? $biblio->judul }}"
            class="form-control @error('judul') is-invalid @enderror">
          @error('judul')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="penulis">Penulis</label>
          <input type="text" id="penulis" name="penulis"
            value="{{ old('penulis') ?? $biblio->penulis }}"
            class="form-control @error('penulis') is-invalid @enderror">
          @error('penulis')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="penerbit">Penerbit</label>
          <input type="text" id="penerbit" name="penerbit"
            value="{{ old('penerbit') ?? $biblio->penerbit }}"
            class="form-control @error('penerbit') is-invalid @enderror">
          @error('penerbit')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="edisi">Edisi</label>
          <input type="text" id="edisi" name="edisi"
            value="{{ old('edisi') ?? $biblio->edisi }}"
            class="form-control @error('edisi') is-invalid @enderror">
          @error('edisi')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="tahun">Tahun terbit</label>
          <input type="date" id="tahun" name="tahun"
            value="{{ old('tahun') ?? $biblio->tahun }}"
            class="form-control @error('tahun') is-invalid @enderror">
          @error('tahun')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="isbn">ISBN</label>
          <input type="text" id="isbn" name="isbn"
            value="{{ old('isbn') ?? $biblio->isbn }}"
            class="form-control @error('isbn') is-invalid @enderror">
          @error('isbn')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="kategori">Kategori</label>
          <input type="text" id="kategori" name="kategori"
            value="{{ old('kategori') ?? $biblio->kategori }}"
            class="form-control @error('kategori') is-invalid @enderror">
          @error('kategori')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="jumlah_halaman">Jumlah Halaman</label>
          <input type="text" id="jumlah_halaman" name="jumlah_halaman"
            value="{{ old('jumlah_halaman') ?? $biblio->jumlah_halaman }}"
            class="form-control @error('jumlah_halaman') is-invalid @enderror">
          @error('jumlah_halaman')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Gambar</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
          @error('image')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="sinopsis">Sinopsis</label>
          <textarea type="textarea" id="sinopsis" name="sinopsis" placeholder="{{ old('sinopsis') ?? $biblio->sinopsis }}"
            value="{{ old('sinopsis') ?? $biblio->sinopsis }} "
            class="form-control @error('sinopsis') is-invalid @enderror" style="height: 100px"></textarea>
          @error('sinopsis')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2">Update</button>

        <a href="{{ route('biblios.show',['biblio' => $biblio->id]) }}" class="btn btn-warning mb-2">
          Cancel
        </a>
      </form>
 
    </div>
</div>
 
</body>
</html>
