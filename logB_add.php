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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> เพิ่มข้อมูลล็อค B</h4>
                            <form class="form-horizontal style-form" method="POST" action="logController.php">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ชื่อล็อค</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="log_detail_name" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">สถานะ</label>
                                    <div class="col-sm-10">
                                        <select name="log_detail_status" class="form-control" required="required">
                                            <option value="" disabled selected>เลือกสถานะ</option>
                                            <option value="0">ว่าง</option>
                                            <option value="1">ไม่ว่าง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="addB" class="btn btn-success">บันทึก</button>
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