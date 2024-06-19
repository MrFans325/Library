<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .movie-card {
            margin-bottom: 20px;
        }
        .movie-card img {
            max-height: 300px;
            object-fit: cover;
        }
        .movie-title {
            margin-top: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Movie Gallery</h1>
        <div class="row">
            <!-- Movie Card 1 -->
            <div class="col-md-4 movie-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x450.png?text=Movie+1" class="card-img-top" alt="Movie 1">
                    <div class="card-body">
                        <h5 class="movie-title">Movie Title 1</h5>
                    </div>
                </div>
            </div>
            <!-- Movie Card 2 -->
            <div class="col-md-4 movie-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x450.png?text=Movie+2" class="card-img-top" alt="Movie 2">
                    <div class="card-body">
                        <h5 class="movie-title">Movie Title 2</h5>
                    </div>
                </div>
            </div>
            <!-- Movie Card 3 -->
            <div class="col-md-4 movie-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x450.png?text=Movie+3" class="card-img-top" alt="Movie 3">
                    <div class="card-body">
                        <h5 class="movie-title">Movie Title 3</h5>
                    </div>
                </div>
            </div>
            <!-- Movie Card 4 -->
            <div class="col-md-4 movie-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x450.png?text=Movie+4" class="card-img-top" alt="Movie 4">
                    <div class="card-body">
                        <h5 class="movie-title">Movie Title 4</h5>
                    </div>
                </div>
            </div>
            <!-- Movie Card 5 -->
            <div class="col-md-4 movie-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x450.png?text=Movie+5" class="card-img-top" alt="Movie 5">
                    <div class="card-body">
                        <h5 class="movie-title">Movie Title 5</h5>
                    </div>
                </div>
            </div>
            <!-- Movie Card 6 -->
            <div class="col-md-4 movie-card">
                <div class="card">
                    <img src="https://via.placeholder.com/300x450.png?text=Movie+6" class="card-img-top" alt="Movie 6">
                    <div class="card-body">
                        <h5 class="movie-title">Movie Title 6</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
