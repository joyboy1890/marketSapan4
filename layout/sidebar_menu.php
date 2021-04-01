<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <?php if(isset($_SESSION["UserRegular"]["role"]) && $_SESSION["UserRegular"]["role"] == 1) { ?>

            <p class="centered"><a href="profileRegular.php"><img src="img/profile.png" class="img-circle" width="80"></a></p>
            <h5 class="centered"><?php echo $_SESSION["UserRegular"]["UserFullName"]; ?></h5>
            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>

            <?php } ?>

            <?php if(isset($_SESSION["UserRegular"]["role"]) && $_SESSION["UserRegular"]["role"] == 2) { ?>

            <p class="centered"><a href="profileIrregular.php"><img src="img/profile.png" class="img-circle" width="80"></a></p>
            <h5 class="centered"><?php echo $_SESSION["UserRegular"]["UserFullName"]; ?></h5>
            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>

            <?php } ?>

            <?php if(isset($_SESSION["UserBackend"]["role"]) && $_SESSION["UserBackend"]["role"] == 1) { ?>

            <p class="centered"><a href="#"><img src="img/profile.png" class="img-circle" width="80"></a></p>
            <h5 class="centered">พนักงานดูแลระบบ</h5>
            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>

            <?php } ?>

            <?php if(!isset($_SESSION["UserBackend"]) && !isset($_SESSION["UserRegular"])) { ?>

            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="regularPage.php">
                    <i class="fa fa-cogs"></i>
                    <span>ขาประจำ</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="irregularPage.php">
                    <i class="fa fa-cogs"></i>
                    <span>ขาจร</span>
                </a>
            </li>

            <?php } ?>

            <?php if(isset($_SESSION["UserRegular"]["role"]) && $_SESSION["UserRegular"]["role"] == 1) { ?>

            <li class="sub-menu">
                <a href="paymentMarket.php">
                    <i class="fa fa-cogs"></i>
                    <span>ชำระเงินค่าเช่าพื้นที่</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="historyRegular.php">
                    <i class="fa fa-cogs"></i>
                    <span>ประวัติการชำระเงิน</span>
                </a>
            </li>

            <?php } ?>

            <?php if(isset($_SESSION["UserRegular"]["role"]) && $_SESSION["UserRegular"]["role"] == 2) { ?>

            <li class="sub-menu">
                <a href="irregularBooking.php">
                    <i class="fa fa-cogs"></i>
                    <span>จองล็อค</span>
                </a>
            </li>
                
            <li class="sub-menu">
                <a href="historyIrregular.php">
                    <i class="fa fa-cogs"></i>
                    <span>ประวัติการจอง</span>
                </a>
            </li>

            <?php } ?>

            <?php if(isset($_SESSION["UserBackend"]["role"]) && $_SESSION["UserBackend"]["role"] == 1) { ?>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>จัดการข้อมูล</span>
                </a>
                <ul class="sub">
                    <li><a href="regular.php">ข้อมูลขาประจำ</a></li>
                    <li><a href="irregular.php">ข้อมูลขาจร</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>จัดการข้อมูลล็อค</span>
                </a>
                <ul class="sub">
                    <li><a href="logA.php">ล็อค A</a></li>
                    <li><a href="logB.php">ล็อค B</a></li>
                    <li><a href="logC.php">ล็อค C</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>สถานะการชำระเงิน</span>
                </a>
                <ul class="sub">
                    <li><a href="payment_status_regular.php">ขาประจำ</a></li>
                    <li><a href="payment_status_irregular.php">ขาจร</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="history_irregular.php">
                    <i class="fa fa-cogs"></i>
                    <span>ประวัติการจองขาจร</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="report_payment.php">
                    <i class="fa fa-cogs"></i>
                    <span>รายงานรายได้ของตลาด</span>
                </a>
            </li>

            <?php } ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
