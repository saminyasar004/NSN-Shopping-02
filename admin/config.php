<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Connection</title>
</head>

<body>
  <?php
  $connect = mysqli_connect("localhost", "root", "", "e-commerce");
  if (!$connect) {
    die("Connection Failed") . mysqli_error($connect);
  }
  ?>
</body>

</html>
