<?php 
    $sqlFeatured = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 6";
    $query = mysqli_query($conn, $sqlFeatured);

?>
<!--	Feature Product	-->
<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list row">
        <?php
            if(mysqli_num_rows($query) > 0){
                while($productFeatured = mysqli_fetch_assoc($query)){
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $productFeatured['prd_id']; ?>">
                        <img src="admin/images/<?php echo $productFeatured['prd_image']; ?>">
                    </a>
                    <h4>
                        <a href="index.php?page_layout=product&prd_id=<?php echo $productFeatured['prd_id']; ?>">
                            <?php echo $productFeatured['prd_name']; ?>
                        </a>
                    </h4>
                    <p>Giá Bán: <span><?php echo number_format($productFeatured['prd_price'],0,',','.'); ?>đ</span></p>
                </div>
            </div>

        <?php            
            }
        }
        ?>
        

    </div>
</div>
<!--	End Feature Product	-->