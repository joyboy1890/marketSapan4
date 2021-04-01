<!DOCTYPE html>
<html lang="en">

<?php 
require_once "check_login.php";
include_once "include/header.php"; 
include_once "include/connectDB.php"; 


if(isset($_GET["reg_id"]) && !empty($_GET["reg_id"])) {

    $sql = "SELECT * FROM regular WHERE `reg_id` = '".$_GET["reg_id"]."' ";
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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> แก้ไขข้อมูลคำ</h4>
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
                                    <label class="col-sm-2 col-sm-2 control-label">ตำแหน่งโซน</label>
                                    <div class="col-sm-10">
                                        <select name="reg_zone" class="form-control">
                                            <option <?php echo ($result["reg_address"] == "A") ? "selected" : ""; ?>
                                                value="A">A</option>
                                            <option <?php echo ($result["reg_address"] == "B") ? "selected" : ""; ?>
                                                value="B">B</option>
                                            <option <?php echo ($result["reg_address"] == "C") ? "selected" : ""; ?>
                                                value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ประเภทสินค้า</label>
                                    <div class="col-sm-10">
                                        <select name="type_product_id" class="form-control">
                                            <option <?php echo ($result["reg_address"] == "ประเภทอาหารสด") ? "selected" : ""; ?>
                                                value="ประเภทอาหารสด">ประเภทอาหารสด</option>
                                            <option <?php echo ($result["reg_address"] == "ประเภทกับข้าวสำเร็จรูป") ? "selected" : ""; ?>
                                                value="ประเภทกับข้าวสำเร็จรูป">ประเภทกับข้าวสำเร็จรูป</option>
                                            <option <?php echo ($result["reg_address"] == "ประเภทเสื้อผ้าและของใช้") ? "selected" : ""; ?>
                                                value="ประเภทเสื้อผ้าและของใช้">ประเภทเสื้อผ้าและของใช้</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">จำนวนล็อค</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="reg_amount_log" value="<?php echo $result["reg_amount_log"]; ?>">
                                    </div>
                                    <label class="col-sm-1 control-label">เลขล็อค</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="reg_log_1" value="<?php echo $result["reg_log_1"]; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="reg_log_2" value="<?php echo $result["reg_log_2"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ราคาเช่า</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="reg_price" value="<?php echo $result["reg_price"]; ?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">วันที่เริ่มขาย</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="reg_create_date"  value="">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="edit" class="btn btn-success">บันทึก</button>
                                        <a href="regular.php" class="btn btn-danger">ย้อนกลับ</a>
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