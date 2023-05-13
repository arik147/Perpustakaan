<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Sirkulasi</title>
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
    <div class="card-header text-center bg-white">Data Sirkulasi</div>
      
      <div class="card-body">
 
        <div class="py-2 d-flex justify-content-between align-items-center">
  
          <a href="{{ route('sirkulasis.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Insert Data
          </a>
        </div>
 
        <table class="table table-striped">
          <thead>
            <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Anggota</th>
            <th>Tanggal Pinjam</th>
            <th>Lama Pinjam</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @forelse ($sirkulasis as $sirkulasi)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$sirkulasi->koleksi->kode_buku}}</td>
                <td>{{$sirkulasi->koleksi->biblio->judul}}</td>
                <td>{{$sirkulasi->anggota->nama}}</td>
                <td>{{$sirkulasi->tanggal_pinjam}}</td>
                <td>{{$sirkulasi->lama_pinjam}} Hari</td>

                <td>
                <div class="d-flex">
                  <form method="POST" action="{{ route('sirkulasis.destroy', ['sirkulasi' => $sirkulasi->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-success ms-2"><i class="fa-solid fa-check"></i></button>
                    </form>
                </div>
                </td>
            </tr>
            @empty
              <td colspan="7" class="text-center">Tidak ada data...</td>
              @endforelse
          </tbody>
        </table>
      </div>
  </div>
  <script src="https://kit.fontawesome.com/319d2c5844.js" crossorigin="anonymous"></script>
</body>
</html>