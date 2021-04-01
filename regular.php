<!DOCTYPE html>
<html lang="en">

<?php 
require_once "check_login.php";
include_once "include/header.php"; 
include_once "include/connectDB.php"; 

$sql = "SELECT * FROM regular";
$query = $conn->query($sql);
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
                <div class="row mt">
                    <div class="col-lg-12">
                        <!-- page start-->
                        <div class="content-panel">
                            <div>
                                <h4 class="mb"><i class="fa fa-angle-right"></i> ข้อมูลขาประจำ</h4>
                            </div>
                            <div class="text-right" style="padding-right: 15px;">
                                <a href="regular_add.php" class="btn btn-info">เพิ่มข้อมูลขาประจำ</a>
                            </div>
                            <div style="margin: 15px; padding-top: 15px;">
                                <table class="table table-bordered" id="table_data">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ-สกุล</th>
                                            <th>เลขบัตรประจำตัวประชาชน</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>โซน</th>
                                            <th>ประเภทสินค้าที่ขาย</th>
                                            <th>จำนวนล็อค</th>
                                            <th>เลขที่ล็อค</th>
                                            <th>ราคาล็อค</th>
                                            <th>วันที่เริ่มขาย</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value["reg_fname"] . ' ' . $value["reg_lname"]; ?></td>
                                            <td><?php echo $value["reg_id_card"]; ?></td>
                                            <td><?php echo $value["reg_tel"]; ?></td>
                                            <td><?php echo $value["reg_zone"]; ?></td>
                                            <td><?php echo $value["type_product_id"]; ?></td>
                                            <td><?php echo number_format($value["reg_amount_log"]); ?></td>
                                            <td><?php echo $value["reg_log_1"] . ', ' . $value["reg_log_2"]; ?></td>
                                            <td><?php echo number_format($value["reg_price"]) . ' บาท'; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($value["reg_create_date"])); ?></td>
                                            <td>
                                                <!-- <a href="regular_profile.php?reg_id=<?php echo $value["reg_id"]; ?>" class="btn btn-info">ข้อมูลส่วนตัว</a> -->
                                                <a href="regularProfile.php?reg_id=<?php echo $value["reg_id"]; ?>" class="btn btn-info">ข้อมูลส่วนตัว</a>
                                                <a href="regular_edit.php?reg_id=<?php echo $value["reg_id"]; ?>" class="btn btn-warning">แก้ไข</a>
                                                <a href="regularController.php?reg_id=<?php echo $value["reg_id"]; ?>&delete" class="btn btn-danger">ลบ</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- page end-->
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

    <script type="text/javascript">
        $(function () {
           $('#table_data').dataTable();
        });
    </script>
</body>

</html>