<?php 
    $keyword= "";
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword']; //iphone xs
        $arr_keyword = explode(" ", $keyword); //['iphone','xs']
        $str_keyword = '%'.implode("%",$arr_keyword).'%'; //%iphone%xs%
        $sqlSearch = "SELECT * FROM product WHERE prd_name LIKE '$str_keyword'";
        $querySearch = mysqli_query($conn,$sqlSearch);
    }
?>
<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span> <?php echo $keyword; ?></span></div>
    <div class="product-list row">
        <?php if(mysqli_num_rows($querySearch) > 0) {
            while($prdSearch = mysqli_fetch_assoc($querySearch)) {
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                <div class="product-item card text-center">
                    <a href="index.php?page_layout=product&prd_id=<?php echo $prdSearch['prd_id']; ?>"><img src="admin/images/<?php echo $prdSearch['prd_image']; ?>"></a>
                    <h4><a href="index.php?page_layout=product&prd_id=<?php echo $prdSearch['prd_id']; ?>"><?php echo $prdSearch['prd_name']; ?></a></h4>
                    <p>Giá Bán: <span><?php echo number_format($prdSearch['prd_price'],0,',','.'); ?>đ</span></p>
                </div>
            </div>
        <?php
            }
        } ?>
        

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