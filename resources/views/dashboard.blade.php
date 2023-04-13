<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>My Shortened URLs</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Navbar brand and link to dashboard -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">My Short URLs</a>

            <!-- Navbar toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Link to create new URL page -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('shorturls.create') }}">Create New URL</a>
                    </li>
                </ul>
            </div>

            <!-- Logout button -->
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main content container -->
    <div class="container my-4">
        <!-- Row for header and extra content -->
        <div class="row justify-content-between">
            <!-- Header -->
            <div class="col-md-6">
                <h2>My Shortened URLs</h2>
            </div>
        </div>

        <!-- Horizontal line -->
        <hr>

        <!-- Table for displaying short URLs -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Short URL</th>
                    <th>Target URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each short URL and display it in a row -->
                @foreach($shortUrls as $link)
                <tr>
                    <!-- Short URL link -->
                    <td><a href="{{ $link->full_link }}">{{ route('shortlink', $link->short_link) }}</a></td>
                    <!-- Target URL (with ellipsis if too long) -->
                    <td>{{ (strlen($link->full_link) > 20) ? substr($link->full_link, 0, 20) . '...' : $link->full_link }}</td>
                    <!-- Edit and delete buttons -->
                    <td>
                        <a href="{{ route('shorturls.edit', $link->id) }}">Edit</a>
                        <form action="{{ route('shorturls.destroy', $link->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>           

        <div class="my-3">
            <a href="{{ route('shorturls.create') }}" class="btn btn-primary">Create Short URL</a>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
