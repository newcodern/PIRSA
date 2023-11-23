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
    <h2>SPBE</h2>
    <form action="{{route('auth.Bottomadmin.index.manage.SPBE.importExcel')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".xlsx, .csv">
    <button style="margin-bottom: 10px;" class="btn btn-success" type="submit">Import Excel</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama PT</th>
                <th>Kode SPBE</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>No. Ref</th>
                <th>Cust. No.</th>
                <th>Patra Ref</th>
            </tr>
        </thead>
        <tbody>
            @forelse($view_SPBE as $view_SPBE_bttm)
            <tr>
                <td>{{ $view_SPBE_bttm->id }}</td>
                <td>{{ $view_SPBE_bttm->nama_pt }}</td>
                <td>{{ $view_SPBE_bttm->kode_spbe }}</td>
                <td>{{ $view_SPBE_bttm->alamat }}</td>
                <td>{{ $view_SPBE_bttm->kota }}</td>
                <td>{{ $view_SPBE_bttm->no_ref }}</td>
                <td>{{ $view_SPBE_bttm->cust_no }}</td>
                <td>{{ $view_SPBE_bttm->patra_ref }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>


    </section>

  </main>

@include('include/alerts_header')
</body>
</html>
