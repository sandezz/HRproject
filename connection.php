<?php
 $host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="employee"; // Database name

$connect = mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

?>