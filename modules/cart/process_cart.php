<?php
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
    }
?>