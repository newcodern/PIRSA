@include('include/items')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our Company</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #eee;
            color: #252525;
            text-align: center;
            padding: 40px 20px;
        }

        section {
            padding: 40px 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        footer {
            background-color: #ddd;
            color: #252525;
            text-align: center;
            padding: 20px;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to Our Company</h1>
    <p>Empowering Innovation, Delivering Excellence</p>
    <a href="{{route('auth.main')}}" class="btn btn-success btn-lg">Get Started</a>
</header>

<section>
    <h2>About Us</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
</section>

<section>
    <h2>Our Services</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
</section>

<footer>
    &copy; 2023 Our Company. All rights reserved.
</footer>

</body>
</html>
