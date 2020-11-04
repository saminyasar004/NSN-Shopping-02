<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <?php
                if (isset($_REQUEST['edit_id'])) {
                    include "config.php";
                    $edit_id = $_REQUEST['edit_id'];
                    $query_select = "SELECT * FROM user WHERE user_id = '$edit_id'";
                    $result_select = mysqli_query($connect, $query_select);
                    $count_select = mysqli_num_rows($result_select);
                    if ($count_select) {
                        while ($row = mysqli_fetch_assoc($result_select)) {
                            $user_id = $row['user_id'];
                            $user_fname = $row['first_name'];
                            $user_lname = $row['last_name'];
                            $user_username = $row['username'];
                            $user_role = $row['role'];
                        }
                    }
                }
                if (isset($_REQUEST['submit'])) {
                    $fname = mysqli_real_escape_string($connect, $_REQUEST['fname']);
                    $lname = mysqli_real_escape_string($connect, $_REQUEST['lname']);
                    $username = mysqli_real_escape_string($connect, $_REQUEST['username']);
                    $role = mysqli_real_escape_string($connect, $_REQUEST['role']);
                    $query_update = "UPDATE user SET first_name = '$fname', last_name ='$lname', username = '$username', role = '$role' WHERE user.user_id = $edit_id";
                    $result_update = mysqli_query($connect, $query_update);
                    header("location: users.php");
                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $user_fname; ?>" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $user_lname; ?>" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user_username; ?>" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                            if ($user_role == 1) {
                            ?>
                                <option value="0">Moderator</option>
                                <option selected value="1">Admin</option>
                            <?php
                            } else {
                            ?>
                                <option selected value="0">Moderator</option>
                                <option value="1">Admin</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
