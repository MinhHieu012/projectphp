<?php
if (isset($_SESSION['cart'])) {
    $arr_prd_id = array();
    foreach ($_SESSION['cart'] as $prd_id => $qty) {
        $arr_prd_id[] = $prd_id;
    }
    $str_prd_id = implode(",", $arr_prd_id);
    $sqlCart = "SELECT * FROM product WHERE prd_id IN($str_prd_id)";
    $queryCart = mysqli_query($conn, $sqlCart);
?>

    <!--	Cart	-->

    <style>
        #quantity {
            position: relative;
            top: 30px;
        }
        .cart-nav-item {
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 20px;
        }
        /* .cart-price {
            position: relative;
            left: 10px;
        } */
        #update-cart-1 {
            margin-top: 15px;
        }
        .cart-price-total {
            position: relative;
            top: 20px;
        }
        .cart-total {
            position: relative;
            top: 20px;
        }
        .cart-price-1 {
            position: relative;
            top: 35px;
            font-size: 15px;
        }
        #giaca {
            position: relative;
            top: 15px;
        }
        #xoa {
            position: relative;
            top: 1px;
            right: -40px;
            font-size: 15px;
        }

        #user_name, #user_phone, #user_mail, #user_add {
            margin-top: 15px;
        }
        #user_add {
            margin-bottom: 15px;
        }
        #by-now {
            position: relative;
            left: 100px;
            border-radius: 5px;
            top: 5px;
        }
        #amortization-pay {
            position: relative;
            border-radius: 5px;
            top: 5px;
        }
    </style>

    <div id="my-cart">
        <div class="row">
            <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
            <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
            <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
        </div>
        <form method="post" action="modules/cart/process_cart.php?action=submit">
            <?php
            if (mysqli_num_rows($queryCart)) {
                $price_unit = 0;
                $total_price = 0;
                while ($cart = mysqli_fetch_assoc($queryCart)) {
                    $price_unit = $cart['prd_price'] * $_SESSION['cart'][$cart['prd_id']];
                    $total_price += $price_unit;
            ?>
                    <div class="cart-item row">
                        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                            <img src="admin/images/<?php echo $cart['prd_image']; ?>" width="100px" height="100px">
                            <h4><?php echo $cart['prd_name']; ?></h4>
                        </div>

                        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                            <input type="number" id="quantity" class="form-control form-blue quantity" value="<?php echo $_SESSION['cart'][$cart['prd_id']]; ?>" name="quantity[<?php echo $cart['prd_id']; ?>]" value="">
                        </div>
                        <div class="cart-price-1 col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($price_unit, 0, ',', '.'); ?>đ</b><a id="xoa" href="modules/cart/process_cart.php?action=del&prd_id=<?php echo $cart['prd_id']; ?>">Xóa</a></div>
                    </div>
            <?php
                }
            }
            ?>

            <div class="row">
                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                    <button id="update-cart-1" class="btn btn-success" type="submit" name="update_cart">Cập nhật giỏ hàng</button>
                </div>
                <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
                <div class="cart-price-total col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($total_price, 0, ',', '.'); ?>đ</b></div>
            </div>


    </div>

    <div id="customer">

        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input id="user_name" placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" >
                <span id="user_name_error"></span>
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input id="user_phone" placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" >
                <span id="user_phone_error"></span>
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input id="user_mail" placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" >
                <span id="user_mail_error"></span>
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input id="user_add" placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" >
                <span id="user_add_error"></span>
            </div>

        </div>

        <div class="row">
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <button id="by-now" class="btn btn-success" onclick = "return validateForm();" type= "submit" name="insert_cart"> <b style="color: white">Mua ngay <br> <i>Giao hàng tận nơi siêu tốc</i></b>
                    
                </button> 
            </div>
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <button id="amortization-pay" class="btn btn-danger" type="submit" name="amortization-pay"><b style="color: white">Trả góp Online<br><i>Vui lòng call (+84) 0349495353</i></b>
                </button> 
            </div>
        </div>
    </div>
    <!--	End Customer Info	-->
    </form>
<?php
} else {
    echo '<div class="alert alert-danger">Không có sản phẩm trong giỏ hàng. </div>';
}

?>

<script>
function getElementObj(elementId) {
  return document.getElementById(elementId);
}
function validate(elementId, elementIdError, message) {
    let check=true;
    let el = getElementObj(elementId);
    let el_error = getElementObj(elementIdError);
    
    if(el.value =='') { 
        check=false;
        el_error.innerHTML = message;
        el.style.border = "1px solid red";
        el.style.borderRadius = "0.25rem";
    }else{
        check=true;
        el_error.innerHTML = "";
        el.style.border = "1px solid red";
        el.style.borderRadius = "0.25rem";
    }
    return check;
}
function validateForm(){
    let isSubmited=true;
    let check_user = validate('user_name','user_name_error','Bạn phải nhập họ tên');                     
    let check_email = validate('user_mail','user_mail_error','Bạn phải nhập mail');                    
    let check_phone = validate('user_phone','user_phone_error','Bạn phải nhập sđt');
    let check_add = validate('user_add','user_add_error','Bạn phải nhập địa chỉ');
    if(check_user == false || check_email == false || check_phone == false || check_add == false){
        isSubmited=false;
   }
    return isSubmited; 
}
</script>