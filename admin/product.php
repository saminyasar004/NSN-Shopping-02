<?php include "header.php"; ?>
<?php $end_data = "";  ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Product</h1>
            </div>
            <div class="col-md-2">
                <a class="btn" href="add-product.php">add product</a>
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
                if ($_SESSION['user_role'] == 1) {
                    $query_select = "SELECT * FROM product_info LIMIT {$offset}, {$limit}";
                } else {
                    $user_role = $_SESSION['user_role'];
                    $query_select = "SELECT * FROM product_info WHERE author = '$user_role' LIMIT {$offset}, {$limit}";
                }
                $result_select = mysqli_query($connect, $query_select);
                $count = mysqli_num_rows($result_select);
                if ($count > 0) {
                    $serial_number = 0;
                ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result_select)) {
                                $product_id = $row['id'];
                                $product_name = $row['name'];
                                $product_price = $row['price'];
                                $product_description = $row['description'];
                                $product_category = $row['category'];
                                $product_date = $row['date'];
                                $product_author = $row['author'];
                                $product_img = $row['img'];
                                $serial_number++;
                            ?>
                                <tr>
                                    <td class="id"><?php echo $serial_number; ?></td>
                                    <th class="product_img_th"><img src="upload/<?php echo $product_img; ?>"></th>
                                    <td><?php echo $product_name; ?></td>
                                    <td><?php echo $product_price; ?></td>
                                    <td><?php
                                        $query_category = "SELECT * FROM category WHERE category_id = '$product_category'";
                                        $result_category = mysqli_query($connect, $query_category);
                                        while ($row_category = mysqli_fetch_assoc($result_category)) {
                                            $category_name = $row_category['category_name'];
                                            echo $category_name;
                                        }
                                        ?></td>
                                    <td><?php echo $product_date; ?></td>
                                    <td><?php
                                        if ($product_author == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "Moderator";
                                        }
                                        ?></td>
                                    <td class='edit'><a href='edit-product.php?edit_id=<?php echo $product_id; ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a onclick="return confirm('Are you want to delete this product?')" href='delete-product.php?delete_id=<?php echo $product_id; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    $end_data = "you have no product on your database";
                }
                ?>

                <div class="php_error">
                    <?php echo $end_data; ?>
                </div>
                <?php
                if ($_SESSION['user_role'] == 1) {
                    $query_pagination = "SELECT * FROM product_info";
                } else {
                    $user_role = $_SESSION['user_role'];
                    $query_pagination = "SELECT * FROM product_info WHERE author = '$user_role'";
                }

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
                                <li><a href="product.php?current_page=<?php echo $current_page - 1; ?>">⇽</a></li>
                            <?php
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                            ?>
                                <li class="<?php echo $active; ?>"><a href="product.php?current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                            }
                            if ($current_page < $total_page) {
                            ?>
                                <li><a href="product.php?current_page=<?php echo $current_page + 1; ?>">⇾</a></li>
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
