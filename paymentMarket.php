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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> ชำระค่าเช่าพื้นที่</h4>
                            <form class="form-horizontal style-form" method="POST" action="paymentController.php"
                                enctype="multipart/form-data">
                                <div class="form-group hidden">
                                    <label class="col-sm-2 control-label">รหัสการจอง</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="booking_id" value="<?php echo isset($_GET["booking_id"]) ? $_GET["booking_id"] : "" ; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ธนาคารที่ชำระ</label>
                                    <div class="col-sm-10">
                                        <select name="bank_id" class="form-control">
                                            <option value="1">ธนาคารกรุงไทย</option>
                                            <option value="2">ธนาคารไทยพาณิชย์</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">จำนวนเงิน</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="payment_price"
                                                aria-describedby="reg_price_span">
                                            <span class="input-group-addon" id="payment_price">บาท</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">สลิปการโอน</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="payment_image" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="add" class="btn btn-success">บันทึก</button>
                                    </div>
                                </div>
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
                                    <h3 class="panel-title">รายละเอียดการโอน</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อธนาคาร</th>
                                                    <th>เลขที่บัญชี</th>
                                                    <th>ชื่อบัญชี</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ธนาคารกรุงไทย</td>
                                                    <td>490-034899-6</td>
                                                    <td>นางสาวมยุรฉัตร เจือมา</td>
                                                </tr>
                                                <tr>
                                                    <td>ธนาคารไทยพาณิชย์</td>
                                                    <td>991-237170-3</td>
                                                    <td>นางสาวมยุรฉัตร เจือมา</td>
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