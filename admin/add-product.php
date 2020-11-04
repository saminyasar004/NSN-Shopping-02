<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Product</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <?php
                include "config.php";
                $error = '';
                if (isset($_REQUEST['submit'])) {
                    $product_name = mysqli_real_escape_string($connect, $_REQUEST['product_name']);
                    $product_name = ucfirst($product_name);
                    $product_price = mysqli_real_escape_string($connect, $_REQUEST['product_price']);
                    $product_description = mysqli_real_escape_string($connect, $_REQUEST['product_description']);
                    $product_category = mysqli_real_escape_string($connect, $_REQUEST['product_category']);
                    $user_role = $_SESSION['user_role'];
                    $product_img = $_FILES['product_img'];
                    $product_img_name = $product_img['name'];
                    $product_img_tmp_name = $product_img['tmp_name'];
                    $product_img_type = $product_img['type'];
                    $product_img_ext = end(explode(".", $product_img_name));
                    $product_img_valid_exts = ['png', 'jpg', 'jpeg'];
                    if (in_array($product_img_ext, $product_img_valid_exts) === false) {
                        $error = "please select a png, jpeg or jpg image.";
                    }
                    if (empty($error) === true) {
                        $loc = 'upload/';
                        $product_img_new_name = uniqid() . "." . $product_img_ext;
                        move_uploaded_file($product_img_tmp_name, $loc . $product_img_new_name);
                        $query_insert = "INSERT INTO product_info (name, price, description, category, author, img) VALUES ('$product_name', '$product_price', '$product_description', '$product_category', '$user_role', '$product_img_new_name')";
                        $result__insert = mysqli_query($connect, $query_insert);
                        header('location: product.php');
                    }
                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Name</label>
                        <input type="text" name="product_name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Price</label>
                        <input type="number" name="product_price" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="product_description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="product_category" class="form-control">
                            <option value="null" selected> Select Category</option>
                            <?php
                            $query_category = 'SELECT * FROM category';
                            $result_category = mysqli_query($connect, $query_category);
                            $count_category = mysqli_num_rows($result_category);
                            if ($count_category > 1) {
                                while ($row_category = mysqli_fetch_assoc($result_category)) {
                                    $category_id = $row_category['category_id'];
                                    $category_name = $row_category['category_name'];
                            ?>
                                    <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product image</label>
                        <input type="file" name="product_img" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add" required />
                    <div class="php_error">
                        <?php
                        if (!empty($error)) {
                            echo $error;
                        }
                        ?>
                    </div>
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
