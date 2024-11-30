<?php 
include('authentication.php');
$page_title = "Seller Dashboard";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['status'])) 
                {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                
                <div class="card mb-4">
                <div class="card-header">
                        <h4>Seller Dashboard</h4>
                    </div> 
                    <div class="card-body">
                        <h4>Welcome, <?= $_SESSION['auth_user']['username']; ?>!</h4>
                        <p class="text-muted">This is your personalized dashboard to manage products, orders, and analytics.</p>
                        
                    </div>
                </div> 


                <div class="row">
                <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="bi bi-box-seam fs-1 text-primary"></i>
                                <h5 class="card-title mt-3">Manage Products</h5>
                                <p class="card-text">Add, edit, and remove your products from the store.</p>
                                <a class="btn btn-primary">Go to Products</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="bi bi-receipt fs-1 text-success"></i>
                                <h5 class="card-title mt-3">View Orders</h5>
                                <p class="card-text">Track and manage your customer orders.</p>
                                <a class="btn btn-success">Go to Orders</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="bi bi-graph-up fs-1 text-warning"></i>
                                <h5 class="card-title mt-3">Sales Analytics</h5>
                                <p class="card-text">View your sales performance and trends.</p>
                                <a class="btn btn-warning">View Analytics</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5>Quick Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <h6>Total Products</h6>
                                <h3 class="text-primary">35</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <h6>Total Orders</h6>
                                <h3 class="text-success">120</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <h6>Revenue</h6>
                                <h3 class="text-warning">$12,500</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

