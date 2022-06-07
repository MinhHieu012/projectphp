<?php
    // Lấy danh mục sản phẩm
    $sqlCategory = "SELECT * FROM category ORDER BY cat_id";
    $resultCategory = mysqli_query($conn, $sqlCategory);
    //Lấy dữ liệu từ form gửi lên.
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

        if(isset($_FILES['prd_image'])) {
            if($_FILES['prd_image']['error'] > 0) {
                echo "File bị lỗi";
                die;
            }else{
                $tmp_name = $_FILES['prd_image']['tmp_name'];
                $prd_image = $_FILES['prd_image']['name'];
                $target_file = 'images/'.$prd_image;
                move_uploaded_file($tmp_name, $target_file);
            }
        }
        //Lưu data vào cơ sở dữ liệu (lưu vào bảng sản phẩm)
        $sqlProduct = "INSERT INTO 
                        product(cat_id,prd_name,prd_image,prd_price,prd_warranty,prd_accessories,prd_promotion,
                                prd_new,prd_status,prd_details,prd_featured)
                                VALUES
                               ($cat_id,'$prd_name','$prd_image',$prd_price,'$prd_warranty','$prd_accessories',
                               '$prd_promotion','$prd_new',$prd_status,'$prd_details',$prd_featured)";
        
        if(mysqli_query($conn, $sqlProduct)) {
            header("location:index.php?page=product");
        }else{
            echo "<script>alert('Thêm sản phẩm không thành công!');</script>";
        }
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
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
                                    <input name="prd_name" class="form-control" placeholder="">
                                    <span style="color:red"><?php if(isset($errors['prd_name'])) echo $errors['prd_name']; ?></span>
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input name="prd_warranty" type="text" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input name="prd_accessories" type="text" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input name="prd_promotion" type="text" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input name="prd_new" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input name="prd_image" type="file" onchange="preview();">
                                    <br>
                                    <div>
                                        <img id="prd_image" src="img/download.jpeg" width="160px" height="212px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        <?php if(mysqli_num_rows($resultCategory)){ 
                                                while($cate = mysqli_fetch_assoc($resultCategory)) {    
                                        ?>
                                            <option value=<?php echo $cate['cat_id']; ?>><?php echo $cate['cat_name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 selected>Còn hàng</option>
                                        <option value=0>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" class="form-control" rows="3"></textarea>
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
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