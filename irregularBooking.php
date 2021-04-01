<!DOCTYPE html>
<html lang="en">

<?php 
date_default_timezone_set("Asia/Bangkok");

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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> โซนของตลาด</h4>
                            <div class="col-lg-3 col-lg-offset-4 mb">
                                <a href="BookingZoneA.php" class="btn btn-success btn-lg btn-block <?php echo ((date('H') != 9 && date('H') != 10) || (date('H') != 12 && date("h:i") > "12:30")) ? "disabled" : ""; ?>">A</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-3 col-lg-offset-4 mt mb">
                                <a href="BookingZoneB.php" class="btn btn-success btn-lg btn-block <?php echo ((date('H') != 9 && date('H') != 10) || (date('H') != 12 && date("h:i") > "12:30")) ? "disabled" : ""; ?>">B</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-3 col-lg-offset-4 mt mb">
                                <a href="BookingZoneC.php" class="btn btn-success btn-lg btn-block <?php echo ((date('H') != 9 && date('H') != 10) || (date('H') != 12 && date("h:i") > "12:30")) ? "disabled" : ""; ?>">C</a>
                            </div>
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
</body>

</html>