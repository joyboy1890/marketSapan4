<?php
$conn = mysqli_connect("localhost", "root", "", "db_marketspan4");

if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$conn->set_charset("utf8");

?>