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
    <h2>Form Kartu Izin Mengemudi</h2>
    <form action="{{route('auth.Bottomadmin.index.manage.KIMandID.store')}}" method="post">
        @csrf

    <div class="mb-3">
              <small>ID:</small>
              <input required class="form-control" name="searcher" readonly type="text" id="selectedOptionName">
              <br><br>
              <small>Nama:</small>
              <input required class="form-control" readonly type="text" id="selectedOptionId">
              <br><br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Select Driver
</button>
<input type="hidden" id="selectedOptionId">
<input type="hidden" id="selectedOptionName">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Option</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          @forelse($Selection_IdDriver_add as $SIdD)
          <div class="col-6 mb-3">
            <div class="card" data-bs-toggle="modal" data-bs-target="#exampleModal" data-option-id="{{$SIdD->nama}}" data-option-name="{{$SIdD->id_driver}}">
              <div class="card-body">
  <div class="card-body">
    <h5 class="card-title">{{$SIdD->nama}}</h5>
    <p class="card-text">{{$SIdD->id_driver}}</p>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateSelect()">Select</button>
  </div>
  </div>
              </div>
            </div>
<script>
  // Function to update the visible button text with the selected option data
  function updateSelect() {
    const selectedOptionId = document.getElementById('selectedOptionId').value;
    const selectedOptionName = document.getElementById('selectedOptionName').value;
    document.querySelector('.btn-primary').innerText = `Selected: ${selectedOptionName} (ID: ${selectedOptionId})`;
  }

  // Event listener for when a card is clicked to set the selected option data
  document.querySelectorAll('.card').forEach(function(card) {
    card.addEventListener('click', function() {
      const optionId = card.getAttribute('data-option-id');
      const optionName = card.getAttribute('data-option-name');
      document.getElementById('selectedOptionId').value = optionId;
      document.getElementById('selectedOptionName').value = optionName;
    });
  });
</script>
          @empty
          [EMPTY]
          @endforelse 
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

        <div class="mb-3">
            <label for="urut" class="form-label">No. Urut</label>
            <input type="text" class="form-control" id="urut" name="urut" required>
        </div>

        <div class="mb-3">
            <label for="nopol" class="form-label">Nopol & Kaspasitas Tangki</label>
            <input readonly id="selectedOptionName23" type="text" class="form-control" id="nopol" name="nopol" required><br>
            <input readonly id="selectedOptionId23" type="text" class="form-control" id="kaspasitas_tangki" name="kaspasitas_tangki" required>
            <br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal23">Pilih Kendaraan</button>
<input type="hidden" id="selectedOptionId23">
<input type="hidden" id="selectedOptionName23">
<div class="modal fade" id="exampleModal23" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Option</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          @forelse($Selection_Kendaraan_add as $SKendaraan)
          <div class="col-6 mb-3">
            <div id="acardKendaraan" class="card" data-bs-toggle="modal" data-bs-target="#exampleModal23" data-option-id-kendaraan="{{$SKendaraan->Kapasitas_Tangki}}" data-option-name-kendaraan="{{$SKendaraan->Nopol}}">
              <div class="card-body">
  <div class="card-body">
    <h5 class="card-title">{{$SKendaraan->Nopol}}</h5>
    <p class="card-text">{{$SKendaraan->Kapasitas_Tangki}}</p>
    <button type="button" id="a5b345b34b5" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateSelect23()">Select</button>
  </div>
  </div>
              </div>
            </div>
            <script>
  // Function to update the visible button text with the selected option data
  function updateSelect23() {
    const selectedOptionId23 = document.getElementById('selectedOptionId23').value;
    const selectedOptionName23 = document.getElementById('selectedOptionName23').value;
    document.querySelector('#a5b345b34b5').innerText = `Selected: ${selectedOptionName23} (ID: ${selectedOptionId23})`;
  }

  // Event listener for when a card is clicked to set the selected option data
  document.querySelectorAll('#acardKendaraan').forEach(function(card) {
    card.addEventListener('click', function() {
      const optionIdKendaraan = card.getAttribute('data-option-id-kendaraan');
      const optionNameKendaraan = card.getAttribute('data-option-name-kendaraan');
      document.getElementById('selectedOptionId23').value = optionIdKendaraan;
      document.getElementById('selectedOptionName23').value = optionNameKendaraan;
    });
  });
</script>
          @empty
          [EMPTY]
          @endforelse 
          </div>
        </div>
      </div>
    </div>
  </div>
        </div>

        <div class="mb-3">
            <label for="jenis_produk" class="form-label">Jenis Produk</label>
            <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" required>
        </div>

        <div class="mb-3">
            <label for="nama_pt" class="form-label">Nama PT.</label>
            <input id="selectedOptionId23SPT325235" type="text" class="form-control" id="nama_pt" name="nama_pt" required>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaSPT325235">Pilih PT</button>
<input type="hidden" id="selectedOptionId23SPT325235">
<input type="hidden" id="selectedOptionName23SPT325235">
<div class="modal fade" id="exampleModaSPT325235" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Option</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          @forelse($Selection_Perseroan_Terbatas as $SPT)
          <div class="col-6 mb-3">
            <div id="cardSPT" class="card" data-bs-toggle="modal" data-bs-target="#exampleModadspt353" data-option-id-spt="{{$SPT->nama_pt}}" data-option-name-spt="{{$SPT->kode_spbe}}">
  <div class="card-body">
    <h5 class="card-title">{{$SPT->nama_pt}}</h5>
    <p class="card-text">{{$SPT->kode_spbe}}</p>
    <button type="button" id="a5b345b34b5_SPT3525" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateSelectSpbe23523()">Select</button>
              </div>
            </div>
          </div>
      <script>
  // Function to update the visible button text with the selected option data
  function updateSelectSpbe23523() {
    const selectedOptionId23SPT325235 = document.getElementById('selectedOptionId23SPT325235').value;
    const selectedOptionName23SPT325235 = document.getElementById('selectedOptionName23SPT325235').value;
    document.querySelector('#a5b345b34b5_SPT3525').innerText = `Selected: ${selectedOptionName23SPT325235} (ID: ${selectedOptionId23SPT325235})`;
  }

  // Event listener for when a card is clicked to set the selected option data
  document.querySelectorAll('#cardSPT').forEach(function(card) {
    card.addEventListener('click', function() {
      const optionIdSPT = card.getAttribute('data-option-id-spt');
      const optionNameSPT = card.getAttribute('data-option-name-spt');
      document.getElementById('selectedOptionId23SPT325235').value = optionIdSPT;
      document.getElementById('selectedOptionName23SPT325235').value = optionNameSPT;
    });
  });
</script>
          @empty
          [EMPTY]
          @endforelse 
          </div>
        </div>
      </div>
    </div>
  </div>
        </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Berlaku(1 bulan)</label>
                <input name="masa_berlaku" required value="{{ date('d-m-Y', strtotime('+1 month')) }}
" readonly type="text" class="form-control" id="alamat" placeholder="masa berlaku">
            </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    </section>

  </main>
@include('include/alerts_header')

</body>
</html>
