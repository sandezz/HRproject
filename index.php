<?php
    include("connection.php");
    include 'AES.php';
    $tbl_name="admin";
	$tbl_name2="attendance";
	date_default_timezone_set('Asia/Kathmandu'); // CDT

$current_date = date('Y-m-d');
$current_time=date('H:i:s');
	
     if(isset($_POST['register']))
	 {
        $con = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
        mysqli_select_db($con,"employee")or die("cannot select DB");
        $myusername=$_POST['dname']; 
        $mypassword=$_POST['dpassword']; 
        session_start();
        $_SESSION['a']="userPresent";
         
        //code for AES encryption
	
        $imputKey = "qwertyuiopasdfgh";
        $blockSize = 256;
        $aes = new AES($mypassword, $imputKey, $blockSize);
        $encPass = $aes->encrypt();
		
        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myusername = mysqli_real_escape_string($con,$myusername);
        $mypassword = mysqli_real_escape_string($con,$mypassword);
        //admin login table
        $sql="SELECT * FROM info WHERE username='$myusername' and password='".$encPass."'";
        $result= mysqli_query($con,$sql);
        // Mysql_num_row is counting table row
        $row=mysqli_fetch_assoc($result);
		$id=$row['id'];
         $department=$row['department'];
		$_SESSION['username']=$myusername;
		$_SESSION['id']=$id;
         $_SESSION['department']=$department;
       if($row['department']=='Manager')
	   {
		   echo "<script>setTimeout(\"location.href = 'HRdashboard/html/index.php';\",1500);</script>";
		   $result6 = mysqli_query($con,"select * from attendance where username='$myusername' AND date1='$current_date'");
				$count6 = mysqli_num_rows($result6);
				
				if($count6==0)
				{
			     mysqli_query($con,"INSERT INTO attendance(username,date1,check_in) VALUES ('$myusername', '$current_date','$current_time')");
				}
	   }
	   else if($row['department']=='Consultant'||$row['department']=='Trainee'||$row['department']=='Intern')
	   {
		    echo "<script>setTimeout(\"location.href = 'HRdashboard/html/employee_details.php?id=$id';\",1500);</script>";
			$result6 = mysqli_query($con,"select * from attendance where username='$myusername' AND date1='$current_date'");
				$count6 = mysqli_num_rows($result6);
				
				if($count6==0)
				{
			     mysqli_query($con,"INSERT INTO attendance(username,date1,check_in) VALUES ('$myusername', '$current_date','$current_time')");
				}
	   }
			
          else
	         {
         $error="Wrong username or password";
             } 
			 }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>Seva Development</title>

        <style>
        .try{
			background-image: url(img1/004664.png);
            
		}
        .try1{
			background-image: url(img1/back.png);
            border-color: #143651;
		}
        .try2,.try3{
			background-image: url(img1/back.png);
            color: white;
        
		}
        </style>
        
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="HRdashboard/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="HRdashboard/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="HRdashboard/vendor/waves/waves.min.css">
		<link rel="stylesheet" href="HRdashboard/vendor/toastr/toastr.min.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="HRdashboard/html/css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="wrapper">
            <div class="site-content">
                <div class="content-area p-y-1">
                    <div class="container-fluid">
                        
                        <div class="card card-inverse card-black text-xs-center b-a-radius-0-5 try1 col-md-10 offset-md-1 col-xs-10 col-sm-10 offset-sm-1 offset-xs-1">
                            <div class = "">
                            <?php if(isset($error)){?>
                            <div class="col-md-4 m-b-1 m-md-b-0 offset-md-4">                    
                                <div class="alert alert-danger-fill alert-dismissible fade in m-b-0 try4 b-a-dashed b-a-secondary" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										Wrong Username and/or Password.
									</div>
                            </div>
                            <?php echo $error;}?>
                        </div>
                            <div class="card-block">
                                    <div class="avatar box-100 m-b-2">
                                    <img src="img1/sevadev.png" width="600px" height="300px">
                                    </div>
                                <div class="col-md-4 col-xs-12 col-sm-12 offset-md-4">
                                    <div class="card b-a-radius-0-5 try card-block">
                                        <div class="row row-sm try">
                                           <form method="POST"> 
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <h2 class="display-4 text-white">
                                                    Login
                                                </h2>
                                                <br />
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p class="text-white">
                                                    Enter your username and password.
                                                </p>
                                                <br />
                                                
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control b-a-radius-0-5 b-a-width-4" id="dname"   placeholder="Username" name="dname" required>
                                                    </div>
                                                </div>
                                                <br />
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control b-a-radius-0-5 b-a-width-4"  id="dpassword" name="dpassword" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <br />
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <button type="submit" class="btn btn-outline-secondary b-a-width-2 w-min-sm m-b-0-25 waves-effect waves-light b-a-radius-0-5 b-a-width-2 w-min-lg" name="register">Log In</button>
                                                <br />
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <input type = "button" onclick="window.location.href='forget_password.php'"     type="submit" class="btn btn-outline-secondary b-a-width-2 w-min-sm m-b-0-25 waves-effect waves-light b-a-radius-0-5 b-a-width-2" name="forget" value = "Forgot Password" >
                                                <br />
                                            </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <br />
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
    <!--    <button type="submit" class="btn btn-black btn-rounded btn-info run-toast m-b-0-25 waves-effect waves-light btn-primary btn-block w-min-sm m-b-0-25" data-type="success" name="register">
            Log In
        </button>-->
        
		<!-- Vendor JS -->
		<script type="text/javascript" src="HRdashboard/vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/sweetalert2/sweetalert2.min.js"></script>
		<script type="text/javascript" src="HRdashboard/vendor/toastr/toastr.min.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="HRdashboard/html/js/app.js"></script>
		<script type="text/javascript" src="HRdashboard/html/js/demo.js"></script>
		<script type="text/javascript" src="HRdashboard/html/js/ui-notifications.js"></script>
	</body>
</html>
