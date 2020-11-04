<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                include "config.php";
                if (isset($_REQUEST['submit'])) {
                    $category_name = mysqli_real_escape_string($connect, $_REQUEST['category']);
                    $query_insert = "INSERT INTO category (category_name) VALUES ('$category_name')";
                    $result_insert = mysqli_query($connect, $query_insert);
                    header("location: category.php");
                }
                ?>
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
