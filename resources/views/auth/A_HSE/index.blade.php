<!DOCTYPE html>
<html lang="en">
<head>
<link href="{{asset('bs5/css/bootstrap.min.css')}}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar {
            background-color: #343a40;
            color: #ffffff;
            height: 100vh;
            position: fixed;
            width: 250px;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            color: #ffffff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            border-radius: 12px 12px 0 0;
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .welcome-text {
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }

        .activity-card,
        .info-card {
            background-color: #ffffff;
            border: 1px solid #e2e2e2;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .activity-card .card-header,
        .info-card .card-header {
            background-color: #007bff;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            border-radius: 12px 12px 0 0;
            padding: 15px;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #ffffff;
            border: 1px solid #dc3545;
            border-radius: 4px;
            transition: background-color 0.3s;
            width: 100%;
            padding: 10px;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="active">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#" class="logout-btn">Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                User Dashboard
            </div>
            <div class="card-body">
                <div class="welcome-text">
                    <h3>Welcome, John Doe!</h3>
                    <p>This is your personalized dashboard.</p>
                </div>

                <!-- Dashboard Content -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card activity-card">
                            <div class="card-header">
                                Recent Activity
                            </div>
                            <div class="card-body">
                                <!-- Display recent activity content here -->
                                <p>No recent activity to display.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card info-card">
                            <div class="card-header">
                                Account Information
                            </div>
                            <div class="card-body">
                                <!-- Display account information content here -->
                                <p>Email: john.doe@example.com</p>
                                <p>Member since: January 1, 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('bs5/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>



