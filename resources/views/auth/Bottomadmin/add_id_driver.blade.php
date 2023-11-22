<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
@include('include/navbar')


 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
          </div>
        </div>
      </div>

             <div class="container mt-5">
        <h2 class="mb-4">Form ID Driver</h2>

        <form enctype="multipart/form-data" method="post" action="{{route('auth.Bottomadmin.index.manage.IdDriver.store')}}">
          @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input name="nama" required type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
            </div>

            <div class="mb-3">
                <label for="tanggal-lahir" class="form-label">Tempat & Tanggal Lahir</label>
                <input pattern="[^,]*" placeholder="tempat lahir" class="form-control" required type="text" name="tempat"><br>
                <input name="tanggal" required type="date" class="form-control" id="tanggal-lahir">
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">No. SIM</label>
                <input name="no_sim" required type="text" class="form-control" id="nama" placeholder="No. Surat Ijin Mengemudi">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    </section>

  </main>

@include('include/alerts_header')
</body>
</html>
