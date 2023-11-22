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
    <h2>Form Tambah Kendaraan</h2>
    <form action="{{route('auth.Bottomadmin.index.manage.kendaraan.add.run')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nopol" class="form-label">Nopol</label>
            <input type="text" class="form-control" id="nopol" name="nopol" required>
        </div>

        <div class="mb-3">
            <label for="kir_headtruck" class="form-label">KIR Headtruck</label>
            <input type="text" class="form-control" id="kir_headtruck" name="kir_headtruck" required>
        </div>

        <div class="mb-3">
            <label for="kaspasitas_tangki" class="form-label">Kaspasitas Tangki</label>
            <input type="text" class="form-control" id="kaspasitas_tangki" name="kaspasitas_tangki" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    </section>

  </main>
@include('include/alerts_header')

</body>
</html>
