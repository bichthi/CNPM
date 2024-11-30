<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Carousel -->
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets\images\banner1.png" class="d-block w-100" alt="Banner 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Best Deals</h5>
                    <p>Up to 50% off on all products!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets\images\banner2.png" class="d-block w-100" alt="Banner 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>New Arrivals</h5>
                    <p>Explore the latest trends.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <!-- Featured Products -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row">
            <!-- Product Card -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets\images\image1.png" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">T-shirt </h5>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets\images\image2.png" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Jacket</h5>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets\images\image3.png" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Pants</h5>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 E-Shop. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
