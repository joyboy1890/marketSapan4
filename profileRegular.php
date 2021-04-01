<!DOCTYPE html>
<html lang="en">

<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "check_login.php";
include_once "include/header.php"; 
include_once "include/connectDB.php"; 

$sql = "SELECT * FROM regular WHERE `reg_id` = '".$_SESSION["UserRegular"]["UserId"]."' ";
$query = $conn->query($sql);
$result = $query->fetch_assoc();

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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> ข้อมูลส่วนตัว</h4>
                            <form class="form-horizontal style-form" method="POST" action="regularController.php">
                                <input type="hidden" class="form-control" name="reg_id"
                                    value="<?php echo $result["reg_id"]; ?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อ</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="reg_fname"
                                            value="<?php echo $result["reg_fname"]; ?>">
                                    </div>
                                    <label class="col-sm-1 control-label">นามสกุล</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" name="reg_lname"
                                            value="<?php echo $result["reg_lname"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">เลขบัตรประจำตัวประชาชน</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="reg_id_card"
                                            value="<?php echo $result["reg_id_card"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="reg_tel"
                                            value="<?php echo $result["reg_tel"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ที่อยู่</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" cols="30" rows="5"
                                            name="reg_address"><?php echo $result["reg_address"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="updateProfile" class="btn btn-success">บันทึก</button>
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