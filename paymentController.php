<?php 
require_once "check_login.php";
require_once "include/connectDB.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getPaymentRegular($conn) {

    $sql = "SELECT payment_id, bank_id, regular.reg_fname, regular.reg_lname, payment_price, payment_image, payment_role, payment_status, payment_create_date 
    FROM payment 
    LEFT JOIN regular ON regular.reg_id = payment.reg_id
    WHERE payment_role = 1 AND payment.reg_id = ".$_SESSION['UserRegular']['UserId']." ";

    $result = $conn->query($sql);
    
    return $result;
}

function getPaymentRegularWaitApprove($conn) {

    $sql = "SELECT payment_id, bank_id, regular.reg_fname, regular.reg_lname, regular.reg_zone, payment_price, payment_image, payment_role, payment_status, payment_create_date 
    FROM payment 
    LEFT JOIN regular ON regular.reg_id = payment.reg_id
    WHERE payment_role = 1 AND payment_status = 0";

    $result = $conn->query($sql);
    
    return $result;
}

function getPaymentIrregularWaitApprove($conn) {

    $sql = "SELECT payment_id, bank_id, payment.booking_id, irregular.irreg_fname, irregular.irreg_lname, log_detail.log_detail_name, payment_price, payment_image, payment_role, payment_status, booking.booking_create_date, payment_create_date 
    FROM payment 
    LEFT JOIN booking ON booking.booking_id = payment.booking_id
    LEFT JOIN irregular ON irregular.irreg_id = payment.reg_id
    LEFT JOIN log_detail ON log_detail.log_detail_id = booking.log_detail_id
    WHERE payment_role = 2 AND payment_status = 0 AND booking_status = 0";

    $result = $conn->query($sql);
    
    return $result;
}

function reportPayment($conn) {

    $firstDay = date("Y");

    $sql = "SELECT payment_id, bank_id, payment_price, payment_image, payment_role, payment_status, payment_create_date 
    FROM payment 
    WHERE payment_create_date LIKE '%" . $firstDay . "%' ";

    $result = $conn->query($sql);
    
    return $result;
}

function reportPaymentByDateAndRole($conn, $payment_create_date, $payment_role) {

    $firstDay = date("Y");

    if(isset($payment_create_date) && !empty($payment_create_date))
        $firstDay = $payment_create_date;

    $sql = "SELECT payment_id, bank_id, payment_price, payment_image, payment_role, payment_status, payment_create_date 
    FROM payment 
    WHERE payment_create_date LIKE '%" . $firstDay . "%' AND payment_role = '".$payment_role."' ";

    if($payment_role == 0) {
        
        $sql = "SELECT payment_id, bank_id, payment_price, payment_image, payment_role, payment_status, payment_create_date 
        FROM payment 
        WHERE payment_create_date LIKE '%" . $firstDay . "%' ";
    }

    $result = $conn->query($sql);
    
    return $result;
}

if(isset($_GET["approvePayment"])) {

    $payment_id = $_GET['payment_id'];

    $query = "UPDATE `payment` SET `payment_status`= 1,`payment_update_date`= NOW() 
    WHERE `payment_id`= '".$payment_id."' ";

    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='payment_status_regular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='payment_status_regular.php';
            </script>");
    }
}

if(isset($_GET["disapprovePayment"])) {

    $payment_id = $_GET['payment_id'];

    $query = "UPDATE `payment` SET `payment_status`= 2,`payment_update_date`= NOW() 
    WHERE `payment_id`= '".$payment_id."' ";
    
    if($conn->query($query)) {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='payment_status_regular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='payment_status_regular.php';
            </script>");
    }
}

if(isset($_POST["add"])) {

    $booking_id = 0;

    if(isset($_POST["booking_id"]) && !empty($_POST["booking_id"]))
        $booking_id = $_POST["booking_id"];

    $bank_id = $_POST['bank_id'];
    $payment_price = $_POST['payment_price'];
    $payment_image = $_FILES['payment_image'];

    $temp = explode(".", $payment_image["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
 
    $query = "INSERT INTO `payment`(`payment_id`, `bank_id`, `reg_id`, `booking_id`, `payment_price`, `payment_image`, `payment_role`) 
    VALUES (NULL, '".$bank_id."', ".$_SESSION['UserRegular']['UserId'].", ".$booking_id.", '".$payment_price."', '".$newfilename."', ".$_SESSION["UserRegular"]["role"].")";

    if($conn->query($query)) {
        
        move_uploaded_file($payment_image["tmp_name"], "img/payment/" . $newfilename);

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='index.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='index.php';
            </script>");
    }
}

?>