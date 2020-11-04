<?php
session_start();
if (isset($_SESSION['fullname'])) {
    header("location: product.php");
} else {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <a target="blank" href="../home.php">
                            <img class="logo" src="./images/logo.png">
                        </a>
                        <h3 class="heading">Login</h3>
                        <!-- Form Start -->
                        <?php
                        $invalid_msg = "";
                        if (isset($_REQUEST['login'])) {
                            include "config.php";
                            $username = mysqli_real_escape_string($connect, $_REQUEST['username']);
                            $pwd = mysqli_real_escape_string($connect, $_REQUEST['password']);
                            if ($username || $pwd != "") {
                                $query = "SELECT * FROM user WHERE username = '$username' AND password = '$pwd'";
                                $result = mysqli_query($connect, $query);
                                $count = mysqli_num_rows($result);
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $fname = $row['first_name'];
                                        $fname = ucfirst($fname);
                                        $lname = $row['last_name'];
                                        $lname = ucfirst($lname);
                                        $fullname = $fname . " " . $lname;
                                        $user_role = $row['role'];
                                    }
                                    $_SESSION['username'] = $username;
                                    $_SESSION['fullname'] = $fullname;
                                    $_SESSION['user_role'] = $user_role;
                                    header("location: product.php");
                                } else {
                                    $invalid_msg = "please enter your correct login details";
                                }
                            }
                        }
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-login" value="login" />
                            <div class="php_error">
                                <?php echo $invalid_msg;  ?>
                            </div>
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php }  ?>
