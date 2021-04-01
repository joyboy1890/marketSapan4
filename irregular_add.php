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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> เพิ่มข้อมูลขาจร</h4>
                            <form class="form-horizontal style-form" method="POST" action="irregularController.php">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อ</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="irreg_fname">
                                    </div>
                                    <label class="col-sm-1 control-label">นามสกุล</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="irreg_lname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">เลขบัตรประจำตัวประชาชน</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="irreg_id_card">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="irreg_tel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ที่อยู่</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" cols="30" rows="5" name="irreg_address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ชื่อผู้ใช้</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="irreg_username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">รหัสผ่าน</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="irreg_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="add" class="btn btn-success">บันทึก</button>
                                        <a href="irregular.php" class="btn btn-danger">ย้อนกลับ</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- col-lg-12-->
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