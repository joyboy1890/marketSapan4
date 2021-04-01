<?php 
// require_once "check_login.php";
require_once "include/connectDB.php";
$conn->set_charset("utf8");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["checkLogin"])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * 
    FROM `customers` 
    WHERE `cus_username` = '".$username."'
    AND `cus_password` = '".$password."'
    AND `cus_role` = 1 ";

    if ($query = $conn->query($sql)) {

        if($query->num_rows === 0) {

            echo ("<script LANGUAGE='JavaScript'>
                window.alert('ชื่อและรหัสผ่านไม่ถูกต้อง !');
                window.location.href='login.php';
                </script>");
        } else {

            foreach ($query as $row) {

                $_SESSION["UserBackend"]["UserId"] = $row["cus_id"];
                $_SESSION["UserBackend"]["Username"] = $row["cus_username"];
                $_SESSION["UserBackend"]["Password"] = $row["cus_password"];
                $_SESSION["UserBackend"]["UserFullName"] = $row["cus_name"];
                $_SESSION["UserBackend"]["UserAdd"] = $row["cus_address"];
                $_SESSION["UserBackend"]["UserTel"] = $row["cus_tel"];
                $_SESSION["UserBackend"]["role"] = $row["cus_role"];
            }
        }
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ยินดีต้อนรับเข้าสู่ระบบ !');
            window.location.href='index.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ชื่อและรหัสผ่านไม่ถูกต้อง !');
            window.location.href='login.php';
            </script>");
    }
}

if(isset($_POST["checkLoginRegular"])) {

    $reg_id_card = mysqli_real_escape_string($conn, $_POST['reg_id_card']);

    $sql = "SELECT
        reg_id,
        reg_fname,
        reg_lname,
        reg_id_card,
        reg_tel,
        reg_address
    FROM
        regular
    WHERE
        reg_id_card = '".$reg_id_card."' ";

    if ($query = $conn->query($sql)) {

        if($query->num_rows === 0) {

            echo ("<script LANGUAGE='JavaScript'>
                window.alert('ชื่อและรหัสผ่านไม่ถูกต้อง !');
                window.location.href='regularLogin.php';
                </script>");
        } else {

            foreach ($query as $row) {

                $_SESSION["UserRegular"]["UserId"] = $row["reg_id"];
                $_SESSION["UserRegular"]["UserIdCard"] = $row["reg_id_card"];
                $_SESSION["UserRegular"]["UserFullName"] = $row["reg_fname"] . ' ' . $row["reg_lname"];
                $_SESSION["UserRegular"]["UserAdd"] = $row["reg_address"];
                $_SESSION["UserRegular"]["UserTel"] = $row["reg_tel"];
                $_SESSION["UserRegular"]["role"] = 1;
            }
        }
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ยินดีต้อนรับเข้าสู่ระบบ !');
            window.location.href='index.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ชื่อและรหัสผ่านไม่ถูกต้อง !');
            </script>");
    }
}

if(isset($_POST["checkLoginIrRegular"])) {

    $irreg_username = mysqli_real_escape_string($conn, $_POST['irreg_username']);
    $irreg_password = mysqli_real_escape_string($conn, $_POST['irreg_password']);

    $sql = "SELECT
        `irreg_id`,
        `irreg_fname`,
        `irreg_lname`,
        `irreg_id_card`,
        `irreg_address`,
        `irreg_tel`,
        `irreg_username`
    FROM
        `irregular`
    WHERE
        `irreg_username` = '".$irreg_username."' AND `irreg_password` = '".$irreg_password."' ";

    if ($query = $conn->query($sql)) {

        if($query->num_rows === 0) {

            echo ("<script LANGUAGE='JavaScript'>
                window.alert('ชื่อและรหัสผ่านไม่ถูกต้อง !');
                window.location.href='irregularLogin.php';
                </script>");
        } else {

            foreach ($query as $row) {

                $_SESSION["UserRegular"]["UserId"] = $row["irreg_id"];
                $_SESSION["UserRegular"]["UserIdCard"] = $row["irreg_id_card"];
                $_SESSION["UserRegular"]["UserFullName"] = $row["irreg_fname"] . ' ' . $row["irreg_lname"];
                $_SESSION["UserRegular"]["UserAdd"] = $row["irreg_address"];
                $_SESSION["UserRegular"]["UserTel"] = $row["irreg_tel"];
                $_SESSION["UserRegular"]["UserUsername"] = $row["irreg_username"];
                $_SESSION["UserRegular"]["role"] = 2;
            }
        }
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ยินดีต้อนรับเข้าสู่ระบบ !');
            window.location.href='index.php';
            </script>");
    } else {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('ชื่อและรหัสผ่านไม่ถูกต้อง !');
            </script>");
    }
}

?>