
<?php
    /*
    session_start();
    $action = $_GET['action'];
   
    switch($action) {
         case 'add':
            $prd_id="";
            if(isset($_GET['prd_id'])) {
                 $prd_id = $_GET['prd_id'];
            }
             if(isset($_SESSION['cart'][$prd_id])){
                  $_SESSION['cart'][$prd_id]++;
             }else{
                  $_SESSION['cart'][$prd_id]= 1;
             }
             header("location:../../index.php?page_layout=cart");
             break;

         case 'submit':
            if(isset($_POST['update_cart'])){
                foreach($_POST['quantity'] as $prd_id => $qty){
                    $_SESSION['cart'][$prd_id] = $qty;
                }
                header("location:../../index.php?page_layout=cart");
            }
            if(isset($_POST['insert_cart'])){


            }
             break;
            
         case 'del':
            if(isset($_SESSION['cart'][$_GET['prd_id']])){
                unset($_SESSION['cart'][$_GET['prd_id']]);
            }
            if(empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
            header("location:../../index.php?page_layout=cart");
             break;
    } */


    session_start();
    $action = $_GET['action'];
   
    switch($action) {
         case 'add':
            $prd_id="";
            if(isset($_GET['prd_id'])) {
                 $prd_id = $_GET['prd_id'];
            }
             if(isset($_SESSION['cart'][$prd_id])){
                  $_SESSION['cart'][$prd_id]++;
             }else{
                  $_SESSION['cart'][$prd_id]= 1;
             }
             header("location:../../index.php?page_layout=cart");
             break;

         case 'submit':
            if(isset($_POST['update_cart'])){
                foreach($_POST['quantity'] as $prd_id => $qty){
                    $_SESSION['cart'][$prd_id] = $qty;
                }
                header("location:../../index.php?page_layout=cart");
            }
            if(isset($_POST['insert_cart'])){
                include_once "../../config/db.php";
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_phone = ['user_phone'];
                $user_address = ['user_address'];
                $status = 0;
                $total = $_POST['total'];
                $created = date('Y-m-d H:i:s');
                $sqlOrder = "INSERT INTO orders(user_name,user_email,user_phone,user_address,status,amount,created) VALUES('$user_name','$user_email','$user_phone','$user_address',$status,$total,' $created')" ;
                mysqli_query($conn,$sqlOrder);
                $orderId = mysqli_insert_id($conn);
                $sqlOrderDetail = "INSERT INTO orderdetail(order_id,prd_id,qty,price) VALUES ";
                foreach ($_SESSION['cart'] as $prd_id => $qty) {
                $price = $_POST['price'][$prd_id];
                $sqlOrderDetail .= "($orderId,$prd_id,$qty,$price),";
            }
                $sqlOrderDetail = rtrim($sqlOrderDetail,',');
                mysqli_query($conn,$sqlOrderDetail);
                unset ($_SESSION['cart']);
                header("location:../../index.php?page_layout=success");
            }
             break;
            
         case 'del':
            if(isset($_SESSION['cart'][$_GET['prd_id']])){
                unset($_SESSION['cart'][$_GET['prd_id']]);
            }
            if(empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
            header("location:../../index.php?page_layout=cart");
             break;
    }
?> 