<?php
    $cat_id = "";
    if(isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
    }
    $sqlCategory = "SELECT cat_name FROM category WHERE cat_id=$cat_id";
    $queryCategory = mysqli_query($conn, $sqlCategory);
    $cate = mysqli_fetch_assoc($queryCategory);

    $sqlCat = "SELECT * FROM product WHERE cat_id = $cat_id";
    $queryCat = mysqli_query($conn, $sqlCat);

?>
<!--	List Product	-->
<div class="products">
    <h3><?php echo $cate['cat_name']; ?> (hiện có <?php echo mysqli_num_rows($queryCat); ?> sản phẩm)</h3>
    <div class="product-list row">
        <?php
            if(mysqli_num_rows($queryCat) > 0) {
                while($prd = mysqli_fetch_assoc($queryCat)) {
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $prd['prd_id']; ?>"><img src="admin/images/<?php echo $prd['prd_image']; ?>"></a>
                    <h4><a href="index.php?page_layout=product&prd_id=<?php echo $prd['prd_id']; ?>"><?php echo $prd['prd_name']; ?></a></h4>
                    <p>Giá Bán: <span><?php echo number_format($prd['prd_price'], 0, ',','.'); ?>đ</span></p>
                </div>
            </div>
        <?php
                }
            }
        ?>
        

    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>