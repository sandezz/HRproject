<?php
include("HRdashboard/html/session.php");
?>
<?php
include("connection.php");
$connect = mysqli_connect("$host", "$username", "$password", "employee");
$username= $_SESSION['username'];
date_default_timezone_set('Asia/Kathmandu'); 
                              $current_date = date('Y-m-d');
                              $current_time=date('H:i:s');
							  $username=$_SESSION['username']; 
							   $department=$_SESSION['department'];
							   
						      $result=mysqli_query($connect,"select * from attendance where( date1='$current_date' and username='$username')");
						            $row=mysqli_fetch_assoc($result);
									$check_in=$row['check_in'];
									$check_out=$row['check_out'];

$diff_seconds  = strtotime($check_out) - strtotime($check_in);
$total_hours = floor($diff_seconds/3600).'h:'.floor(($diff_seconds%3600)/60).'m';
								

$result1= mysqli_query( $connect,"UPDATE attendance SET check_out='$current_time' WHERE date1='$current_date'and username='$username'") ;

    header('location:'.$_SERVER['HTTP_REFERER']);
	//header("location:javascript://history.go(-1)");
?>

