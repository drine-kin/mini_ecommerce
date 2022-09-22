<?php
  require('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Ecommerce</title>

    <!--Bootstrap CDN-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- OwlCarousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- FontAwesome Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Custom Css file -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <!-- Header Start -->
    <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-rale font-size-12 text-black-50 m-0">Yangon, Myanmar</p>
            <div class="font-rale font-size-14">
                <a href="#" class="px-3 border-end border-start text-dark">Login</a>
                <a href="#" class="px-3 border-end text-dark">Wishlist (0)</a>
            </div>
        </div>

        <!-- Primary Navigation Bar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Mini Ecommerce</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">OnSale</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Coming Soon</a>
                  </li>
                </ul>
                <form action="#" class="font-size-14 font-rale">
                    <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                    </a>
                </form>
              </div>
            </div>
          </nav>
          <!-- Primary Navigation Bar End -->


    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main id="main-site">