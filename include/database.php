<?php
$dbname="ma";
$con = new mysqli("localhost", "root", "", "ma");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
?>
