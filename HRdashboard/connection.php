<?php $host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="employee"; // Database name
$tbl_name="info"; // Table name

$connect = mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
//mysqli_select_db($connect,"$db_name")or die("cannot select DB");
?>