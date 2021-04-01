<?php 
require_once "include/connectDB.php";

if(isset($_POST["checkRigisterRegular"])) {

    $irreg_fname = $_POST['irreg_fname'];
    $irreg_lname = $_POST['irreg_lname'];
    $irreg_id_card = $_POST['irreg_id_card'];
    $irreg_address = $_POST['irreg_address'];
    $irreg_tel = $_POST['irreg_tel'];
    $irreg_username = $_POST['irreg_username'];
    $irreg_password = $_POST['irreg_password'];

    $query = "INSERT INTO `irregular`(
        `irreg_id`,
        `irreg_fname`,
        `irreg_lname`,
        `irreg_id_card`,
        `irreg_address`,
        `irreg_tel`,
        `irreg_username`,
        `irreg_password`
    )
    VALUES (
        NULL, 
        '".$irreg_fname."', 
        '".$irreg_lname."', 
        '".$irreg_id_card."', 
        '".$irreg_address."', 
        '".$irreg_tel."', 
        '".$irreg_username."', 
        '".$irreg_password."'
    )";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='irregularPage.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='irregularRegister.php';
            </script>");
    }
}

?>