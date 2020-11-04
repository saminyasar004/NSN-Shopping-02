<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Product</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <?php
                if (isset($_REQUEST['edit_id'])) {
                    include "config.php";
                    $edit_id = $_REQUEST['edit_id'];
                    $query_select = "SELECT * FROM product_info WHERE id = '$edit_id'";
                    $result_query = mysqli_query($connect, $query_select);
                    $count_select = mysqli_num_rows($result_query);
                    if ($count_select > 0) {
                        while ($row_select = mysqli_fetch_assoc($result_query)) {
                            $product_id = $row_select['id'];
                            $product_name = $row_select['name'];
                            $product_price = $row_select['price'];
                            $product_description = $row_select['description'];
                            $product_category = $row_select['category'];
                            $product_author = $row_select['author'];
                            $product_img = $row_select['img'];
                        }
                    }
                } else {
                    header('location: product.php');
                }
                ?>
                <form action="update-product.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="product_id" class="form-control" value="<?php echo $product_id; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="product_author" class="form-control" value="<?php echo $product_author; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Name</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputUsername" value="<?php echo $product_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Price</label>
                        <input type="number" name="product_price" class="form-control" id="exampleInputUsername" value="<?php echo $product_price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="product_desc" class="form-control" required rows="5"><?php echo $product_description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="product_category">
                            <?php
                            $query_category = 'SELECT * FROM category';
                            $result_category = mysqli_query($connect, $query_category);
                            $count_category = mysqli_num_rows($result_category);
                            if ($count_category > 0) {
                                while ($row_category = mysqli_fetch_assoc($result_category)) {
                                    $category_id = $row_category['category_id'];
                                    $category_name = $row_category['category_name'];
                                    if ($product_category == $category_id) {
                            ?>
                                        <option selected value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Product image</label>
                        <input type="file" name="new-image">
                        <img src="upload/<?php echo $product_img; ?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $product_img; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
