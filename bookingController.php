<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
require_once "check_login.php";
require_once "include/connectDB.php";

function getBooking($conn) {
    
    $sql = "SELECT booking_id, irregular.irreg_fname, irregular.irreg_lname, log.log_id, log.log_name, log.log_type, log_detail.log_detail_id, log_detail.log_detail_name, booking_price, booking_status, booking_create_date 
    FROM booking 
    LEFT JOIN irregular ON irregular.irreg_id = booking.irregular_id
    LEFT JOIN log ON log.log_id = booking.log_id
    LEFT JOIN log_detail ON log_detail.log_detail_id = booking.log_detail_id";

    $result = $conn->query($sql);
    
    return $result;
}

function getBookingByRegularID($conn) {
    
    $sql = "SELECT booking_id, log.log_id, log.log_name, log_detail.log_detail_id, log_detail.log_detail_name, booking_price, booking_status, booking_create_date 
    FROM booking 
    LEFT JOIN log ON log.log_id = booking.log_id
    LEFT JOIN log_detail ON log_detail.log_detail_id = booking.log_detail_id
    WHERE irregular_id = '".$_SESSION["UserRegular"]["UserId"]."' ";

    $result = $conn->query($sql);
    
    return $result;
}

function getBookingByIrregularID($conn) {
    
    $sql = "SELECT booking_id, log.log_id, log.log_name, log_detail.log_detail_id, log_detail.log_detail_name, booking_price, booking_status, booking_create_date 
    FROM booking 
    LEFT JOIN log ON log.log_id = booking.log_id
    LEFT JOIN log_detail ON log_detail.log_detail_id = booking.log_detail_id
    WHERE irregular_id = '".$_SESSION["UserRegular"]["UserId"]."' ";

    $result = $conn->query($sql);
    
    return $result;
}

if(isset($_GET["approveBooking"])) {

    $booking_id = $_GET['booking_id'];

    $query = "UPDATE `booking` SET `booking_status`= 1, `booking_update_date`= NOW() 
    WHERE `booking_id`= '".$booking_id."' ";
    
    if($conn->query($query)) {

        $update_query = "UPDATE `payment` SET `payment_status`= 1,`payment_update_date`= NOW() 
        WHERE `booking_id`= '".$booking_id."' ";

        $conn->query($update_query); 

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='payment_status_irregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='payment_status_irregular.php';
            </script>");
    }
}

if(isset($_GET["disapproveBooking"])) {

    $booking_id = $_GET['booking_id'];

    $query = "UPDATE `booking` SET `booking_status`= 2, `booking_update_date`= NOW() 
    WHERE `booking_id`= '".$booking_id."' ";
    
    if($conn->query($query)) {

        $update_query = "UPDATE `payment` SET `payment_status`= 2,`payment_update_date`= NOW() 
        WHERE `booking_id`= '".$booking_id."' ";

        $conn->query($update_query); 

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='payment_status_irregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='payment_status_irregular.php';
            </script>");
    }
}

if(isset($_GET["cancelBooking"])) {

    $booking_id = $_GET['booking_id'];

    $query = "UPDATE `booking` SET `booking_status`= 3, `booking_update_date`= NOW() 
    WHERE `booking_id`= '".$booking_id."' ";
    
    if($conn->query($query)) {

        $update_query = "UPDATE `payment` SET `payment_status`= 3,`payment_update_date`= NOW() 
        WHERE `booking_id`= '".$booking_id."' ";

        $conn->query($update_query); 

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='historyIrregular.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='historyIrregular.php';
            </script>");
    }
}

if(isset($_POST["bookingZoneA"])) {

    $log_id = $_POST['log_id'];
    $log_detail_id_1 = NULL;
    $log_detail_id_2 = NULL;
    $booking_price = $_POST['booking_price'];

    if(isset($_POST['log_detail_id_1']) && !empty($_POST['log_detail_id_1']))
        $log_detail_id_1 = $_POST['log_detail_id_1'];
    if(isset($_POST['log_detail_id_2']) && !empty($_POST['log_detail_id_2']))
        $log_detail_id_2 = $_POST['log_detail_id_2'];

    $query = "INSERT INTO `booking`(`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_create_date`, `booking_update_date`) 
    VALUES (null, '".$_SESSION["UserRegular"]["UserId"]."', '".$log_id."', '".$log_detail_id_1."', '".$booking_price."', NOW(), NOW())";
    
    if($conn->query($query)) {

        $update_query = "UPDATE `log_detail` SET `log_detail_status`= 1
        WHERE `log_detail_id`= '".$log_detail_id_1."' ";

        $conn->query($update_query); 

        if($log_detail_id_2 != NULL) {

            $query = "INSERT INTO `booking`(`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_create_date`, `booking_update_date`) 
            VALUES (null, '".$_SESSION["UserRegular"]["UserId"]."', '".$log_id."', '".$log_detail_id_2."', '".$booking_price."', NOW(), NOW())";

            $conn->query($query); 

            $update_query = "UPDATE `log_detail` SET `log_detail_status`= 1
            WHERE `log_detail_id`= '".$log_detail_id_2."' ";

            $conn->query($update_query);

        }

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='BookingZoneA.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='BookingZoneA.php';
            </script>");
    }
}

if(isset($_POST["bookingZoneB"])) {

    $log_id = $_POST['log_id'];
    $log_detail_id_1 = NULL;
    $log_detail_id_2 = NULL;
    $booking_price = $_POST['booking_price'];

    if(isset($_POST['log_detail_id_1']) && !empty($_POST['log_detail_id_1']))
        $log_detail_id_1 = $_POST['log_detail_id_1'];
    if(isset($_POST['log_detail_id_2']) && !empty($_POST['log_detail_id_2']))
        $log_detail_id_2 = $_POST['log_detail_id_2'];

    $query = "INSERT INTO `booking`(`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_create_date`, `booking_update_date`) 
    VALUES (null, '".$_SESSION["UserRegular"]["UserId"]."', '".$log_id."', '".$log_detail_id_1."', '".$booking_price."', NOW(), NOW())";
    
    if($conn->query($query)) {

        $update_query = "UPDATE `log_detail` SET `log_detail_status`= 1
        WHERE `log_detail_id`= '".$log_detail_id_1."' ";

        $conn->query($update_query); 

        if($log_detail_id_2 != NULL) {

            $query = "INSERT INTO `booking`(`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_create_date`, `booking_update_date`) 
            VALUES (null, '".$_SESSION["UserRegular"]["UserId"]."', '".$log_id."', '".$log_detail_id_2."', '".$booking_price."', NOW(), NOW())";

            $conn->query($query); 

            $update_query = "UPDATE `log_detail` SET `log_detail_status`= 1
            WHERE `log_detail_id`= '".$log_detail_id_2."' ";

            $conn->query($update_query);

        }

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='BookingZoneB.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='BookingZoneB.php';
            </script>");
    }
}

if(isset($_POST["bookingZoneC"])) {

    $log_id = $_POST['log_id'];
    $log_detail_id_1 = NULL;
    $log_detail_id_2 = NULL;
    $booking_price = $_POST['booking_price'];

    if(isset($_POST['log_detail_id_1']) && !empty($_POST['log_detail_id_1']))
        $log_detail_id_1 = $_POST['log_detail_id_1'];
    if(isset($_POST['log_detail_id_2']) && !empty($_POST['log_detail_id_2']))
        $log_detail_id_2 = $_POST['log_detail_id_2'];

    $query = "INSERT INTO `booking`(`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_create_date`, `booking_update_date`) 
    VALUES (null, '".$_SESSION["UserRegular"]["UserId"]."', '".$log_id."', '".$log_detail_id_1."', '".$booking_price."', NOW(), NOW())";
    
    if($conn->query($query)) {

        $update_query = "UPDATE `log_detail` SET `log_detail_status`= 1
        WHERE `log_detail_id`= '".$log_detail_id_1."' ";

        $conn->query($update_query); 

        if($log_detail_id_2 != NULL) {

            $query = "INSERT INTO `booking`(`booking_id`, `irregular_id`, `log_id`, `log_detail_id`, `booking_price`, `booking_create_date`, `booking_update_date`) 
            VALUES (null, '".$_SESSION["UserRegular"]["UserId"]."', '".$log_id."', '".$log_detail_id_2."', '".$booking_price."', NOW(), NOW())";

            $conn->query($query); 

            $update_query = "UPDATE `log_detail` SET `log_detail_status`= 1
            WHERE `log_detail_id`= '".$log_detail_id_2."' ";

            $conn->query($update_query);

        }

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลสำเร็จ !');
            window.location.href='BookingZoneC.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('บันทึกข้อมูลไม่สำเร็จ !');
            window.location.href='BookingZoneC.php';
            </script>");
    }
}

?>