<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Short URLs</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

        <!-- Dashboard CSS -->
        <style>
            /* Body style */
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #F8F8F8;
            }

            /* Navbar style */
            .bg-light {
                background-color: #ffffff !important;
            }
            .nav-link {
                color: #000000;
                font-weight: bold;
            }
            .nav-link:hover {
                color: #000000;
                background-color: #ffffff;
            }

            /* Button style */
            .btn-link {
                color: #000000;
                font-weight: bold;
                text-decoration: none;
            }
            .btn-link:hover {
                color: #000000;
                text-decoration: none;
            }

            /* Table style */
            .table th, .table td {
                vertical-align: middle;
            }
            .table th {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('dashboard') }}">My Short URLs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('dashboard') }}">Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- If the user is not logged in -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        <!-- If the user is logged in -->
                        @else
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="container my-4">
            <h2>Short URLs</h2>
            <p>Created by: Stanimir Dimitrov</p>
        </div>

        <!-- Optional JavaScript -->
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
