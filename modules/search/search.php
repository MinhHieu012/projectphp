<?php 
//Số lượng bản ghi (sản phẩm) trên 01 trang.
$rowPerPage = 3;
$keyword = "";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword']; 
    $arr_keyword = explode(" ", $keyword); 
    $str_keyword = '%' . implode("%", $arr_keyword) . '%'; 
    $sqlSearch = "SELECT * FROM product WHERE prd_name LIKE '$str_keyword'";
    $querySearch = mysqli_query($conn, $sqlSearch);
    //Lấy số bản ghi của bảng product
    $totalRecords = mysqli_num_rows($querySearch);
}
//Tổng số trang = tổng số bản ghi chia làm tròn lên cho tổng số bản ghi trên 01 trang
$totalPage = ceil($totalRecords / $rowPerPage);
//Lấy số trang từ biến current_page trên url
if (isset($_GET['current_page'])) {
    $current_page = $_GET['current_page'];
} else {
    $current_page = 1;
}
//Kiểm tra số trang hợp lệ
if ($current_page < 1) {
    $current_page = 1;
}

if ($current_page > $totalPage) {
    $current_page = $totalPage;
}
//câu truy vấn lấy bản ghi đã phân trang
$start = ($current_page - 1) * $rowPerPage;
$sqlPagination = "SELECT * FROM product WHERE prd_name LIKE '$str_keyword' LIMIT $start, $rowPerPage";
$resultPagination = mysqli_query($conn, $sqlPagination)
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
            
        } ?>
        

    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
<ul class="pagination">
        <!-- Hiển thị nút bấm trở về trang trước -->
        <?php if ($current_page > 1) { ?>
            <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&current_page=<?php echo $current_page - 1; ?>">Trang trước</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a class="page-link">Trang trước</a></li>
        <?php } ?>
        <!-- Hiển thị các nút phân trang -->
        <?php for ($i = 1; $i <= $totalPage; $i++) {
            if ($i >= $current_page - 2 && $i <= $current_page + 2) {
        ?>

                <?php if ($i == $current_page) { ?>
                    <li class="page-item active"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&current_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>

        <?php
            }
        }
        ?>
        <!-- Hiển thị nút chuyển trang kế tiếp -->
        <?php if ($current_page < $totalPage) { ?>
            <li class="page-item"><a class="page-link" href="index.php?page_layout=search&keyword=<?php echo $keyword; ?>&current_page=<?php echo $current_page + 1; ?>">Trang sau</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a class="page-link">Trang sau</a></li>
        <?php } ?>
    </ul>
</div>
<?php        
    }else{
        echo '<div class = "alert alert-danger"> Từ khóa tìm kiếm không hợp lệ.</div>';
        }
?>
                                                                  