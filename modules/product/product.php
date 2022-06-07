<?php 
    if(isset($_GET['prd_id'])) {
        $prd_id = $_GET['prd_id'];
        $sqlProduct = "SELECT * FROM product WHERE prd_id=$prd_id";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            $product = mysqli_fetch_assoc($queryProduct);
        }else{
            echo '<div id="product" class="alert alert-danger">Không có sản phẩm nào phù hợp!</div>';
            exit();
        }

?>
<!--	List Product	-->
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/images/<?php echo $product['prd_image']; ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $product['prd_name']; ?></h1>
            <ul>
                <li><span>Bảo hành:</span> <?php echo $product['prd_warranty']; ?></li>
                <li><span>Đi kèm:</span> <?php echo $product['prd_accessories']; ?></li>
                <li><span>Tình trạng:</span> <?php echo $product['prd_new']; ?></li>
                <li><span>Khuyến Mại:</span> <?php echo $product['prd_promotion']; ?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format($product['prd_price'],0,',','.'); ?>đ</li>
                <li id="status">
                    <?php 
                        if($product['prd_status'] == 1) {
                            echo "Còn hàng";
                        }else{
                            echo "Hết hàng";
                        }
                    ?>
                </li>
            </ul>
            <div id="add-cart"><a href="#">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?php echo $product['prd_name']; ?></h3>
            <?php echo $product['prd_details']; ?>
        </div>
    </div>

    <!--	Comment	-->
    <?php 
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        if(isset($_POST['sbm'])) {
            $comm_name = $_POST['comm_name'];
            $comm_mail = $_POST['comm_mail'];
            $comm_details = $_POST['comm_details'];
            $comm_date = date('Y-m-d H:i:s', time());
            $sqlInsert ="INSERT INTO comments(prd_id, comm_name,comm_mail,comm_date,comm_details)
                                              VALUES($prd_id,'$comm_name','$comm_mail','$comm_date','$comm_details')";
            mysqli_query($conn,$sqlInsert);
        }
    
    ?>
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post" action="">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <?php
    $sqlComment = "SELECT * FROM comments WHERE prd_id = $prd_id";
    $queryComment = mysqli_query($conn, $sqlComment);

    ?>
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php 
                if(mysqli_num_rows($queryComment) > 0) {
                    while($comment = mysqli_fetch_assoc($queryComment)) {
            ?>
                <div class="comment-item">
                    <ul>
                        <li><b><?php echo $comment['comm_name']; ?></b></li>
                        <li><?php echo $comment['comm_date']; ?></li>
                        <li>
                            <p><?php echo $comment['comm_details']; ?></p>
                        </li>
                    </ul>
                </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <!--	End Comments List	-->
</div>
<!--	End Product	-->
<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>
<?php
    }else{
        echo '<div id="product" class="alert alert-danger">Không có sản phẩm nào phù hợp!</div>';
    }
?>
