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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> ลงทะเบียน</h4>
                            <form id="frmtest" class="style-form" method="POST" action="regisController.php">
                                <div class="form-group col-md-6 pt-5">
                                    <label class="col-lg-12 control-label">ชื่อ</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" name="irreg_fname" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pt-5">
                                    <label class="col-lg-12 control-label">นามสกุล</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" name="irreg_lname" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pt-5">
                                    <label class="col-lg-12 control-label">เลขบัตรประชาชน</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" name="irreg_id_card" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pt-5">
                                    <label class="col-lg-12 control-label">ที่อยู่</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" name="irreg_address" rows="4"
                                            required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pt-5">
                                    <label class="col-lg-12 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" name="irreg_tel" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pt-5">
                                    <label class="col-lg-12 control-label">ชื่อผู้ใช้</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" name="irreg_username" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pt-5">
                                    <label class="col-lg-12 control-label">รหัสผ่าน</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" id="irreg_password" name="irreg_password" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pt-5">
                                    <label class="col-lg-12 control-label">ยืนยันรหัสผ่าน</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" id="irreg_confirm_password" name="irreg_confirm_password" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mt">
                                    <label class="col-lg-12 control-label sr-only"></label>
                                    <div class="col-lg-12 text-right">
                                        <a href="irregularPage.php" class="btn btn-default">ยกเลิก</a>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mt">
                                    <label class="col-lg-12 control-label sr-only"></label>
                                    <div class="col-lg-12">
                                        <button type="submit" name="checkRigisterRegular"
                                            class="btn btn-success">ยืนยัน</button>
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

    <script>
        $("#frmtest").submit(function (e) {
            if ($("#irreg_password").val() != $("#irreg_confirm_password").val()) {
                e.preventDefault();

                alert("รหัสผ่านไม่ตรงกัน");
                return;
            } else {

                $(this).submit(); 
            }
        });
    </script>
</body>

</html>