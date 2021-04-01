<!DOCTYPE html>
<html lang="en">

<?php 
require_once "check_login.php";
include_once "include/header.php"; 
include_once "include/connectDB.php"; 

$sql = "SELECT * FROM log_detail 
WHERE log_id = 2
ORDER BY log_detail_name ";
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
                                <h4 class="mb"><i class="fa fa-angle-right"></i> ข้อมูลล็อค B</h4>
                            </div>
                            <div class="text-right" style="padding-right: 15px;">
                                <a href="logB_add.php" class="btn btn-info">เพิ่มข้อมูลล็อค B</a>
                            </div>
                            <div style="margin: 15px; padding-top: 15px;">
                                <table class="table table-bordered" id="table_data">
                                    <thead>
                                        <tr>
                                            <th>รหัสล็อค</th>
                                            <th>ชื่อล็อค</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $key => $value) { ?>
                                        <tr class="<?php echo ($value["log_detail_status"] == 1) ? "danger" : "" ?>">
                                            <td><?php echo $value["log_detail_id"]; ?></td>
                                            <td><?php echo $value["log_detail_name"]; ?></td>
                                            <td>
                                                <?php 
                                                    if($value["log_detail_status"] == 0) 
                                                        echo "ว่าง";
                                                    if($value["log_detail_status"] == 1) 
                                                        echo "ไม่ว่าง"; 
                                                ?>
                                            </td>
                                            <td>
                                                <a href="log_edit.php?log_detail_id=<?php echo $value["log_detail_id"]; ?>" class="btn btn-warning">แก้ไข</a>
                                                <a href="logController.php?log_detail_id=<?php echo $value["log_detail_id"]; ?>&delete" class="btn btn-danger">ลบ</a>
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
           $('#table_data').dataTable({
            "order": [[ 0, 'asc' ]]
           });
        });
    </script>
</body>

</html>