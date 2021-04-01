<!DOCTYPE html>
<html lang="en">

<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["UserBackend"])) {
    include_once "employeeMain.php";
    exit();
}

if(isset($_SESSION["UserRegular"])) {
    if($_SESSION["UserRegular"]["role"] == 1)
        include_once "regularMain.php";
    if($_SESSION["UserRegular"]["role"] == 2)
        include_once "irregularMain.php";
    exit();
}

// require_once "check_login.php";
include_once "include/header.php"; 

?>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <?php include_once "layout/top_navigation.php"; ?>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <?php include_once "layout/sidebar_menu.php"; ?>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <form class="form-login" action="loginController.php" method="POST">
                        <h2 class="form-login-heading">เข้าสู่ระบบสำหรับพนักงาน</h2>
                        <div class="login-wrap">
                            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <br>
                            <button class="btn btn-theme btn-block" name="checkLogin" type="submit"><i
                                    class="fa fa-lock"></i> เข้าสู่ระบบ</button>
                            <hr>
                        </div>
                    </form>
                </div>
                <!-- /row -->
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        <?php include_once "layout/footer.php"; ?>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <?php include_once "include/javascript.php"; ?>
</body>

</html>