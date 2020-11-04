<?php include "header.php"; ?>
<?php
if ($user_role != 1) {
    header("location: product.php");
}
?>
<?php $end_data = "";  ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="btn" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <?php
                include "config.php";
                if (isset($_REQUEST['current_page'])) {
                    $current_page = $_REQUEST['current_page'];
                } else {
                    $current_page = 1;
                }
                $limit = 6;
                $offset = ($current_page - 1) * $limit;
                $query_select = "SELECT * FROM user LIMIT {$offset}, {$limit}";
                $result_select = mysqli_query($connect, $query_select);
                $count_select = mysqli_num_rows($result_select);
                if ($count_select > 0) {
                ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $serial_number = 0;
                            while ($row = mysqli_fetch_assoc($result_select)) {
                                $user_id = $row['user_id'];
                                $fname = $row['first_name'];
                                $lname = $row['last_name'];
                                $fname = ucfirst($fname);
                                $lname = ucfirst($lname);
                                $fullname = $fname . " " . $lname;
                                $username = $row['username'];
                                $user_pwd = $row['password'];
                                $user_role = $row['role'];
                                $serial_number++;
                            ?>
                                <tr>
                                    <td class='id'><?php echo $serial_number; ?></td>
                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php
                                        if ($user_role == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "Moderator";
                                        }
                                        ?></td>
                                    <td class='edit'><a href='update-user.php?edit_id=<?php echo $user_id; ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a onclick="return confirm('Are you sure to delete this user from your database?')" href='delete-user.php?delete_id=<?php echo $user_id; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    $end_data = "currently you have no user on your database";
                }
                ?>

                <div class="php_error">
                    <?php echo $end_data; ?>
                </div>

                <?php
                $query_pagination = "SELECT * FROM user";
                $result_pagination = mysqli_query($connect, $query_pagination);
                $total_data = mysqli_num_rows($result_pagination);
                if ($total_data > 0) {
                    $total_page = ceil($total_data / $limit);
                    if ($total_page > 1) {
                ?>
                        <ul class='pagination admin-pagination'>
                            <?php
                            if ($current_page > 1) {
                            ?>
                                <li><a href="users.php?current_page=<?php echo ($current_page - 1); ?>">⇽</a></li>
                            <?php
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo '<li class=' . $active . '><a href="users.php?current_page=' . $i . '">' . $i . '</a></li>';
                            }
                            if ($current_page < $total_page) {
                            ?>
                                <li><a href="users.php?current_page=<?php echo ($current_page + 1); ?>"">⇾</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
