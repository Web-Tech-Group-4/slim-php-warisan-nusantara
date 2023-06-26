<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Warisan Tradisional Bumi Nusantara</title>
    <style>
        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img class="logo" src="images/logo.jpg" alt="gambar"></a>

            <!--navbar collapse-navbar-->
            <div class="" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php
                    // Get the current page URL
                    $currentPage = $_SERVER['REQUEST_URI'];

                    // Check if the current page is the "Add Item" page
                    if ($currentPage === "/additem.html") {
                        // Display the form
                        echo '<a class="nav-item nav-link active" href="additem.html" data-category="all collections">Add Item</a>';
                    } else {
                        // Display other navigation links
                        echo '
                        <a class="nav-item nav-link" href="additem.html" data-category="all collections">Add Item</a>
                <a class="nav-item nav-link active" href="#" data-category="all collections">all collections</a>
                <a class="nav-item nav-link" href="#" data-category="weapons and arms">weapons and arms</a>
                <a class="nav-item nav-link" href="#" data-category="household items">household items</a>
                <a class="nav-item nav-link" href="#" data-category="textiles">textiles</a>
                <a class="nav-item nav-link" href="#" data-category="carving and woodworks">carving and woodworks</a>
            ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 id="view-collection">all collections</h1>
            </div>
        </div>
        <div class="row" id="card-content">
            <!--card content-->
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script src="script/script.js"></script>

<!-- <script src="script/additem.js"></script> -->

</html>