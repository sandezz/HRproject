<?php
session_start();
	if(!isset($_SESSION['a'])) 
	{
	header("location:http://localhost/HR%20project/index.php");
	}
?>