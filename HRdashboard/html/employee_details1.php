<?php
session_start();
	if(!isset($_SESSION['a'])) {
	header("location:../../session.php");
	}
	
include("connection.php");
$connection = mysqli_connect("$host", "$username", "$password"); // Establishing Connection with Server
$db = mysqli_select_db($connection,"employee"); // Selecting Database
//MySQL Query to read data
$query = mysqli_query($connection,"select * from info");
?>

<?php
    $host="localhost"; // Host name
    $username="root"; // Mysql username
    $password=""; // Mysql password
    $db_name="employee"; // Database name
    $tbl_name1="info";
	
    $connect = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
    mysqli_select_db($connect,"$db_name")or die("cannot select DB");

	
    if(isset($_POST['save']) ){
        $ids = $_GET['id'];
	
        $id = $_GET['id'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $employeetype = $_POST['employeetype'];
        $worklocation = $_POST['worklocation'];
        $hiredate = $_POST['hiredate'];
    
	
        $email = mysqli_real_escape_string($connect,$email);
        $phone = mysqli_real_escape_string($connect,$phone);
        $department = mysqli_real_escape_string($connect,$department);
        $employeetype = mysqli_real_escape_string($connect,$employeetype);
        $worklocation = mysqli_real_escape_string($connect,$worklocation);
        $hiredate = mysqli_real_escape_string($connect,$hiredate);
	   
        $sql="SELECT username FROM info";
            $result=mysqli_query($connect,$sql);
            $result1 = mysqli_fetch_object($result);

        $query = " UPDATE info
				SET 
					 phone = '$phone' , email = '$email' , department = '$department' , employeetype = '$employeetype' , worklocation = '$worklocation' , hiredate = '$hiredate'
					 
				WHERE
					id = '$id'
                    ";
        mysqli_query($connect, $query);
        echo mysqli_error( $connect ); 
        
    }

    if(isset($_POST['save1']) ){
    $ids = $_GET['id'];
	
    $id = $_GET['id'];
	$fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $citizenshipno = $_POST['citizenshipno'];
    $bloodgroup = $_POST['bloodgroup'];
    $gender = $_POST['gender']; 
    $city = $_POST['city'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];
    $nationality = $_POST['nationality'];
    $licenceno = $_POST['licenceno'];
    $emergencyno = $_POST['emergencyno'];
    $marital = $_POST['marital'];
    
    
        
        
	$fname = mysqli_real_escape_string($connect,$fname);
	$lname = mysqli_real_escape_string($connect,$lname);
	$mname = mysqli_real_escape_string($connect,$mname);
	$address = mysqli_real_escape_string($connect,$address);
	$state = mysqli_real_escape_string($connect,$state);
	$phone = mysqli_real_escape_string($connect,$phone);
	$dob = mysqli_real_escape_string($connect,$dob);
	$citizenshipno = mysqli_real_escape_string($connect,$citizenshipno);
	$bloodgroup = mysqli_real_escape_string($connect,$bloodgroup);
	$gender = mysqli_real_escape_string($connect,$gender);
	$city = mysqli_real_escape_string($connect,$city);
	$country = mysqli_real_escape_string($connect,$country);
	$mobile = mysqli_real_escape_string($connect,$mobile);
	$nationality = mysqli_real_escape_string($connect,$nationality);
	$licenceno = mysqli_real_escape_string($connect,$licenceno);
	$emergencyno = mysqli_real_escape_string($connect,$emergencyno);
	$marital = mysqli_real_escape_string($connect,$marital);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 fname = '$fname' , mname = '$mname' , lname = '$lname' , address = '$address' , state = '$state' , phone = '$phone' ,  dob = '$dob' , citizenshipno = '$citizenshipno' , bloodgroup = '$bloodgroup' , city = '$city', country = '$country' , mobile = '$mobile' , nationality = '$nationality' , licenceno = '$licenceno' , emergencyno = '$emergencyno' , gender = '$gender' , marital = '$marital'
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }

    if(isset($_POST['save2']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$previouscomp = $_POST['previouscomp'];
    $fromdate = $_POST['fromdate'];
    $prevdepartment = $_POST['prevdepartment'];
    $previousjob = $_POST['previousjob'];
    $todate = $_POST['todate'];
        
        
	$previouscomp = mysqli_real_escape_string($connect,$previouscomp);
	$fromdate = mysqli_real_escape_string($connect,$fromdate);
	$prevdepartment = mysqli_real_escape_string($connect,$prevdepartment);
	$previousjob = mysqli_real_escape_string($connect,$previousjob);
	$todate = mysqli_real_escape_string($connect,$todate);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 previouscomp = '$previouscomp' , fromdate = '$fromdate' , prevdepartment = '$prevdepartment' , previousjob = '$previousjob' , todate = '$todate'
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }
    
    if(isset($_POST['save3']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$degree_year = $_POST['degree_year'];
    $fieldofstudy = $_POST['fieldofstudy'];
    
    
        
        
	$degree_year = mysqli_real_escape_string($connect,$degree_year);
	$fieldofstudy = mysqli_real_escape_string($connect,$fieldofstudy);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 fieldofstudy = '$fieldofstudy' , degree_year = '$degree_year' 
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }
    
    if(isset($_POST['save4']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$familyname = $_POST['familyname'];
    $familyrel = $_POST['familyrel'];
    $familyno = $_POST['familyno'];
    
    
        
        
	$familyname = mysqli_real_escape_string($connect,$familyname);
	$familyrel = mysqli_real_escape_string($connect,$familyrel);
	$familyno = mysqli_real_escape_string($connect,$familyno);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 familyname = '$familyname' , familyrel = '$familyrel' , familyno = '$familyno' 
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }
    
    if(isset($_POST['save5']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$hrnote = $_POST['hrnote'];
    
    
        
        
	$hrnote = mysqli_real_escape_string($connect,$hrnote);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 hrnote = '$hrnote' 
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
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

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="../vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../vendor/waves/waves.min.css">
		<link rel="stylesheet" href="../vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="../vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../vendor/select2/dist/css/select2.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="../vendor/multi-select/css/multi-select.css">
		<link rel="stylesheet" href="../vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
        <link rel="stylesheet" href="../vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../vendor/dropify/dist/css/dropify.min.css">
        <link rel="stylesheet" href="../vendor/pe7-icons/assets/Pe-icon-7-stroke.css">
		<link rel="stylesheet" href="../vendor/x-editable/bootstrap3-editable/css/bootstrap-editable.css">

        

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	
	<?php
 

	

$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysqli_select_db($connection,"employee"); // Selecting Database
//MySQL Query to read data
$query = mysqli_query($connection,"select * from info");
?>
	
<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$query1 = mysqli_query($connection,"select * from info where id=$id");


while ($row1 = mysqli_fetch_array($query1)) {
?>
	
	
	
	<body class="large-sidebar fixed-sidebar fixed-header skin-5">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>

			<!-- Sidebar -->
			<div class="site-sidebar-overlay"></div>
			<div class="site-sidebar">
				<a class="logo" href="#">
					<span class="l-text"><img class="img-circle"  src="../dashboard/images/sevalogo.png" /></span>
					<span ></span>
				</a>
				<div class="custom-scroll custom-scroll-dark">
					<ul class="sidebar-menu">
						<li class="menu-title">Main</li>
						
                        <li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-info">5</span>
								<span class="s-icon"><i class="ti-bar-chart-alt"></i></span>
								<span class="s-text">Leave</span>
							</a>
							<ul>
								<li><a href="#">Add Entitlement</a></li>
								<li><a href="#">Entitlement List</a></li>
								<li><a href="#">Report</a></li>
								<li><a href="#">Leave List</a></li>
								<li><a href="#">Assign Leave</a></li>
							</ul>
						</li>
						<li class="menu-title">More</li>
						
						<li class="menu-title compact-hide">Tags</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-info">3</span>
								<span class="s-icon"><i class="ti-bar-chart-alt"></i></span>
								<span class="s-text">Assets</span>
							</a>
							<ul>
								<li><a href="#">View assets</a></li>
								<li><a href="#">Vendors</a></li>
								<li><a href="#">Brands</a></li>
							</ul>
						</li>
                        
						<li class="with-sub">
							<a href="calendar1.php" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
						    -->
								<span class="s-text">Calendar</span>
							</a>
							
							
						</li>
						
						
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
								<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						    -->
								<span class="s-text">Announcements</span>
							</a>
							
						</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
						    -->
								<span class="s-text">Organizational Charts</span>
							</a>
							
							
						</li>
					</ul>
				</div>
			</div>
			
			<!-- Sidebar second -->
			<div class="site-sidebar-second custom-scroll custom-scroll-dark">
			    <!--
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab">Chat</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">Activity</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab">Todo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab-4" role="tab">Settings</a>
					</li>
				</ul>
				-->
				
				<div class="tab-content">
					<div class="tab-pane active" id="tab-1" role="tabpanel">
						<div class="sidebar-chat animated fadeIn">
						    <!--
							<div class="sidebar-group">
								<h6>Favorites</h6>
								<a class="text-black" href="#">
									<span class="sc-status bg-success"></span>
									<span class="sc-name">John Doe</span>
									<span class="sc-writing"> typing...<i class="ti-pencil"></i></span>
								</a>
								<a class="text-black" href="#">
									<span class="sc-status bg-success"></span>
									<span class="sc-name">Vance Osborn</span>
								</a>
								<a class="text-black" href="#">
									<span class="sc-status bg-danger"></span>
									<span class="sc-name">Wolfe Stevie</span>
									<span class="tag tag-primary">7</span>
								</a>
								<a class="text-black" href="#">
									<span class="sc-status bg-warning"></span>
									<span class="sc-name">Jonathan Mel</span>
								</a>
								<a class="text-black" href="#">
									<span class="sc-status bg-secondary"></span>
									<span class="sc-name">Carleton Josiah</span>
								</a>
							</div>
							-->
							<!--
							<div class="sidebar-group">
								<h6>Work</h6>
								<a class="text-black" href="#">
									<span class="sc-status bg-secondary"></span>
									<span class="sc-name">Larry Hal</span>
								</a>
								<a class="text-black" href="#">
									<span class="sc-status bg-success"></span>
									<span class="sc-name">Ron Carran</span>
									<span class="sc-writing"> typing...<i class="ti-pencil"></i></span>
								</a>
							</div>
							-->
							<!--
							<div class="sidebar-group">
								<h6>Social</h6>
								<a class="text-black" href="#">
									<span class="sc-status bg-success"></span>
									<span class="sc-name">Lucius Skyler</span>
									<span class="tag tag-primary">3</span>
								</a>
								<a class="text-black" href="#">
									<span class="sc-status bg-danger"></span>
									<span class="sc-name">Landon Graham</span>
								</a>
							</div>
							-->
						</div>
						<div class="sidebar-chat-window animated fadeIn">
							<div class="scw-header clearfix">
								<a class="text-grey pull-xs-left" href="#"><i class="ti-angle-left"></i> Back</a>
								<div class="pull-xs-right">
									<strong>Jonathan Mel</strong>
									<div class="avatar box-32">
										<img src="img/avatars/5.jpg" alt="">
										<span class="status bg-success top right"></span>
									</div>
								</div>
							</div>
							<div class="scw-item">
								<span>Hello!</span>
							</div>
							<div class="scw-item self">
								<span>Meeting at 16:00 in the conference room. Remember?</span>
							</div>
							<div class="scw-item">
								<span>No problem. Thank's for reminder!</span>
							</div>
							<div class="scw-item self">
								<span>Prepare to be amazed.</span>
							</div>
							<div class="scw-item">
								<span>Good. Can't wait!</span>
							</div>
							<div class="scw-form">
								<form>
									<input class="form-control" type="text" placeholder="Type...">
									<button class="btn btn-secondary" type="button"><i class="ti-angle-right"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab-2" role="tabpanel">
						<div class="sidebar-activity animated fadeIn">
							<div class="notifications">
								<div class="n-item">
									<div class="media">
										<div class="media-left">
											<div class="avatar box-48">
												<img class="b-a-radius-circle" src="img/avatars/1.jpg" alt="">
												<span class="n-icon bg-danger"><i class="ti-pin-alt"></i></span>
											</div>
										</div>
										<div class="media-body">
											<div class="n-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">uploaded <a class="text-black" href="#">monthly report</a></div>
											<div class="text-muted font-90">12 minutes ago</div>
										</div>
									</div>
								</div>
								<div class="n-item">
									<div class="media">
										<div class="media-left">
											<div class="avatar box-48">
												<img class="b-a-radius-circle" src="img/avatars/3.jpg" alt="">
												<span class="n-icon bg-success"><i class="ti-comment"></i></span>
											</div>
										</div>
										<div class="media-body">
											<div class="n-text"><a class="text-black" href="#">Vance Osborn</a> <span class="text-muted">commented </span> <a class="text-black" href="#">Project</a></div>
											<div class="n-comment m-y-0-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</div>
											<div class="text-muted font-90">3 hours ago</div>
										</div>
									</div>
								</div>
								<div class="n-item">
									<div class="media">
										<div class="media-left">
											<div class="avatar box-48">
												<img class="b-a-radius-circle" src="img/avatars/2.jpg" alt="">
												<span class="n-icon bg-danger"><i class="ti-email"></i></span>
											</div>
										</div>
										<div class="media-body">
											<div class="n-text"><a class="text-black" href="#">Ron Carran</a> <span class="text-muted">send you files</span></div>
											<div class="row row-sm m-y-0-5">
												<div class="col-xs-4">
													<img class="img-fluid" src="img/photos-1/1.jpg" alt="">
												</div>
												<div class="col-xs-4">
													<img class="img-fluid" src="img/photos-1/2.jpg" alt="">
												</div>
												<div class="col-xs-4">
													<img class="img-fluid" src="img/photos-1/3.jpg" alt="">
												</div>
											</div>
											<div class="text-muted font-90">30 minutes ago</div>
										</div>
									</div>
								</div>
								<div class="n-item">
									<div class="media">
										<div class="media-left">
											<div class="avatar box-48">
												<img class="b-a-radius-circle" src="img/avatars/4.jpg" alt="">
												<span class="n-icon bg-primary"><i class="ti-plus"></i></span>
											</div>
										</div>
										<div class="media-body">
											<div class="n-text"><a class="text-black" href="#">Larry Hal</a> <span class="text-muted">invited you to </span><a class="text-black" href="#">Project</a></div>
											<div class="text-muted font-90">10:58</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab-3" role="tabpanel">
						<div class="sidebar-todo animated fadeIn">
							<div class="sidebar-group">
								<h6>Important</h6>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Mock up</span>
									</label>
								</div>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" checked>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Prototype iPhone</span>
									</label>
								</div>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Build final version</span>
									</label>
								</div>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Approval docs</span>
									</label>
								</div>
							</div>
							<div class="sidebar-group">
								<h6>Secondary</h6>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" checked>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Website redesign</span>
									</label>
								</div>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" checked>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Skype call</span>
									</label>
								</div>
								<div class="st-item">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Blog post</span>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab-4" role="tabpanel">
						<div class="sidebar-settings animated fadeIn">
							<div class="sidebar-group">
								<h6>Main</h6>
								<div class="ss-item">
									<div class="text-truncate">Anyone can register</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
								</div>
								<div class="ss-item">
									<div class="text-truncate">Allow commenting</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
								</div>
								<div class="ss-item">
									<div class="text-truncate">Allow deleting</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
								</div>
							</div>
							<div class="sidebar-group">
								<h6>Notificatiоns</h6>
								<div class="ss-item">
									<div class="text-truncate">Commits</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
								</div>
								<div class="ss-item">
									<div class="text-truncate">Messages</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
								</div>
							</div>
							<div class="sidebar-group">
								<h6>Security</h6>
								<div class="ss-item">
									<div class="text-truncate">Daily backup</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
								</div>
								<div class="ss-item">
									<div class="text-truncate">API Access</div>
									<div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			-->

			<!-- Template options -->
			<div class="template-options custom-scroll custom-scroll-dark">
			    <!--
				<div class="to-toggle"><i class="ti-settings"></i></div>
				-->
				<div class="to-content">
					<h6>Layouts</h6>
					<div class="row m-b-2 text-xs-center">
					    <!--
						<div class="col-xs-6 m-b-2">
							<a href="index.html">
								<img src="img/layouts/1.png" class="img-fluid">
							</a>
							<div class="text-muted">Default</div>
						</div>
						-->
						<!--
						<div class="col-xs-6 m-b-2">
							<label>
								<input name="compact-sidebar" type="checkbox">
								<div class="to-icon"><i class="ti-check"></i></div>
								<img src="img/layouts/2.png" class="img-fluid">
							</label>
							<div class="text-muted">Compact Sidebar</div>
						</div>
						-->
						<!--
						<div class="col-xs-6 m-b-2">
							<label>
								<input name="fixed-header" type="checkbox" checked>
								<div class="to-icon"><i class="ti-check"></i></div>
								<img src="img/layouts/3.png" class="img-fluid">
							</label>
							<div class="text-muted">Fixed Header</div>
						</div>
						-->
						<!--
						<div class="col-xs-6 m-b-2">
							<label>
								<input name="boxed-wrapper" type="checkbox">
								<div class="to-icon"><i class="ti-check"></i></div>
								<img src="img/layouts/4.png" class="img-fluid">
							</label>
							<div class="text-muted">Boxed Wrapper</div>
						</div>
						-->
					</div>
					<!--
					<h6>Skins</h6>
					-->
					<!--
					<div class="row">
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-default" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-white"></span>
									<span class="skin-second skin-dark-blue"></span>
									<span class="skin-third bg-info"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-1" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first skin-dark-blue-2"></span>
									<span class="skin-second bg-white"></span>
									<span class="skin-third bg-danger"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-2" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-white"></span>
									<span class="skin-second bg-black"></span>
									<span class="skin-third bg-success"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-3" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-white"></span>
									<span class="skin-second skin-grey"></span>
									<span class="skin-third bg-purple"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-4" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first skin-dark-blue"></span>
									<span class="skin-second skin-dark-blue-2"></span>
									<span class="skin-third bg-warning"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-5" type="radio" checked>
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-primary"></span>
									<span class="skin-second bg-white"></span>
									<span class="skin-third bg-primary"></span>
								</div>
							</label>
						</div>
					</div>
					-->
				</div>
			</div>

			<!-- Header -->
			<div class="site-header">
				<nav class="navbar navbar-dark">
					<ul class="nav navbar-nav">
						<li class="nav-item m-r-1 hidden-lg-up">
							<a class="nav-link collapse-button" href="#">
								<i class="ti-menu"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav pull-xs-right">
						<li class="nav-item dropdown">
						    <!--
							<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
								<i class="ti-check"></i>
								<span class="tag tag-success top">3</span>
							</a>
							-->
							<div class="dropdown-tasks dropdown-menu dropdown-menu-right animated slideInUp">
							    <!--
								<div class="t-item">
									<div class="m-b-0-5">
										<a class="text-black" href="#">First Task</a>
										<span class="pull-xs-right text-muted">75%</span>
									</div>
									
									<progress class="progress progress-danger progress-sm" value="75" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="img/avatars/2.jpg" alt="">
									</span>
									<a class="text-black" href="#">John Doe</a>, <span class="text-muted">5 min ago</span>
								</div>
								-->
								<!--
								<div class="t-item">
									<div class="m-b-0-5">
										<a class="text-black" href="#">Second Task</a>
										<span class="pull-xs-right text-muted">40%</span>
									</div>
									<progress class="progress progress-purple progress-sm" value="40" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="img/avatars/3.jpg" alt="">
									</span>
									<a class="text-black" href="#">John Doe</a>, <span class="text-muted">15:07</span>
								</div>
								-->
								<!--
								<div class="t-item">
									<div class="m-b-0-5">
										<a class="text-black" href="#">Third Task</a>
										<span class="pull-xs-right text-muted">100%</span>
									</div>
									<progress class="progress progress-warning progress-sm" value="100" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="img/avatars/4.jpg" alt="">
									</span>
									<a class="text-black" href="#">John Doe</a>, <span class="text-muted">yesterday</span>
								</div>
								-->
								<!--
								<div class="t-item">
									<div class="m-b-0-5">
										<a class="text-black" href="#">Fourth Task</a>
										<span class="pull-xs-right text-muted">60%</span>
									</div>
									<progress class="progress progress-success progress-sm" value="60" max="100">100%</progress>
									<span class="avatar box-32">
										<img src="img/avatars/5.jpg" alt="">
									</span>
									<a class="text-black" href="#">John Doe</a>, <span class="text-muted">3 days ago</span>
								</div>
								-->
								<!--
								<a class="t-item text-black text-xs-center" href="#">
									<strong>View all tasks</strong>
								</a>
								-->
							</div>
						</li>
						<li class="nav-item dropdown">
						    <!--
							<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
								<i class="ti-bell"></i>
								<span class="tag tag-danger top">12</span>
							</a>
							-->
							<!--
							<div class="dropdown-messages dropdown-tasks dropdown-menu dropdown-menu-right animated slideInUp">
								<div class="m-item">
									<div class="mi-icon bg-info"><i class="ti-comment"></i></div>
									<div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">commented post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
									<div class="mi-time">5 min ago</div>
								</div>
								<div class="m-item">
									<div class="mi-icon bg-danger"><i class="ti-heart"></i></div>
									<div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">liked post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
									<div class="mi-time">15:07</div>
								</div>
								<div class="m-item">
									<div class="mi-icon bg-purple"><i class="ti-user"></i></div>
									<div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">followed</span> <a class="text-black" href="#">Kate Doe</a></div>
									<div class="mi-time">yesterday</div>
								</div>
								<div class="m-item">
									<div class="mi-icon bg-danger"><i class="ti-heart"></i></div>
									<div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">liked post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
									<div class="mi-time">3 days ago</div>
								</div>
								<a class="t-item text-black text-xs-center" href="#">
									<strong>View all notifications</strong>
								</a>
							</div>
							-->
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
								<div class="avatar box-32">
								 Settings
								<!--   
									<img src="img/avatars/1.jpg" alt="">
							    -->
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated flipInY">
								<a class="dropdown-item" href="../../punchout.php" >
									<i class="ti-email m-r-0-5"></i> Punch out
								</a>
								<a class="dropdown-item" href="../../logout.php">
									<i class="ti-email m-r-0-5"></i> Sign Out
								</a>
								<!--
								<a class="dropdown-item" href="#">
									<i class="ti-user m-r-0-5"></i> Profile
								</a>
								<a class="dropdown-item" href="#">
									<i class="ti-settings m-r-0-5"></i> Settings
								</a>
								-->
								<!--
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="ti-help m-r-0-5"></i> Help</a>
								<a class="dropdown-item" href="#"><i class="ti-power-off m-r-0-5"></i> Sign out</a>
								-->
							</div>
						</li>
						
						<!--
						<li class="nav-item hidden-md-up">
							<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-1">
								<i class="ti-more"></i>
							</a>
						</li>
						-->
						<!--
						<li class="nav-item">
							<a class="nav-link site-sidebar-second-toggle" href="#" data-toggle="collapse">
								<i class="ti-arrow-left"></i>
							</a>
						</li>
						-->
					</ul>
					<div class="navbar-toggleable-sm collapse" id="collapse-1">
					    <!--
						<div class="header-form pull-md-left m-md-r-1">
							<form>
								<input type="text" class="form-control b-a" placeholder="Search for...">
								<button type="submit" class="btn bg-white b-a-0">
									<i class="ti-search"></i>
								</button>
							</form>
						</div>
						-->
						<!--
						<ul class="nav navbar-nav">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
									Add
								</a>
								<div class="dropdown-menu animated flipInY">
									<a class="dropdown-item" href="#">
										Link
										<span class="tag tag-primary">3</span>
									</a>
									<a class="dropdown-item" href="#">Another link</a>
									<a class="dropdown-item" href="#">
										Something else here
										<span class="tag tag-success">7</span>
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Separated link</a>
								</div>
							</li>
						</ul>
						-->
					</div>
				</nav>
			</div>

			<div class="site-content">
				<!-- Content -->
				<div class="content-area p-y-1">
					<div class="container-fluid">
                        <ol class="breadcrumb no-bg m-b-1">
								<li class="breadcrumb-item "><a href="employee_details1.php?id=<?php echo $_SESSION['id'];?>">Home</a></li>
                                
                                <li class="breadcrumb-item "><?php echo $row1['full_name']; ?></li>
				        </ol>   
                        <div class="row row-md m-b-2">
                            <div class="col-md-4">
								<div class="box bg-white user-5">
									<div class="u-content">
										<div class="avatar box-96 m-b-2">
											<img class="img-circle m-r-1" src="img/avatars/10.jpg" alt="">
										</div>
										<h5><a class="text-black" href="#"><?php echo $row1['full_name']; ?></a></h5>
										<p class="text-muted m-b-1"><?php echo $row1['department']; ?></p>
									</div>
								</div>  
                                <div class="box bg-white">
									<ul class="nav nav-4" role="tablist">
										<li class="nav-item">
											<a class="nav-link" href="#basic" role="tab" data-toggle="tab">
												<i class="pe-7s-id"></i> Basic Information
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#personal" role="tab" data-toggle="tab">
												<i class="pe-7s-user"></i> Personal Information
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#job" role="tab" data-toggle="tab">
												<i class="pe-7s-medal"></i> Experiences
												
											</a>
										</li>
										<li class="nav-item ">
											<a class="nav-link" href="#education" role="tab" data-toggle="tab">
												<i class="pe-7s-study"></i> Education
											</a>
										</li>
                                        <li class="nav-item ">
											<a class="nav-link" href="#family" role="tab" data-toggle="tab">
												<i class="pe-7s-users"></i> Family Information
											</a>
										</li>
									</ul>
								</div>
                                <div class="card">
									<form method='post' action = "" name="save" value="save_personal">
                                    <div class="card-header">
										HR Note
                                        <input type="submit" class="btn btn-warning btn-sm m-b-0-25 waves-effect waves-light pull-xs-right" name = "save5" value = "Save"/>
									</div>
									<div class="card-block">
										<blockquote class="card-blockquote">
											
                                            <textarea id="textarea" class="form-control" maxlength="225" rows="5" name="hrnote" readonly name="hrnote"><?php echo $row1['hrnote']; ?></textarea>
                                            <div class="col-md-12">
                                                
                                            </div>
                                            
                                        </blockquote>
									</div>
                                    </form>
								</div>
                                <div class="card">
									<div class="card-header">
										Manager Note
									</div>
									<div class="card-block">
										<blockquote class="card-blockquote">
											<p><?php echo $row1['mnote']; ?></p>
										</blockquote>
									</div>
								</div>
                                
                            </div>
                            <div class="col-md-8">
                                <div class="card-block user-5 bg-white">
											<div class="row">
												<div class="col-xs-12 col-sm-6">
													<div class="box box-block m-b-1">
														<div class="media">
															<div class="media-left">
																<div class="avatar box-48">
																	<img class="" src="../vendor/ionicons/src/android-call.svg" alt="">
																</div>
															</div>
															<div class="media-body">
																<h6 class="media-heading m-t-0-5"><a class="text-black" href="#">Emergency Number</a></h6>
																<span class="font-90 text-muted"><?php echo $row1['emergencyno']; ?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="box box-block m-b-1">
														<div class="media">
															<div class="media-left">
																<div class="avatar box-48">
																	<img class="b-a-radius-circle" src="../vendor/ionicons/src/email.svg" alt="">
																	
																</div>
															</div>
															<div class="media-body">
																<h6 class="media-heading m-t-0-5"><a class="text-black" name = "email" href="#">Email</a></h6>
																<span class="font-90 text-muted"><?php echo $row1['email']; ?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="box box-block m-b-1">
														<div class="media">
															<div class="media-left">
																<div class="avatar box-48">
																	<img class="b-a-radius-circle" src="../vendor/ionicons/src/ios-home.svg" alt="">
																</div>
															</div>
															<div class="media-body">
																<h6 class="media-heading m-t-0-5"><a class="text-black" href="#">Address</a></h6>
																<span class="font-90 text-muted"><?php echo $row1['address']; ?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6">
													<div class="box box-block">
														<div class="media">
															<div class="media-left">
																<div class="avatar box-48">
																	<img class="b-a-radius-circle" src="../vendor/ionicons/src/android-calendar.svg" alt="">
																	
																</div>
															</div>
															<div class="media-body">
																<h6 class="media-heading m-t-0-5"><a class="text-black" href="#">Hire Date</a></h6>
																<span class="font-90 text-muted"><?php echo $row1['hiredate']; ?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
								</div> 
                                <div class="card-block m-b-8 bg-white">
									
									<div class="tab-content">
                                        <div class="tab-pane active" id="basic" role="tabpanel">
											<div class="box box-block bg-white">
                                                <h5>Basic Information</h5>
						
                                                
												<form method='post' value="save_basic"  action = "">
                                                <div class="row">
                                                    <div class="col-md-6">
									
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" value ="<?php echo $row1['username']; ?>" class="form-control" readonly name="username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" value ="<?php echo $row1['email']; ?>" class="form-control" name="email" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Department</label>
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="department" placeholder="<?php echo $row1['department']; ?>">
                                                                <option value="Consultant" <?php echo(isset($_POST['department'])&&($_POST['department']=='Consultant')?' selected="selected"':'');?>>Consultant</option>
                                                                <option value="Trainee"<?php echo(isset($_POST['department'])&&($_POST['department']=='Trainee')?' selected="selected"':'');?>>Trainee</option>
                                                                <option value="Intern"<?php echo(isset($_POST['department'])&&($_POST['department']=='Intern')?' selected="selected"':'');?>>Intern</option>
                                                                <option value="Manager"<?php echo(isset($_POST['department'])&&($_POST['department']=='Manager')?' selected="selected"':'');?>>Manager</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Employee type</label>
                                                            <input type="text" value ="<?php echo $row1['employeetype']; ?>" class="form-control" name="employeetype">
                                                        </div>
                                                        
                                                    </div>
													
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Employee Id</label>
                                                            <input type="text" value="<?php echo $row1['id']; ?>" class="form-control" disabled name="id"> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" name = "phone" value ="<?php echo $row1['phone']; ?>" data-mask="(999) 999-9999" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Work Location</label>
                                                            <input type="text" value ="<?php echo $row1['worklocation']; ?>" class="form-control" name="worklocation">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Hire Date</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose" value="<?php echo $row1['hiredate']; ?>" name="hiredate">
                                                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            </div>
                                                         
                                                        </div>
													</div>
												</div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-info btn-block waves-effect waves-light" name = "save" value = "Save"/>
                                                    </div>    
                                                </div>
                                            </form>
											</div>
										</div>
										<div class="tab-pane " id="personal" role="tabpanel">
											<div class="box box-block bg-white">
                                                <h5>Personal Information</h5>
												<form method='post' action = "" value="save_personal">
                                                <div class="row">
                                                    <div class="col-md-4">
                    
                                                            <label>First Name</label>
                                                            <input type="text" value="<?php echo $row1['fname']; ?>" class="form-control" maxlength="25" name="fname" id="placement">
                                                           
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input type="text" value="<?php echo $row1['mname']; ?>" class="form-control" maxlength="25" name="mname" id="placement">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" value="<?php echo $row1['lname']; ?>" class="form-control" maxlength="25" name="lname" id="placement">
                                                            
                                                        </div>
                                                    </div>
                            
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" value="<?php echo $row1['address']; ?>" class="form-control" name="address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>State/Province</label>
                                                            <input type="text" value="<?php echo $row1['state']; ?>"  class="form-control" name="state">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Landline Phone</label>
                                                            <input type="text" name = "phone" value="<?php echo $row1['phone']; ?>" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date Of Birth</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control mydatepicker" value="<?php echo $row1['dob']; ?>" name="dob">
                                                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Citizenship Number</label>
                                                            <input type="text" value="<?php echo $row1['citizenshipno']; ?>" class="form-control" name="citizenshipno">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Blood Group</label><br />
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="bloodgroup" placeholder="<?php echo $row1['bloodgroup']; ?>">
                                                                <option value="Consultant" <?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='A+')?' selected="selected"':'');?>>A+</option>
                                                                <option value="Trainee"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='A-')?' selected="selected"':'');?>>A-</option>
                                                                <option value="Manager"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='B+')?' selected="selected"':'');?>>B+</option>
                                                                <option value="Manager"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='B-')?' selected="selected"':'');?>>B-</option>
                                                                <option value="Manager"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='O+')?' selected="selected"':'');?>>O+</option>
                                                                <option value="Manager"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='O-')?' selected="selected"':'');?>>O-</option>
                                                                <option value="Manager"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='AB+')?' selected="selected"':'');?>>O-</option>
                                                                <option value="Manager"<?php echo(isset($_POST['bloodgroup'])&&($_POST['bloodgroup']=='AB-')?' selected="selected"':'');?>>O-</option>
                                                                
                                                            </select>
                                                        </div>
                                                       
								                                                     
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" value="<?php echo $row1['city']; ?>" class="form-control" name="city">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" value="<?php echo $row1['country']; ?>" class="form-control" name="country">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telephone Number</label>
                                                            <input type="text" value="<?php echo $row1['mobile']; ?>" class="form-control" name="mobile" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nationality</label>
                                                            <input type="text" value="<?php echo $row1['nationality']; ?>" class="form-control" name="nationality">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Licence Number</label>
                                                            <input type="text" value="<?php echo $row1['licenceno']; ?>" class="form-control" name="licenceno">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Emergency Contact</label>
                                                            <input type="text" value="<?php echo $row1['emergencyno']; ?>" class="form-control" name="emergencyno" data-mask="(999) 999-9999">
                                                        </div>
                                                        
														
														 
														
														
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           <label class="col-sm-4 form-control-label">Gender</label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-male" type="radio" class="custom-control-input" value="Male" name="gender"<?php if (isset($gender) && $gender=="Male") echo "checked";?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Male</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-female" type="radio" class="custom-control-input" value="Female" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Female</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-others" type="radio" class="custom-control-input" value="Others" name="gender"<?php if (isset($gender) && $gender=="Others") echo "checked";?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Others</span>
                                                           </label>  
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           <label class="col-sm-4 form-control-label" value="Married" name="marital" >Married</label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-yes" type="radio" class="custom-control-input" value="Yes" name="marital"<?php if (isset($marital) && $marital=="Yes") echo "checked";?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Yes</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-no" type="radio" class="custom-control-input" value="No" name="marital"<?php if (isset($marital) && $marital=="No") echo "checked";?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">No</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-divorced" type="radio" class="custom-control-input" value="Divorced" name="marital"<?php if (isset($marital) && $marital=="Divorced") echo "checked";?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Divorced</span>
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-info btn-block waves-effect waves-light" name = "save1" value = "Save"/>
                                                    </div>    
                                                </div>
												</form>
                                            </div>
                                            
                                        </div>
										<div class="tab-pane " id="job" role="tabpanel">
											<div class="box box-block bg-white">
                                                <h5>Work Experiences</h5>
                                                <form method='post' action = "" value="save_work">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Previous Company Name</label>
                                                            <input type="text" value="<?php echo $row1['previouscomp']; ?>" class="form-control" name="previouscomp">
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Previous Job Title</label>
                                                            <input type="text" value="<?php echo $row1['previousjob']; ?>" class="form-control" name="previousjob">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12">
                                                       <label>Job Duration</label>
                                                       <div class="input-daterange input-group" id="date-range">
                                                                <input type="text" class="form-control" name="fromdate" value="<?php echo $row1['fromdate']; ?>">
                                                                
                                                                <span class="input-group-addon bg-primary b-0 text-white">to</span>
                                                                <input type="text" class="form-control" name="todate" value="<?php echo $row1['todate']; ?>">
                                                        </div><br/>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Job Description</label><br />
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="job" placeholder="<?php echo $row1['job']; ?>">
                                                                <option value="Programming"<?php echo(isset($_POST['prevdepartment'])&&($_POST['job']=='Consultant')?' selected="selected"':'');?>>Programming</option>
                                                                <option value="Senior"<?php echo(isset($_POST['job'])&&($_POST['job']=='Senior')?' selected="selected"':'');?>>Senior</option>
                                                                <option value="Junior"<?php echo(isset($_POST['job'])&&($_POST['job']=='Junior')?' selected="selected"':'');?>>Junior</option>
                                                                <option value="Design"<?php echo(isset($_POST['job'])&&($_POST['job']=='Design')?' selected="selected"':'');?>>Design</option>
                                                                <option value="Executive"<?php echo(isset($_POST['job'])&&($_POST['job']=='Executive')?' selected="selected"':'');?>>Executive</option>
                                                                <option value="Intern"<?php echo(isset($_POST['job'])&&($_POST['job']=='Intern')?' selected="selected"':'');?>>Intern</option>
                                                                <option value="Trainee"<?php echo(isset($_POST['job'])&&($_POST['job']=='Trainee')?' selected="selected"':'');?>>Trainee</option>
                                                                <option value="Project Lead"<?php echo(isset($_POST['job'])&&($_POST['job']=='Project Lead')?' selected="selected"':'');?>>Project Lead</option>
                                                                <option value="Project Manger"<?php echo(isset($_POST['job'])&&($_POST['job']=='Project Manger')?' selected="selected"':'');?>>Project Manger</option>
                                                                <option value="Department Lead"<?php echo(isset($_POST['job'])&&($_POST['job']=='Department Lead')?' selected="selected"':'');?>>Department Lead</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Department</label><br />
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="prevdepartment" placeholder="<?php echo $row1['prevdepartment']; ?>">
                                                                <option value="Consultant" <?php echo(isset($_POST['prevdepartment'])&&($_POST['prevdepartment']=='Consultant')?' selected="selected"':'');?>>Consultant</option>
                                                                <option value="Trainee"<?php echo(isset($_POST['prevdepartment'])&&($_POST['prevdepartment']=='Trainee')?' selected="selected"':'');?>>Trainee</option>
                                                                <option value="Intern"<?php echo(isset($_POST['prevdepartment'])&&($_POST['prevdepartment']=='Intern')?' selected="selected"':'');?>>Intern</option>
                                                                <option value="Manager"<?php echo(isset($_POST['prevdepartment'])&&($_POST['prevdepartment']=='Manager')?' selected="selected"':'');?>>Manager</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-info btn-block waves-effect waves-light" name = "save2" value = "Save"/>
                                                    </div>    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
										<div class="tab-pane " id="education" role="tabpanel">
											<div class="box box-block bg-white">
                                                <h5>Education</h5>
                                                <form method='post' action = "" value="save_education">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group">
                                                        <label>Degree Obtained Year</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control mydatepicker" value="<?php echo $row1['degree_year']; ?>" name="degree_year">
                                                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            </div>
                                                    </div>
                                                    <br />
                                                    <div class="form-group">
                                                        <label for="select2-demo-1" class="col-md-4 form-control-label">Degree</label>
                                                         
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="fieldofstudy" placeholder="<?php echo $row1['fieldofstudy']; ?>">
                                                                <option value="SLC"<?php echo(isset($_POST['fieldofstudy'])&&($_POST['fieldofstudy']=='SLC')?' selected="selected"':'');?>>SLC</option>
                                                                <option value="CBSC"<?php echo(isset($_POST['fieldofstudy'])&&($_POST['fieldofstudy']=='CBSC')?' selected="selected"':'');?>>CBSC</option>
                                                                <option value="O-Level"<?php echo(isset($_POST['fieldofstudy'])&&($_POST['fieldofstudy']=='O-Level')?' selected="selected"':'');?>>O-Level</option>
                                                                <option value="ISc"<?php echo(isset($_POST['fieldofstudy'])&&($_POST['fieldofstudy']=='ISc')?' selected="selected"':'');?>>ISc</option>
                                                                <option value="Others"<?php echo(isset($_POST['fieldofstudy'])&&($_POST['fieldofstudy']=='Others')?' selected="selected"':'');?>>Others</option>
                                                            </select>
                                                        
                                                    </div>
                                                    
                                                  
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-info btn-block waves-effect waves-light" name = "save3" value = "Save"/>
                                                    </div>    
                                                </div>
                                                </form>
                                            </div>
										</div>
                                        <div class="tab-pane " id="family" role="tabpanel">
											<div class="box box-block bg-white">
                                                <h5>Family Information</h5>
                                                <form method='post' action = "" name="save" value="save_personal">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" value="<?php echo $row1['familyname']; ?>" class="form-control" name="familyname" maxlength="30">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Relationship Type</label>
                                                            <input type="text" value="<?php echo $row1['familyrel']; ?>" class="form-control" name="familyrel">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact</label>
                                                            <input type="text" value="<?php echo $row1['familyno']; ?>" class="form-control" name="familyno" data-mask="(999) 999-9999">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-info btn-block waves-effect waves-light" name = "save4" value = "Save"/>
                                                    </div>    
                                                </div>
                                                </form>
                                            </div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                        <div class="row row-md m-b-1">
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
				</div>
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						2016 © Seva Development Pvt. Ltd.
					</div>
				</footer>
			</div>

		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="../vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="../vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="../vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="../vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="../vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="../vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="../vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="../vendor/select2/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="../vendor/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		<script type="text/javascript" src="../vendor/autoNumeric/autoNumeric-min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<script type="text/javascript" src="../vendor/multi-select/js/jquery.multi-select.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
        <script type="text/javascript" src="../vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="../vendor/dropify/dist/js/dropify.min.js"></script>
		<script type="text/javascript" src="../vendor/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="../vendor/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script type="text/javascript" src="../vendor/moment/moment.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>    

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript" src="js/forms-upload.js"></script>
        <script type="text/javascript" src="js/forms-plugins.js"></script>
        <script type="text/javascript" src="js/forms-pickers.js"></script>
		<script type="text/javascript" src="js/forms-xeditable.js"></script>
        <script type="text/javascript" src="js/forms-masks.js"></script>
<?php
}
}
?>

<?php
mysqli_close($connection); // Closing Connection with Server
?>
    </body>
</html>