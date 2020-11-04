<?php include "header.php"; ?>
<?php
if ($user_role != 1) {
    header("location: product.php");
}
?>
<?php $end_data = ""; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="btn" href="add-category.php">add category</a>
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
                $query_select = "SELECT * FROM category LIMIT {$offset}, {$limit}";
                $result_select = mysqli_query($connect, $query_select);
                $count_select = mysqli_num_rows($result_select);
                if ($count_select > 0) {
                    $serial_number = 0;
                ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>No. of Products</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_select = mysqli_fetch_assoc($result_select)) {
                                $category_id = $row_select['category_id'];
                                $category_name = $row_select['category_name'];
                                $product = $row_select['product'];
                                $serial_number++;
                            ?>
                                <tr>
                                    <td class='id'><?php echo $serial_number; ?></td>
                                    <td><?php echo $category_id; ?></td>
                                    <td><?php echo $category_name; ?></td>
                                    <td><?php echo $product; ?></td>
                                    <td class='edit'><a href='update-category.php'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a onclick="return confirm('Are you sure to delete this category?')" href='delete-category.php'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    $end_data = "you have no category on your database.";
                }
                ?>

                <div class="php_error">
                    <?php echo $end_data; ?>
                </div>

                <?php
                $query_pagination = "SELECT * FROM category";
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
                                <li><a href="category.php?current_page=<?php echo ($current_page - 1); ?>">⇽</a></li>
                            <?php
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo '<li class=' . $active . '><a href="category.php?current_page=' . $i . '">' . $i . '</a></li>';
                            }
                            if ($current_page < $total_page) {
                            ?>
                                <li><a href="category.php?current_page=<?php echo ($current_page + 1); ?>"">⇾</a></li>
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
