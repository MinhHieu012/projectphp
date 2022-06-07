<?php 
    $sqlLasted = "SELECT * FROM product ORDER BY prd_id DESC LIMIT 6";
    $queryLasted = mysqli_query($conn, $sqlLasted);
?>
<!--	Latest Product	-->
<div class="products">
    <h3>Sản phẩm mới</h3>
    <div class="product-list row">
        <?php
            if(mysqli_num_rows($queryLasted) > 0){
                while($productLasted = mysqli_fetch_assoc($queryLasted)){
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $productLasted['prd_id']; ?>">
                        <img src="admin/images/<?php echo $productLasted['prd_image']; ?>">
                    </a>
                    <h4>
                        <a href="index.php?page_layout=product&prd_id=<?php echo $productLasted['prd_id']; ?>">
                            <?php echo $productLasted['prd_name']; ?>
                        </a>
                    </h4>
                    <p>Giá Bán: <span><?php echo number_format($productLasted['prd_price'],0,',','.'); ?>đ</span></p>
                </div>
            </div>

        <?php            
            }
        }
        ?>
        

    </div>
</div>
<!--	End Latest Product	-->