<?php 
require_once "check_login.php";
require_once "include/connectDB.php";

if(isset($_POST["add"])) {

    $irreg_fname = $_POST['irreg_fname'];
    $irreg_lname = $_POST['irreg_lname'];
    $irreg_id_card = $_POST['irreg_id_card'];
    $irreg_tel = $_POST['irreg_tel'];
    $irreg_address = $_POST['irreg_address'];
    $irreg_username = $_POST['irreg_username'];
    $irreg_password = $_POST['irreg_password'];

    $query = "INSERT INTO `irregular`(`irreg_id`, `irreg_fname`, `irreg_lname`, `irreg_id_card`, 
    `irreg_address`, `irreg_tel`, `irreg_username`, `irreg_password`, `irreg_create_date`, `irreg_update_date`)
    VALUES (NULL, '".$irreg_fname."', '".$irreg_lname."', '".$irreg_id_card."', '".$irreg_address."', '".$irreg_tel."', '".$irreg_username."',
    '".$irreg_password."', NOW(), NOW())";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='irregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='irregular.php';
            </script>");
    }
}

if(isset($_POST["edit"])) {

    $irreg_id = $_POST['irreg_id'];
    $irreg_fname = $_POST['irreg_fname'];
    $irreg_lname = $_POST['irreg_lname'];
    $irreg_id_card = $_POST['irreg_id_card'];
    $irreg_tel = $_POST['irreg_tel'];
    $irreg_address = $_POST['irreg_address'];
    $irreg_username = $_POST['irreg_username'];
    $irreg_password = $_POST['irreg_password'];

    $query = "UPDATE `irregular` 
    SET `irreg_fname`= '".$irreg_fname."', `irreg_lname`= '".$irreg_lname."', `irreg_id_card`= '".$irreg_id_card."',
    `irreg_tel`= '".$irreg_tel."', `irreg_address`= '".$irreg_address."', `irreg_username`= '".$irreg_username."', 
    `irreg_password`= '".$irreg_password."', `irreg_update_date`= NOW() 
    WHERE `irreg_id`= '".$irreg_id."' ";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='irregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='irregular.php';
            </script>");
    }
}

if(isset($_GET["delete"])) {

    $irreg_id = $_GET["irreg_id"];
    
    $query = "DELETE FROM irregular WHERE irreg_id = '".$irreg_id."' ";
   
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ลบข้อมูลสำเร็จ !');
            window.location.href='irregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ลบข้อมูลไม่สำเร็จ !');
            window.location.href='irregular.php';
            </script>");
    }
}

if(isset($_POST["updateProfile"])) {

    $irreg_id = $_POST['irreg_id'];
    $irreg_fname = $_POST['irreg_fname'];
    $irreg_lname = $_POST['irreg_lname'];
    $irreg_id_card = $_POST['irreg_id_card'];
    $irreg_tel = $_POST['irreg_tel'];
    $irreg_address = $_POST['irreg_address'];

    $query = "UPDATE `irregular` 
    SET `irreg_fname`= '".$irreg_fname."', `irreg_lname`= '".$irreg_lname."', `irreg_id_card`= '".$irreg_id_card."',
    `irreg_tel`= '".$irreg_tel."', `irreg_address`= '".$irreg_address."', `irreg_update_date`= NOW() 
    WHERE `irreg_id`= '".$irreg_id."' ";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='profileIrregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='profileIrregular.php';
            </script>");
    }
}

?>