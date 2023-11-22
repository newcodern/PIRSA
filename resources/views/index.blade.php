@include('include/items')
@include('include/ordinary_navbar')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome</title>
</head>
<body style="padding-top: 50px;">
  <header class="bg-primary text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Portal Page</h1>
      <p class="lead">Crafting beautiful and innovative solutions for your needs.</p>
      <a href="{{route('auth.main')}}" class="btn btn-light btn-lg">Auth Page</a>
    </div>
  </header>
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="display-4">About Us</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        </div>
        <div class="col-lg-6">
        </div>
      </div>
    </div>
  </section>
  <section class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
        </div>
        <div class="col-lg-6">
          <h2 class="display-4">Contact Us</h2>
          <p class="lead">Get in touch with us for any inquiries or collaborations.</p>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; Pirsa.</p>
  </footer>
</body>
</html>
