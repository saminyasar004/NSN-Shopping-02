<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | NSN Shopping | Best E-commerce Shopping Website</title>
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
    <!-- linking stylesheet file -->
    <link rel="stylesheet" href="vendor/css/normalize.css">
    <link rel="stylesheet" href="vendor/css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/store.css">
    <!-- linking javascript file -->
    <script src="js/index.js" defer></script>
</head>

<body>

    <!-- header section start -->

    <?php include "header.php"; ?>

    <!-- header section end -->

    <!-- product section start -->

    <section class="productSection">
        <div class="row">
            <div class="productHeader">
                <h2>our all products</h2>
            </div>
        </div>
        <div class="row">
            <div class="productContainer">
                <?php
                if (isset($_REQUEST["err"])) {
                    $getErr = $_REQUEST["err"];
                    if ($getErr == "notFound") {
                        $err = "our store is now empty.";
                    } else {
                        $err = "";
                    }
                    $err = ucfirst($err);
                ?>
                    <div class="php_error">
                        <?php echo $err; ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if (allData($connect, "product_info") == false) {
                    header("location: store.php?err=notFound");
                } else {
                    $result_select_product = allData($connect, "product_info");
                    while ($row_select_product = mysqli_fetch_assoc($result_select_product)) {
                        $product_id = $row_select_product["id"];
                        $product_name = $row_select_product["name"];
                        $product_price = $row_select_product["price"];
                        $product_description = $row_select_product["description"];
                        $product_category = $row_select_product["category"];
                        $product_date = $row_select_product["date"];
                        $product_author = $row_select_product["author"];
                        $product_img = $row_select_product["img"];
                ?>
                        <div class="co1 span-1-of-4 productBox">
                            <a href="product_details.php?product_id=<?php echo $product_id; ?>&product_name=<?php echo $product_name; ?>">
                                <div class="productImage">
                                    <img src="admin/upload/<?php echo $product_img; ?>">
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
                }
                ?>
            </div>
        </div>
    </section>

    <!-- product section end -->

    <!-- footer section start -->

    <?php include "footer.php"; ?>

    <!-- footer section end -->

</body>

</html>