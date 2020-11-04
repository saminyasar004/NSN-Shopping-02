<?php include "header.php"; ?>
<?php $unavailable_details = ""; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_REQUEST['submit'])) {
                    include "config.php";
                    $fname = mysqli_real_escape_string($connect, $_REQUEST['fname']);
                    $lname = mysqli_real_escape_string($connect, $_REQUEST['lname']);
                    $username = mysqli_real_escape_string($connect, $_REQUEST['username']);
                    $password = mysqli_real_escape_string($connect, $_REQUEST['password']);
                    $role = mysqli_real_escape_string($connect, $_REQUEST['role']);
                    $query_select = "SELECT * FROM user WHERE username = '$username'";
                    $result_select = mysqli_query($connect, $query_select);
                    $count_select = mysqli_num_rows($result_select);
                    if ($count_select > 0) {
                        $unavailable_details = "this username is already taken. please enter another details.";
                    } else {
                        $query_insert = "INSERT INTO user (first_name, last_name, username, password, role) VALUES ('$fname', '$lname', '$username', '$password', '$role')";
                        $result_insert = mysqli_query($connect, $query_insert);
                        header("location: users.php");
                    }
                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Moderator</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn" value="Add" required />
                    <div class="php_error">
                        <?php echo $unavailable_details; ?>
                    </div>
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
