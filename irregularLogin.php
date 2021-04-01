<!DOCTYPE html>
<html lang="en">

<?php 

require_once "check_login.php";
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
                <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> ลงชื่อเข้าใช้งาน</h4>
                            <form class="style-form" method="POST" action="loginController.php">
                                <div class="form-group col-md-4 col-md-offset-4 pt-5">
                                    <label class="col-lg-12 control-label">ชื่อผู้ใช้</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" name="irreg_username">
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-md-offset-4 pt-5">
                                    <label class="col-lg-12 control-label">รหัสผ่าน</label>
                                    <div class="col-lg-12">
                                        <input type="password" class="form-control" name="irreg_password">
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-2 col-md-offset-4 mt">
                                    <label class="col-lg-12 control-label sr-only"></label>
                                    <div class="col-lg-12">
                                        <a type="button" class="btn btn-default">ลืมรหัสผ่าน</a>
                                    </div>
                                </div>
                                <div class="form-group col-md-1 mt">
                                    <label class="col-lg-12 control-label sr-only"></label>
                                    <div class="col-lg-12">
                                        <button type="submit" name="checkLoginIrRegular" class="btn btn-success">เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
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