<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men | NSN Shopping | Best E-commerce Shopping Website</title>
    <!-- favicon icon -->
    <link rel="icon" href="img/cart.png" type="image/x-icon">
    <!--- googe font montseerat ---->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--- goggole font poppince ------>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--- FONT AWESOME ------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--- FONT AWESOME 4 CDN ------>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/normalize.css">
    <link rel="stylesheet" href="vendor/css/grid.css">
    <link rel="stylesheet" href="css/men.css">
</head>

<body>



    <!-- header section start -->

    <header class="headerSection">
        <div class="row">
            <div class="navContainer">
                <nav>
                    <div class="logo">
                        <a href="home.php">
                            <img src="img/nsn.png" alt="NSN Shopping">
                        </a>
                    </div>
                    <div class="navLinks">
                        <ul>
                            <li><a href="home.php">home</a></li>
                            <li><a href="store.php">store</a></li>
                            <li><a class="activeLink" href="men.php">men</a></li>
                            <li><a href="women.php">women</a></li>
                            <li><a href="">account</a></li>
                            <li><a href="#"><span class="count">0</span></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- header section end -->

    <!-- product section start -->

    <section class="productSection">
        <div class="row">
            <div class="productHeader">
                <h2>men products</h2>
            </div>
        </div>
        <div class="row">
            <div class="productContainer">
                <?php

                include "include/connect.php";
                $query = "select * from product_info where category = '30'";
                $result = mysqli_query($connect, $query);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_id = $row['id'];
                        $product_name = $row['name'];
                        $product_price = $row['price'];
                        $product_description = $row['description'];
                        $product_category = $row['category'];
                        $product_author = $row['author'];
                        $product_date = $row['date'];
                        $product_img = $row['img'];

                ?>

                        <div class="co1 span-1-of-4 productBox">
                            <a href="#">
                                <div class="productImage">
                                    <img src="admin/upload/<?php echo $product_img; ?>" alt="<?php echo $product_name; ?>">
                                </div>
                                <div class="productName">
                                    <h4><?php echo $product_name; ?></h4>
                                </div>
                                <div class="productStatus">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="productPrice">
                                    <h5>$<?php echo $product_price; ?></h5>
                                </div>
                            </a>
                        </div>

                <?php
                    }
                } else {
                    header("location: home.php");
                }

                ?>
            </div>
        </div>
    </section>

    <!-- product section end -->

    <!-- footer section start -->

    <footer class="footerSection">
        <div class="row">
            <div class="col1 span-1-of-3 footerWidget">
                <a href="home.php">
                    <img src="img/nsn-white.png" alt="NSN Shopping">
                </a>
            </div>
            <div class="col1 span-1-of-3 footerWidget"></div>
            <div class="col1 span-1-of-3 footerWidget">
                <h6>copyright © 2020 || all rights researved</h6>
            </div>
        </div>
    </footer>

    <!-- footer section end -->

</body>

</html>
