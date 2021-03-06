<?php
    session_start();
    include_once "config/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="./css/home.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>

<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
        	<?php include_once "modules/logo/logo.php"; ?>

            <?php include_once "modules/search/search-box.php"; ?>

            <?php include_once "modules/cart/cart-notification.php"; ?>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<?php include_once "modules/menu/menu.php"; ?> 
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <?php include_once "modules/slide/slide.php"; ?> 
                <!--	End Slider	-->
                <?php 
                    if(isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case 'product':
                                include_once "modules/product/product.php";
                                break;
                            case 'category':
                                include_once "modules/category/category.php";
                                break;
                            case 'search':
                                include_once "modules/search/search.php";
                                break;
                            case 'cart':
                                include_once "modules/cart/cart.php";
                                break;
                            case 'success':
                                include_once "modules/cart/success.php";
                                break;
                        }
                    }else{
                        include_once "modules/product/featured.php";
                        include_once "modules/product/lasted.php";
                    }
                    
                ?>
                
            </div>
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
            	<?php include_once "modules/banner/sidebar.php"; ?>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
        	<div id="logo-2" class="col-lg-3 col-md-6 col-sm-12">
            	<h2><a href="#"><img src="images/logo.jpg" width="110px" height="60px"></a></h2>
                <p>
                	Google Academy th??nh l???p n??m 2009. Ch??ng t??i ????o t???o chuy??n s??u trong 2 l??nh v???c l?? L???p tr??nh Website & Mobile nh???m cung c???p cho th??? tr?????ng CNTT Vi???t Nam nh???ng l???p tr??nh vi??n th???c s??? ch???t l?????ng, c?? kh??? n??ng l??m vi???c ?????c l???p, c??ng nh?? Team Work ??? m???i m??i tr?????ng ????i h???i s??? chuy??n nghi???p cao. 
                </p>
            </div>
            <div id="address" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>?????a ch???</h3>
                <p>H?? N???i</p>
                <p>A17 T??? Quang B???u - H?? N???i</p>
            </div>
            <div id="service" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>D???ch v???</h3>
            	<p>B???o h??nh r??i v???, ng???m n?????c Care Diamond</p>
            	<p>B???o h??nh Care X60 r??i v??? ng???m n?????c v???n ?????i m???i</p>
            </div>
            <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>Hotline</h3>
            	<p>Phone Sale: (+84) 0349495353</p>
                <p>Email: tung@gmail.com</p>
            </div>
        </div>
    </div>
</div>

<!--	Footer	-->
<div id="footer-bottom">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<p>
                    2022 ?? Online Watch Shop. All rights reserved. Developed by Google Software.
                </p>
            </div>
        </div>
    </div>
</div>


<!--	End Footer	-->





</body>
</html>

