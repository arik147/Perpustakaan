<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Bibliografi</title>
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
    <div class="card-header text-center bg-white">Bibliografi</div>
      
      <div class="card-body">
 
        <div class="py-2 d-flex justify-content-between align-items-center">
  
          <a href="{{ route('biblios.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Insert Data
          </a>
        </div>

        <div class="container d-flex flex-wrap justify-content-center my-4" style="gap: 1.5rem;">
		
          @forelse ($biblios as $biblio)
          <a href="{{ route('biblios.show',['biblio' => $biblio->id]) }}" class="card shadow" style="text-decoration: none; color: black; max-width: 15rem;">
        
            <img src="{{ asset('storage/' . $biblio->image) }}" class="card-img-top"> 
            <div class="card-body">
              <h4 class="mb-1 fs-6 text-start text-muted">{{$biblio->penulis}}</h4>
              <h4 class="fs-5 mt-2 mb-1 text-capitalize card-title text-center fw-bold">{{ $biblio->judul }}</h4>
            </div>
          </a>
          @empty
            <h4 class="fs-5 mt-2 mb-1 text-capitalize card-title text-center fw-bold">Tidak ada Data!</h4>
          @endforelse
        </div>
 
      </div>
  </div>

  <script src="https://kit.fontawesome.com/319d2c5844.js" crossorigin="anonymous"></script>
</body>
</html>