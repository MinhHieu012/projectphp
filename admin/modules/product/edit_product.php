<?php 
    // Lấy danh mục sản phẩm
    $sqlCategory = "SELECT * FROM category ORDER BY cat_id";
    $resultCategory = mysqli_query($conn, $sqlCategory);

    if(isset($_GET['prd_id'])) {
        $prd_id = $_GET['prd_id'];
        $sqlProduct = "SELECT * FROM product WHERE prd_id = $prd_id";
        $resultProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($resultProduct)) {
            $product = mysqli_fetch_assoc($resultProduct);
        }

        if(isset($_POST['sbm'])) {
            if(empty($_POST['prd_name'])) {
                $errors['prd_name'] = "Bạn chưa nhập tên sản phẩm";
            }else{
                $prd_name = $_POST['prd_name'];
            }
    
            $prd_price =  $_POST['prd_price'];
            $prd_warranty =  $_POST['prd_warranty'];
            $prd_accessories =  $_POST['prd_accessories'];
            $prd_promotion =  $_POST['prd_promotion'];
            $prd_new =  $_POST['prd_new'];
            $cat_id =  $_POST['cat_id'];
            $prd_status =  $_POST['prd_status'];
            $prd_details =  $_POST['prd_details'];
            if(empty($_POST['prd_featured'])) {
                $prd_featured = 0;
            }else{
                $prd_featured = 1;
            }
    
            if($_FILES['prd_image']['name'] != null) {
                if($_FILES['prd_image']['error'] > 0) {
                    echo "File bị lỗi";
                    die;
                }else{
                    $tmp_name = $_FILES['prd_image']['tmp_name'];
                    $prd_image = $_FILES['prd_image']['name'];
                    $target_file = 'images/'.$prd_image;
                    move_uploaded_file($tmp_name, $target_file);
                }
            }else{
                $prd_image = $product['prd_image'];
            }
    
            $sqlUpdate = "UPDATE product SET
                            cat_id = $cat_id,
                            prd_name = '$prd_name',
                            prd_image = '$prd_image',
                            prd_price = $prd_price,
                            prd_warranty = '$prd_warranty',
                            prd_accessories = '$prd_accessories',
                            prd_promotion = '$prd_promotion',
                            prd_new = '$prd_new',
                            prd_status = $prd_status,
                            prd_details = '$prd_details',
                            prd_featured = $prd_featured
                            WHERE prd_id = $prd_id";

            if(mysqli_query($conn, $sqlUpdate)) {
                header("location:index.php?page=product");
            }else{
                echo "<script>alert('Sửa sản phẩm không thành công!');</script>";
            }
        }
    }else{
        header("location:index.php?page=product");
    }

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active"><?php echo $product['prd_name']; ?></li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm: <?php echo $product['prd_name']; ?></h1>
        </div>
    </div><!--/.row-->
    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="prd_name" required class="form-control" value="<?php echo $product['prd_name']; ?>"  placeholder="">
                            </div>
                                                            
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required value="<?php echo $product['prd_price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required value="<?php echo $product['prd_warranty']; ?>" class="form-control">
                            </div>    
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input type="text" name="prd_accessories" required value="<?php echo $product['prd_accessories']; ?>" class="form-control">
                            </div>                  
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" name="prd_promotion" required value="<?php echo $product['prd_promotion']; ?>" class="form-control">
                            </div>  
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" name="prd_new" required value="<?php echo $product['prd_new']; ?>" type="text" class="form-control">
                            </div>  
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input type="file" name="prd_image" onchange="preview();">
                                <br>
                                <div>
                                    <img id="prd_image" width="160px" height="212px" src="images/<?php echo $product['prd_image']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="cat_id" class="form-control">
                                    <?php if(mysqli_num_rows($resultCategory)){ 
                                            while($cate = mysqli_fetch_assoc($resultCategory)) {    
                                    ?>
                                        <option <?php if($product['cat_id'] == $cate['cat_id']) echo "selected"; ?> value=<?php echo $cate['cat_id']; ?>><?php echo $cate['cat_name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="prd_status" class="form-control">
                                    <option <?php if($product['prd_status'] == 1) echo "selected"; ?> value=1>Còn hàng</option>
                                    <option <?php if($product['prd_status'] == 0) echo "selected"; ?> value=0>Hết hàng</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Sản phẩm nổi bật</label>
                                <div class="checkbox">
                                    <label>
                                        <input <?php if($product['prd_featured'] == 1) echo "checked"; ?> name="prd_featured" type="checkbox" value=<?php echo $product['prd_featured']; ?>>Nổi bật
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea name="prd_details" required class="form-control" rows="3"><?php echo $product['prd_details']; ?></textarea>
                                </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    
</div>	<!--/.main-->	

<script>
    function preview() {
        prd_image.src=URL.createObjectURL(event.target.files[0]);
    }
</script>