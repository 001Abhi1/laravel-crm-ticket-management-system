<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management & Ticket System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark"
     style="background-color:#0f172a;">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            CRM Ticket System
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-primary ms-2"
                       href="{{ route('login') }}">
                        Login
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>


<!-- Hero Section -->

<section class="py-5"
         style="background:linear-gradient(135deg,#111827,#1e293b);">

    <div class="container text-center">
<h1 class="display-4 fw-bold text-white">

            Client Management & Helpdesk Ticketing System

        </h1>

      <p class="lead mt-3 text-light">

            Manage clients, users and support tickets efficiently with a secure role-based CRM platform built using Laravel.

        </p>

        <a href="{{ route('login') }}"
           class="btn btn-primary btn-lg mt-3">

            Login

        </a>

    </div>

</section>



<!-- Features -->

<section class="py-5" id="features">

    <div class="container">

        <h2 class="text-center mb-5 text-white">

            Features

        </h2>

        <div class="row">

            <div class="col-lg-3 col-md-6 mb-4">
<div class="card shadow h-100"
     style="background-color:#1e293b;color:white;border:none;border-radius:20px;">

                    <div class="card-body">

                        <h4>👥 User Management</h4>

                        <p>
                            Create, edit and manage users with role-based access.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card shadow h-100"
     style="background-color:#1e293b;color:white;border:none;border-radius:20px;">

                    <div class="card-body">

                        <h4>🏢 Client Management</h4>

                        <p>
                            Store and manage client information efficiently.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card shadow h-100"
     style="background-color:#1e293b;color:white;border:none;border-radius:20px;">

                    <div class="card-body">

                        <h4>🎫 Ticket Management</h4>

                        <p>
                            Create and assign tickets with priority and status tracking.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-3 col-md-6 mb-4">

 <div class="card shadow h-100"
     style="background-color:#1e293b;color:white;border:none;border-radius:20px;">

                    <div class="card-body">

                        <h4>📊 Dashboard Analytics</h4>

                        <p>
                            Monitor open, closed and in-progress tickets through dashboard cards.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- Tech Stack -->

<section class="py-5"
         style="background-color:#0f172a;">

    <div class="container text-center">

        <h2 class="mb-4 text-white">

            Technology Stack

        </h2>

        <div class="row">

            <div class="col-md-2 mb-3 text-light">
                Laravel 13
            </div>

            <div class="col-md-2 mb-3 text-light">
                PHP 8.5
            </div>

            <div class="col-md-2 mb-3  text-light">
                MySQL
            </div>

            <div class="col-md-2 mb-3 text-light">
                Bootstrap
            </div>

            <div class="col-md-2 mb-3 text-light">
                AdminLTE
            </div>

            <div class="col-md-2 mb-3 text-light">
                Spatie Roles
            </div>

        </div>

    </div>

</section>



<footer class="text-center py-4"
        style="background-color:#020617;">

    <p class="mb-0">

        © 2026 Client Management & Helpdesk Ticketing System

    </p>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>