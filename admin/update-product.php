<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Product</title>
</head>

<body>
  <?php
  if (isset($_REQUEST['submit'])) {
    include "config.php";
    $error = '';
    $product_id = mysqli_real_escape_string($connect, $_REQUEST['product_id']);
    $product_name = mysqli_real_escape_string($connect, $_REQUEST['product_name']);
    $product_price = mysqli_real_escape_string($connect, $_REQUEST['product_price']);
    $product_desc = mysqli_real_escape_string($connect, $_REQUEST['product_desc']);
    $product_category = mysqli_real_escape_string($connect, $_REQUEST['product_category']);
    $product_author = mysqli_real_escape_string($connect, $_REQUEST['product_author']);
    $old_image = mysqli_real_escape_string($connect, $_REQUEST['old-image']);
    $new_img = $_FILES['new-image'];
    echo $new_img_name = $new_img['name'];
    if (empty($new_img_name)) {
      $product_img = $old_image;
    } else {
      $new_img_tmp_name = $new_img['tmp_name'];
      $new_img_type = $new_img['type'];
      $new_img_ext = end(explode(".", $new_img_name));
      $new_img_valid_exts = ['png', 'jpeg', 'jpg'];
      if (in_array($new_img_ext, $new_img_valid_exts) === false) {
        $error = 'please select a png , jpeg or jpeg image';
      }
      $product_img = uniqid() . "." . $new_img_ext;
      $loc = 'upload/';
      move_uploaded_file($new_img_tmp_name, $loc . $product_img);
      unlink($loc . $old_image);
    }
    if (empty($error) == true) {
      $query_update = "UPDATE product_info SET name = '$product_name', price = '$product_price', description = '$product_desc', category = '$product_category', author = '$product_author', img = '$product_img' WHERE product_info.id = '$product_id'";
      $result_update = mysqli_query($connect, $query_update);
      header('location: product.php');
    }
  } else {
    header('location: product.php');
  }
  ?>
</body>

</html>
