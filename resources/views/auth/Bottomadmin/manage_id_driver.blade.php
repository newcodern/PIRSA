<!DOCTYPE html>
<html>
<head>
@include('include/items')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
                  .id-card {
            width: 300px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .position {
            color: #555;
            margin-bottom: 15px;
        }

        .contact {
            font-size: 0.9em;
            color: #777;
        }

        .contact a {
            color: #3498db;
            text-decoration: none;
        }

    </style>
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

      <div id="content">  
            <div class="container mt-5">
        <h2>Data Pengemudi</h2>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat & Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tinggi</th>
                        <th scope="col">ID Driver</th>
                        <th scope="col">Foto Driver</th>
                        <th scope="col">View ID Driver</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($IdDriver as $IdD)
                    <tr>
                        <td>{{$IdD->nama}}</td>
                        <td>{{$IdD->ttl}}</td>
                        <td>{{$IdD->jenis_kelamin}}</td>
                        <td>{{$IdD->tinggi}}</td>
                        <td>{{$IdD->id_driver}}</td>
                        <td><img src="{{ asset('uploads/' . $IdD->foto) }}" alt="Foto Pengemudi" class="img-thumbnail"
                                style="max-width: 100px;"></td>
                        <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$IdD->id_driver}}">view</button>
                        <div class="modal fade" id="exampleModal{{$IdD->id_driver}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View ID Driver</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
  @php
  $data = [
  'nama' => $IdD->nama,
  'tempat dan tanggal lahir' => $IdD->ttl,
  'jenis_kelamin' => $IdD->jenis_kelamin,
  'tinggi' => $IdD->tinggi,
  'Id Driver' => $IdD->id_driver,
   ];
  @endphp

      <div class="id-card" id="id-card{{$IdD->id_driver}}">
        <center><small>PT. Maspion Energi Mitratama</small></center><br>
        <img class="profile-img" src="{{ asset('uploads/' . $IdD->foto) }}" alt="Profile Picture">
        <div class="name"><h1>{{$IdD->nama}}</h1></div>
        <div class="position">Driver</div>
        <div class="contact">
        <center>{!! QrCode::size(150)->generate(json_encode($data)) !!}</center>
        </div>
    </div>

       <center><button class="btn btn-link" id="download-btn{{$IdD->id_driver}}">Download sebagai Gambar</button></center>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        document.getElementById('download-btn{{$IdD->id_driver}}').addEventListener('click', function () {
            html2canvas(document.getElementById('id-card{{$IdD->id_driver}}')).then(function(canvas) {
                var link = document.createElement('a');
                link.href = canvas.toDataURL();
                link.download = 'id_card{{$IdD->id_driver}}.png';
                link.click();
            });
        });
    </script>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                        </div>
                        </div>
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


</body>
</html>
