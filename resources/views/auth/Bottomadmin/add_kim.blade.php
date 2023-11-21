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
        <h2 class="mb-4">Form Kartu Izin Mengemudi</h2>

        <form enctype="multipart/form-data" method="post" action="{{route('auth.Bottomadmin.index.manage.KIMandID.store')}}">
          @csrf
            <div class="mb-3">
              <small>ID:</small>
              <input required class="form-control" name="searcher" readonly type="text" id="selectedOptionName">
              <br><br>
              <small>Nama:</small>
              <input required class="form-control" readonly type="text" id="selectedOptionId">
              <br><br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Open Select Modal
</button>

<!-- Hidden input fields to store the selected option data -->
<input type="hidden" id="selectedOptionId">
<input type="hidden" id="selectedOptionName">

<!-- Modal -->
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
                  <img src="{{ asset('uploads/' . $SIdD->foto) }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$SIdD->nama}}</h5>
    <p class="card-text">{{$SIdD->id_driver}}</p>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateSelect()">Select</button>
  </div>
  </div>
              </div>
            </div>
          </div>
          @empty
          [EMPTY]
          @endforelse 
        </div>
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
            <div class="mb-3">
                <label for="alamat" class="form-label">Berlaku(1 bulan)</label>
                <input name="masa_berlaku" required value="{{ date('d-m-Y', strtotime('+1 month')) }}
" readonly type="text" class="form-control" id="alamat" placeholder="masa berlaku">
            </div>

            <div class="mb-3">
                <label for="nomor-telepon" class="form-label">No. KIM</label>
                <input required name="noKIM" readonly value="{{time() * rand()}}" type="number" class="form-control" id="nomor-telepon" placeholder="No. KIM">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    </section>

  </main>


</body>
</html>
