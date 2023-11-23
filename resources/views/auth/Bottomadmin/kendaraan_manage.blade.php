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


      <div id="content">
        <div class="container mt-5">
        <h2>Data Pengemudi</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nopol</th>
                        <th scope="col">KIR Headtruck</th>
                        <th scope="col">Kapasitas_Tangki</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($Kendaraan_view as $KV)
                    <tr>
                        <td>{{$KV->Nopol}}</td>
                        <td>{{$KV->KIR_Headtruck}}</td>
                        <td>{{$KV->Kapasitas_Tangki}}</td>
                        <td>
                            <button class="btn btn-danger">edit</button>
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
    </section>

  </main>

    <script>
    function konfirmasi(route, message) {
        Swal.fire({
            title: 'Apakah Anda Yakin ingin menghapus ini?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>

@include('include/alerts_header')

</body>
</html>