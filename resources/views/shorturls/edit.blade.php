<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Edit Short URL</title>
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
            </div>
            <ul class="navbar-nav ms-auto">
                <!-- Logout button, shown only when user is authenticated -->
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

    <!-- Main content -->
    <div class="container my-4">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h2>Edit Short URL</h2>
            </div>
        </div>

        <hr>

        <!-- Edit form -->
        <form method="POST" action="{{ route('shorturls.update', $shortUrl->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="full_link" class="form-label">Full Link</label>
                <input type="text" class="form-control" id="full_link" name="full_link" value="{{ $shortUrl->full_link }}">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary me-md-2">Update</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary" role="button">Back to Dashboard</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
