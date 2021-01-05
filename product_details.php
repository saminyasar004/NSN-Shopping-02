<?php
if (isset($_REQUEST["product_name"])) {
  $product_title_name = $_REQUEST["product_name"];
  // $product_title_name = ucfirst($product_title_name);
} else {
  header("location: store.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucfirst($product_title_name); ?> | Product Details | NSN Shopping | Best E-commerce Shopping Website</title>
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
  <link rel="stylesheet" href="css/product_details.css">
  <!-- linking javascript file -->
  <script src="js/index.js" defer></script>
</head>

<body>

  <!-- header section start -->

  <?php include "header.php"; ?>

  <!-- header section end -->

  <!-- overview section start -->

  <section class="overview-container">
    <div class="row">
      <?php
      if (isset($_REQUEST["product_id"])) {
        $product_id = $_REQUEST["product_id"];
        if (productById($connect, $product_id) == false) {
          header("location: store.php");
          die();
        } else {
          $result_product_data = productById($connect, $product_id);
          $count = mysqli_num_rows($result_product_data);
          if ($count == 0) {
            header("location: store.php");
            die();
          } else {
            while ($row_product_data = mysqli_fetch_assoc($result_product_data)) {
              $product_name = $row_product_data["name"];
              $product_price = $row_product_data["price"];
              $product_description = $row_product_data["description"];
              $product_category = $row_product_data["category"];
              $product_date = $row_product_data["date"];
              $product_author = $row_product_data["author"];
              $product_img = $row_product_data["img"];
            }
            if ($product_name != $product_title_name) {
              header("location: store.php");
            }
          }
        }
      } else {
        header("location: store.php");
        die();
      }
      ?>
      <div class="img-container col1 span-1-of-2">
        <img src="admin/upload/<?php echo $product_img; ?>" id="product_img">
      </div>
      <div class="description-container col1 span-1-of-2">
        <div class="pagepath-container">
          <span class="page-path"><a href="home.php">home</a> / <a href="store.php">store</a> / <?php echo $product_name; ?></span>
        </div>
        <div class="product-title">
          <h4><?php echo $product_name; ?></h4>
        </div>
        <div class="product-price">
          <h5>$<?php echo $product_price; ?>.00</h5>
        </div>
        <div class="product-action">
          <form action="add_cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input class="quantity" min="1" max="100" type="number" name="quantity" value="1">
            <button class="btn btnSubmit" type="submit" name="submit">add to cart</button>
          </form>
        </div>
        <div class="product_description">
          <p><?php echo $product_description; ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- overview section end -->

  <!-- footer section start -->

  <?php include "footer.php"; ?>

  <!-- footer section end -->

  <script src="js/product_details.js"></script>
</body>

</html>