<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Koleksi</title>
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
    <div class="card-header text-center bg-white">Data Koleksi</div>
      
      <div class="card-body">
 
        <div class="py-2 d-flex justify-content-between align-items-center">
  
          <a href="{{ route('koleksis.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Insert Data
          </a>
        </div>

        @foreach ($biblios as $biblio)
        <div class="card my-3">
          <div class="row g-0 p-4">
            <div class="col-md-4">
              <img src="{{ asset('storage/' . $biblio->image) }}" class="img-fluid rounded-start" alt="" style="max-width:300px;">
            </div>
            <div class="col-md-7">
              <div class="card-body my-2 py-3">
              <h2 class="mb-3 fw-bold text-capitalize">{{$biblio->judul}}</h2>

              <table class="table table-striped">
                <thead>
                  <tr>
                  <th>Kode Buku</th>
                  <th>Kondisi</th>
                  <th>Status</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($koleksis as $koleksi)

                  @if($koleksi->biblio->judul === $biblio->judul)
                  <tr>
                      <td>{{$koleksi->kode_buku}}</td>
                      <td>{{$koleksi->kondisi}}</td>

                      @if($koleksi->status === 'dipinjam')
                      <td class="text-capitalize text-muted" >{{$koleksi->status}}</td>
                      @else
                      <td class="fw-bold" style="color: darkgreen;">Tersedia</td>
                      @endif

                      <td><a href="{{ route('koleksis.show',['koleksi' => $koleksi->id]) }}" class="btn btn-info">
                      <i class="fa-solid fa-eye"></i>
                    </a></td>
                  </tr>
                  @endif

                  @endforeach
                </tbody>
              </table>
              

              </div>
            </div>
          </div>
        </div>
            
        @endforeach
 
      </div>
  </div>
  <script src="https://kit.fontawesome.com/319d2c5844.js" crossorigin="anonymous"></script>
</body>
</html>