<?php 
require_once "check_login.php";
require_once "include/connectDB.php";

if(isset($_POST["add"])) {

    $reg_fname = $_POST['reg_fname'];
    $reg_lname = $_POST['reg_lname'];
    $reg_id_card = $_POST['reg_id_card'];
    $reg_tel = $_POST['reg_tel'];
    $reg_address = $_POST['reg_address'];
    $reg_zone = $_POST['reg_zone'];
    $type_product_id = $_POST['type_product_id'];
    $reg_amount_log = $_POST['reg_amount_log'];
    $reg_log_1 = $_POST['reg_log_1'];
    $reg_log_2 = $_POST['reg_log_2'];
    $reg_price = $_POST['reg_price'];
    $reg_create_date = $_POST['reg_create_date'];

    $query = "INSERT INTO `regular`(`reg_id`, `reg_fname`, `reg_lname`, `reg_id_card`, `reg_tel`, `reg_address`, `reg_zone`, 
    `type_product_id`, `reg_amount_log`, `reg_log_1`, `reg_log_2`, `reg_price`, `reg_create_date`) 
    VALUES (NULL, '".$reg_fname."', '".$reg_lname."', '".$reg_id_card."', '".$reg_tel."', '".$reg_address."', '".$reg_zone."',
    '".$type_product_id."', '".$reg_amount_log."', '".$reg_log_1."', '".$reg_log_2."', '".$reg_price."', '".$reg_create_date."')";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='regular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='regular.php';
            </script>");
    }
}

if(isset($_POST["edit"])) {

    $reg_id = $_POST['reg_id'];
    $reg_fname = $_POST['reg_fname'];
    $reg_lname = $_POST['reg_lname'];
    $reg_id_card = $_POST['reg_id_card'];
    $reg_tel = $_POST['reg_tel'];
    $reg_address = $_POST['reg_address'];
    $reg_zone = $_POST['reg_zone'];
    $type_product_id = $_POST['type_product_id'];
    $reg_amount_log = $_POST['reg_amount_log'];
    $reg_log_1 = $_POST['reg_log_1'];
    $reg_log_2 = $_POST['reg_log_2'];
    $reg_price = $_POST['reg_price'];

    $query = "UPDATE `regular` 
    SET `reg_fname`= '".$reg_fname."', `reg_lname`= '".$reg_lname."', `reg_id_card`= '".$reg_id_card."',
    `reg_tel`= '".$reg_tel."', `reg_address`= '".$reg_address."', `reg_zone`= '".$reg_zone."',
    `type_product_id`= '".$type_product_id."', `reg_amount_log`= '".$reg_amount_log."', `reg_log_1`= '".$reg_log_1."',
    `reg_log_2`= '".$reg_log_2."', `reg_price`= '".$reg_price."', `reg_update_date`= NOW() 
    WHERE `reg_id`= '".$reg_id."' ";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='regular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='regular.php';
            </script>");
    }
}

if(isset($_GET["delete"])) {

    $reg_id = $_GET["reg_id"];
    
    $query = "DELETE FROM regular WHERE reg_id = '".$reg_id."' ";
   
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ลบข้อมูลสำเร็จ !');
            window.location.href='regular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ลบข้อมูลไม่สำเร็จ !');
            window.location.href='regular.php';
            </script>");
    }
}

if(isset($_POST["updateProfile"])) {

    $reg_id = $_POST['reg_id'];
    $reg_fname = $_POST['reg_fname'];
    $reg_lname = $_POST['reg_lname'];
    $reg_id_card = $_POST['reg_id_card'];
    $reg_tel = $_POST['reg_tel'];
    $reg_address = $_POST['reg_address'];

    $query = "UPDATE `regular` 
    SET `reg_fname`= '".$reg_fname."', `reg_lname`= '".$reg_lname."', `reg_id_card`= '".$reg_id_card."',
    `reg_tel`= '".$reg_tel."', `reg_address`= '".$reg_address."', `reg_update_date`= NOW() 
    WHERE `reg_id`= '".$reg_id."' ";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='profileRegular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='profileRegular.php';
            </script>");
    }
}

?>