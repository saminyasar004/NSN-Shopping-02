<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details | NSN Shopping | Best E-commerce Shopping Website</title>
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/product_details.css">
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
              <li><a href="men.php">men</a></li>
              <li><a href="women.php">women</a></li>
              <li><a href="#">account</a></li>
              <li><a href="#"><span class="count">0</span></a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <!-- header section end -->


  <?php
  include "include/connect.php";
  if (isset($_REQUEST['product_id'])) {
    $product_id = $_REQUEST['product_id'];
    $query_select = "SELECT * FROM product_info WHERE id = '$product_id'";
    $result_select = mysqli_query($connect, $query_select);
    $count_select = mysqli_num_rows($result_select);
    if ($count_select > 0) {
      while ($row_select = mysqli_fetch_assoc($result_select)) {
        $product_name = $row_select['name'];
        $product_price = $row_select['price'];
        $product_description = $row_select['description'];
        $product_category = $row_select['category'];
        $product_author = $row_select['author'];
        $product_date = $row_select['date'];
        $product_img = $row_select['img'];
      }
    }
  }
  ?>

  <!-- overview section start -->

  <section class="overview-container">
    <div class="row">
      <div class="img-container col1 span-1-of-2">
        <img src="admin/upload/<?php echo $product_img ?>" id="product_img">
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
          <form action="cart.php" method="POST">
            <input class="quantity" type="number" name="quantity" value="1" require>
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

  <footer class="footerSection">
    <div class="row">
      <div class="col1 span-1-of-3 footerWidget">
        <a href="#">
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

  <script>
    const imgContainer = document.querySelector('.img-container');
    const productImg = document.getElementById('product_img');
    let zoomLevel = 1;
    imgContainer.addEventListener("mousemove", (e) => {
      const x = e.offsetX;
      const y = e.offsetY;
      zoomLevel = 2;
      document.body.style.cursor = 'zoom-in';
      productImg.style.transformOrigin = `${x}px ${y}px`;
      productImg.style.transform = `scale(${zoomLevel})`;
    });
    imgContainer.addEventListener("mouseleave", () => {
      zoomLevel = 1
      document.body.style.cursor = 'default';
      productImg.style.transformOrigin = `center center`;
      productImg.style.transform = `scale(${zoomLevel})`;
    })
    // imgContainer.addEventListener('wheel', (e) => {
    //   if (e.deltaY < 0) {
    //     zoomLevel += 2;
    //     if (zoomLevel >= 4) {
    //       zoomLevel = 4;
    //     }
    //   } else if (e.deltaY > 0) {
    //     zoomLevel -= 2;
    //     if (zoomLevel <= 2) {
    //       zoomLevel = 2;
    //     }
    //   }
    // });
  </script>
</body>

</html>
