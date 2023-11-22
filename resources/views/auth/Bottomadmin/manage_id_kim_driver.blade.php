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
                        <th scope="col">Nama</th>
                        <th scope="col">Berlaku</th>
                        <th scope="col">Tempat & Tanggal Lahir</th>
                        <th scope="col">id driver</th>
                        <th scope="col">No. KIM</th>
                        <th scope="col">KIM</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($Kims_All as $KA)
                    <tr>
                        <td>{{$KA->nama}}</td>
                        <td>{{$KA->berlaku}}</td>
                        <td>{{$KA->ttl}}</td>
                        <td>{{$KA->id_driver}}</td>
                        <td>{{$KA->noKIM}}</td>
                        <td><img src="{{ asset('uploads/' . $KA->foto) }}" alt="Foto Pengemudi" class="img-thumbnail"
                                style="max-width: 100px;">
                        </td>
                        <td>
                        <form id="deleteForm" action="{{ route('auth.Bottomadmin.index.manage.KIMandID.remove', ['id' => $KA->noKIM]) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-sm btn-danger" style="margin-top:10px;" onclick="konfirmasi('{{ route('auth.Bottomadmin.index.manage.KIMandID.remove', ['id' => $KA->noKIM]) }}','[ID Driver: {{$KA->id_driver}}] [No. KIM: {{$KA->noKIM}}]')">
                          remove
                        </button>
                      </form></td>
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