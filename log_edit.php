<!DOCTYPE html>
<html lang="en">

<?php 

require_once "check_login.php";
include_once "include/header.php"; 
include_once "include/connectDB.php"; 

if(isset($_GET["log_detail_id"]) && !empty($_GET["log_detail_id"])) {

    $sql = "SELECT * FROM log_detail WHERE `log_detail_id` = '".$_GET["log_detail_id"]."' ";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
} else {
    
    echo "<h1>404 NOT FOUND.</h1>";
    exit;
}

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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> เพิ่มข้อมูลล็อค C</h4>
                            <form class="form-horizontal style-form" method="POST" action="logController.php">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ชื่อล็อค</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="log_detail_name" required="required" value="<?php echo $result["log_detail_name"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">สถานะ</label>
                                    <div class="col-sm-10">
                                        <select name="log_detail_status" class="form-control" required="required">
                                            <option value="" disabled selected>เลือกสถานะ</option>
                                            <option value="0" <?php echo ($result["log_detail_status"] == 0) ? "selected" : ""; ?>>ว่าง</option>
                                            <option value="1" <?php echo ($result["log_detail_status"] == 1) ? "selected" : ""; ?>>ไม่ว่าง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="addC" class="btn btn-success">บันทึก</button>
                                        <button type="button" onclick="goBack()" class="btn btn-danger">ย้อนกลับ</button>
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

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>