<!DOCTYPE html>
<html>
<head>
@include('include/items')
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
            <form method="post" action="{{route('auth.send.add')}}">
                @csrf
                <!-- Gate In Tab Form Fields -->
                <div class="mb-3">
                    <label for="gateInName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="gateInName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="gateInId" class="form-label">Password</label>
                    <input type="password" class="form-control" id="gateInId" name="password" required>
                </div>
                <div class="mb-3">
                    <select required name="role" class="form-control">
                        <option>operator_ccr</option>
                        <option>operator_timbangan</option>
                        <option>HSE</option>
                        <option>security</option>
                    </select>
                </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </section>
  </main>


</body>
</html>
