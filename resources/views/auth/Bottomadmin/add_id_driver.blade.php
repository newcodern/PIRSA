<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
@include('include/navbar')
@include('include/sidebar')


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
                <input placeholder="tempat lahir" class="form-control" required type="text" name="tempat"><br>
                <input name="tanggal" required type="date" class="form-control" id="tanggal-lahir">
            </div>

            <div class="mb-3">
                <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                <select required name="jenis_kelamin" class="form-select" id="jenis-kelamin">
                    <option selected value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nomor-telepon" class="form-label">Tinggi</label>
                <input required name="tinggi_badan" type="number" class="form-control" id="nomor-telepon" placeholder="Tinggi Badan">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input required name="foto" type="file" class="form-control" id="foto">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    </section>

  </main>


</body>
</html>
