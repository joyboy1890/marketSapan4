<!DOCTYPE html>
<html lang="en">

<?php 

require_once "check_login.php";
include_once "include/header.php"; 

include_once "paymentController.php";

$result = reportPayment($conn);

if(isset($_GET["payment_role"]) && !empty($_GET["payment_role"])) {

    $result = reportPaymentByDateAndRole($conn, $_GET["payment_create_date"], $_GET["payment_role"]);
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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> รายงานรายได้ของตลาด</h4>
                            <form class="form-horizontal style-form" method="GET" action="report_payment.php"
                                enctype="multipart/form-data">
                                <div class="form-group col-md-8">
                                    <label class="col-sm-2 col-md-2 control-label">เดือน</label>
                                    <div class="col-sm-5">
                                        <select name="payment_create_date" class="form-control" required>
                                            <option value="" selected disabled>กรุณาเลือกเดือน</option>
                                            <option value="<?php echo date("Y") . "-01"; ?>">มกราคม <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-02"; ?>">กุมภาพันธ์ <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-03"; ?>">มีนาคม <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-04"; ?>">เมษายน <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-05"; ?>">พฤษภาคม <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-06"; ?>">มิถุนายน <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-07"; ?>">กรกฎาคม <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-08"; ?>">สิงหาคม <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-09"; ?>">กันยายน <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-10"; ?>">ตุลาคม <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-11"; ?>">พฤศจิกายน <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-12"; ?>">ธันวาคม <?php echo date("Y"); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select name="payment_role" class="form-control" required>
                                            <option value="" selected disabled>กรุณาเลือกพ่อค้าแม่ค้า</option>
                                            <option value="1">ขาจร</option>
                                            <option value="2">ขาประจำ</option>
                                            <option value="0">ทั้งหมด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <div class="col-sm-10">
                                        <button type="submit" name="reportPayment" class="btn btn-success">ค้นหา</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <!-- col-lg-12-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ข้อมูลรายได้ของตลาด</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>รหัสการชำระเงิน</th>
                                                    <th>จำนวนเงิน</th>
                                                    <th>วันที่การชำระเงิน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sumPrice = array();
                                                    foreach ($result as $key => $value) { 
                                                        array_push($sumPrice, $value["payment_price"]);
                                                ?>
                                                <tr>
                                                    <td><?php echo $value["payment_id"]; ?></td>
                                                    <td><?php echo number_format($value["payment_price"]) . ' บาท'; ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($value["payment_create_date"]));?></td>
                                                </tr>
                                                <?php 
                                                    } 
                                                ?>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold !important">ราคารวม : </td>
                                                    <td><?php echo number_format(array_sum($sumPrice)) . ' บาท'; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

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