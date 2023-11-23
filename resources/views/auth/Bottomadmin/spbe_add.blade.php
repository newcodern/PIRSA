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
        <h2 class="mb-4">SPBE</h2>

    <form method="POST" action="{{route('auth.Bottomadmin.index.manage.SPBE.POST')}}">
      @csrf
        <div class="mb-3">
            <label for="namaPt" class="form-label">Nama PT</label>
            <input type="text" class="form-control" id="namaPt" name="namaPt" required>
        </div>
        <div class="mb-3">
            <label for="kodeSpbe" class="form-label">Kode SPBE</label>
            <input type="text" class="form-control" id="kodeSpbe" name="kodeSpbe" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" required>
        </div>
        <div class="mb-3">
            <label for="noRef" class="form-label">No. Ref</label>
            <input type="text" class="form-control" id="noRef" name="noRef" required>
        </div>
        <div class="mb-3">
            <label for="custNo" class="form-label">Cust. No.</label>
            <input type="text" class="form-control" id="custNo" name="custNo" required>
        </div>
        <div class="mb-3">
            <label for="patraRef" class="form-label">Patra Ref</label>
            <input type="text" class="form-control" id="patraRef" name="patraRef" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    </section>

  </main>

@include('include/alerts_header')
</body>
</html>
