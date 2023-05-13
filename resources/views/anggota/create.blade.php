<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Store Bibliografi</title>
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
    <div class="card-header text-center">Store Data Anggota</div>
    
    <div class="card-body">
      
      <form action="{{ route('anggotas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="nama">Nama</label>
          <input type="text" id="nama" name="nama"
          value="{{ old('nama') }}"
          class="form-control @error('nama') is-invalid @enderror">
          @error('nama')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="nik">NIK</label>
          <input type="text" id="nik" name="nik"
          value="{{ old('nik') }}"
          class="form-control @error('nik') is-invalid @enderror">
          @error('nik')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="alamat">Alamat</label>
          <textarea type="text" id="alamat" name="alamat" placeholder="{{ old('alamat') }}"
          value="{{ old('alamat') }}"
          class="form-control @error('alamat') is-invalid @enderror"></textarea>
          @error('alamat')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="mb-3">
          <label class="form-label" for="penulis">Email</label>
          <input type="email" id="email" name="email"
            value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
          <label class="form-label" for="username">Username</label>
          <input type="text" id="username" name="username"
          value="{{ old('username') }}"
          class="form-control @error('username') is-invalid @enderror">
          @error('username')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input type="password" id="password" name="password"
          value="{{ old('password') }}"
          class="form-control @error('password') is-invalid @enderror">
          @error('password')
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
        
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        <a href="{{ route('anggotas.index') }}" class="btn btn-primary mb-2">
          Cancel
        </a>
      </form>

  </div>
</div>


</body>
</html>
