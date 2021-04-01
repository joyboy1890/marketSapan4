<!DOCTYPE html>
<html lang="en">

<?php 

require_once "include/connectDB.php";
require_once "check_login.php";
include_once "include/header.php"; 

$sql = "SELECT log.*, log_detail.* 
    FROM log
    LEFT JOIN log_detail ON log_detail.log_id = log.log_id
    WHERE log.log_id = 3 ";
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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> โซน C</h4>
                            <form id="frmbooking" class="form-horizontal style-form" method="POST" action="bookingController.php">
                                <div class="form-group hidden">
                                    <label class="col-sm-2 col-sm-2 control-label">รหัสโซน</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="log_id" class="form-control" value="<?php echo $result["log_id"]; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label sr-only"></label>
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="img/ZoneC.jpg" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ประเภทสินค้า</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">เสื้อผ้าและของใช้</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ล็อค</label>
                                    <div class="col-sm-2">
                                        <select id="log_detail_id_1" name="log_detail_id_1" class="form-control" required="required">
                                            <option disabled selected value="">เลือกล็อค</option>
                                            <?php foreach ($query as $key => $value) { ?>
                                            <option value="<?php echo $value["log_detail_id"]; ?>" <?php echo ($value["log_detail_status"] != 0) ? "disabled" : "" ?>><?php echo $value["log_detail_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select id="log_detail_id_2" name="log_detail_id_2" class="form-control">
                                            <option disabled selected>เลือกล็อค</option>
                                            <?php foreach ($query as $key => $value) { ?>
                                            <option value="<?php echo $value["log_detail_id"]; ?>" <?php echo ($value["log_detail_status"] != 0) ? "disabled" : "" ?>><?php echo $value["log_detail_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ราคา</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="booking_price" class="form-control" value="270" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <a href="paymentMarket.php" class="btn btn-warning">ชำระเงิน</a>
                                        <button type="submit" name="bookingZoneC" class="btn btn-success">บันทึก</button>
                                    </div>
                                </div>
                            </form>
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
        $("#frmbooking").submit(function (e) {
            if ($("#log_detail_id_1").val() == $("#log_detail_id_2").val()) {
                e.preventDefault();

                alert("ไม่สามารถเลือกล็อคตรงกันได้ !");
                return;
            } else {

                $(this).submit(); 
            }
        });
    </script>

</body>

</html>