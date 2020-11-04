<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Product</title>
</head>

<body>
  <?php
  if (isset($_REQUEST['delete_id'])) {
    include "config.php";
    $delete_id = $_REQUEST['delete_id'];
    $query_select = "SELECT img FROM product_info";
    $result_select = mysqli_query($connect, $query_select);
    $count_select = mysqli_num_rows($result_select);
    if ($count_select > 0) {
      while ($row_select = mysqli_fetch_assoc($result_select)) {
        $product_img = $row_select['img'];
      }
    }
    $loc = 'upload/';
    unlink($loc . $product_img);
    $query_delete = "DELETE FROM product_info WHERE id = '$delete_id'";
    $result_delete = mysqli_query($connect, $query_delete);
    if ($result_delete) {
      header('location: product.php');
    }
  }
  ?>
</body>

</html>
