<?php
    $host="localhost"; 
    $username="root"; 
    $password=""; // Mysql password
    $db_name="employee"; // Database name
    $tbl_name1="info";
	
    $connect = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
    mysqli_select_db($connect,"$db_name")or die("cannot select DB");

	
    if(isset($_POST['save7']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$cit = $_POST['cit'];
    
	$cit = mysqli_real_escape_string($connect,$cit);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
				    cit = '$cit'
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }
?>
<?php
include("connection.php");
	include("session.php");
	include("active_employee.php");
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
		<title>Attendance Record</title>

		<!-- Vendor CSS -->
		
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="../vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../vendor/waves/waves.min.css">
		<link rel="stylesheet" href="../vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="../vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../vendor/multi-select/css/multi-select.css">
		<link rel="stylesheet" href="../vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="../dashboard/css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <?php
		include('active_employee.php');
		?>
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
            <!-- Sidebar -->
			<div class="site-sidebar-overlay"></div>
			<div class="site-sidebar">
				<a class="logo">
					<span class="l-text"><img class="img-circle"  src="../dashboard/images/sevalogo.png" /></span>
					<span ></span>
				</a>
				<div class="custom-scroll custom-scroll-dark">
					<ul class="sidebar-menu">
						<li class="menu-title">Main</li>
                        <div class="employee">
                        <li class="with-sub">
							<a href="index.php" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
								<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						    -->
                                <span class="s-icon"><i class="ti-bar-chart-alt"></i></span>
								<span class="s-text">Dashboard</span>
							</a>
                        </li>    
                        <li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-icon"><i class="ti-menu-alt"></i></span>
								<span class="s-text">Employee<tab></span>
								<span class="tag tag-primary">2</span>
                                </a>
							<ul>
								<li><a href="index_employee_details.php">Employee List</a></li>
                                <li><a href="basic_info.php">Basic Info</a></li>
								<li><a href="#">More</a></li>
								
                            </ul>
						</li>
                        </div>    
                        
                            <?php
                            $id1=$_SESSION['id'];
                            ?>                 
							
						
                        <li class="with-sub">
							<a href="employee_details.php?id=<?php echo $_SESSION['id']?>" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
								<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						    -->
                                <span class="s-icon"><i class="ti-pencil-alt"></i></span>
								<span class="s-text">Profile</span>
							</a>
							
						</li>
                        <li class="menu-title">More</li>
						
                        <li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-primary">5</span>
								<span class="s-icon"><i class="ti-bar-chart-alt"></i></span>
								<span class="s-text">Leave</span>
							</a>
							<ul>
								<li><a href="#">Apply</a></li>
								<li><a href="#">My Leave</a></li>
								<li><a href="#">Report</a></li>
								<li><a href="#">Leave List</a></li>
								<li><a href="#">Assign Leave</a></li>
							</ul>
						</li>
                        <li class="with-sub">
							<a href="attendance.php" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
                            -->
								
                                <span class="s-icon"><i class="ti-menu-alt"></i></span>
								<span class="s-text">Attendance</span>
							</a>
							
						</li> 
                        <li class="with-sub">
							<?php echo"<a class='waves-effect  waves-light' href=\"salary.php?id={$row['id']}\"  rel='external'><span class='s-icon'><i class='ti-menu-alt'></i></span><span class='s-text'> Salary </span> </a>";?>
							
						</li> 
						<li class="with-sub">
							<a href="calendar.php" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
                            -->
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
                                <span class="s-text">Calendar</span>
							</a>
							
							
						</li>
						
						
						<li class="menu-title compact-hide">Tags</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-primary">3</span>
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
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
								<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						    -->
                                <span class="s-icon"><i class="ti-menu-alt"></i></span>
								<span class="s-text">Announcements</span>
							</a>
							
						</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
						    -->
                                <span class="s-icon"><i class="ti-pencil-alt"></i></span>
								<span class="s-text">Organizational Charts</span>
							</a>
							
							
						</li>
					</ul>
				</div>
			</div>
			
			
			<!-- Sidebar second -->
			<div class="site-sidebar-second custom-scroll custom-scroll-dark">
			  
				
				<div class="tab-content">
					<div class="tab-pane active" id="tab-1" role="tabpanel">
						<div class="sidebar-chat animated fadeIn">
						    
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
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Salary</li>
						</ol>
                        
					<!--	<div class="box box-block bg-white">
							<p class="font-90 text-muted m-b-1">Click on the months to view Salary.</p>
							<div class="row">
								
								<div class="col-md-12">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne">
												<h6 class="panel-title box box-block bg-white">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														December
													</a>
												</h6>
											</div>
											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
												
                                                    <form method='post' action = "" name="save" value="save_personal"> 
                                                    
                                                    <div class="box box-block bg-white">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Select CIT:</label>
                                                        <div class="col-xs-8">
                                                            <div class="input-group bootstrap-touchspin">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                                                </span>
                                                                <span class="input-group-addon bootstrap-touchspin-prefix">$</span>
                                                                <input id="demo2" type="text" value="<?php echo $row1['cit']; ?>" name="demo2" class="form-control">
                                                                <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">+</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Salary:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php echo 'NRS. ';echo $row1['salary']; ?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Principal Salary this month.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Provident Fund:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
																	$salary = $row['salary'];
																	$pf1 = $salary * 0.1;
																	$pf = $pf1 * 2;
																	
																	echo 'NRS. '; echo $pf ;?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount deposited as Provident Fund.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Citizenship Investment Trust:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
															$cit = $row['cit'] / 100;
															
															$cit1 =$cit * ($salary *0.9) ;
															echo 'NRS. '; echo  $cit1 ; ?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount deposited as Citizenship Investment Trust.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Taxable Amount:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
																$salary = $row['salary'];
                                                                
																$sal = $salary - (($salary*0.1) + $cit1);
																
																echo 'NRS. ';echo $sal; ?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount that is subjected to Government Tax.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Government Tax:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
																$salary = $row['salary'];
																//$salcit = $salary - $cit;
																//$salpf = $salary * 0.1;
																$sal = $salary - (($salary*0.1) + $cit1);
																$ysal = $sal*12;
																$mar = $row['marital'];
																
																if ($mar ==  'No'){
																	
																	
																	if($ysal <= 350000){
																		$tax = $ysal * 0.01;						//1% of salary
																	}
																	if($ysal > 350000 && $ysal <= 450000){
																		$ftax = ($ysal-350000)*0.15;			//1% of 350000 + 15% of exceeding salary
																		$tax = 3500 + $ftax;
																	}
																	if($ysal > 450000 && $ysal <= 2500000){
																		$ftax = (3500+15000);
																		$ltax = ($ysal - 450000)*0.25;			//1% of 350000 + 15% of next 1 lakh + 25% of exceeding salary
																		$tax = $ftax + $ltax;
																	}
																	
																	
																	if($ysal > 2500000){
																		$ftax = (3500+15000+ 717500);			//1% of 350000 + 15% of next 1 lakh + 25% of next 2050000 + 35% of exceeding salary
																		$ltax = ($ysal - 2050000)*0.35;
																		$tax = $ftax + $ltax;
																	}
																	
																	$tax1 =$tax / 12; 
																	
																}
																
																
																
																else if ($mar ==  'Yes' || 'Divorced'){
																	
																	
																	if($ysal <= 400000){
																		$tax = $ysal * 0.01;						//1% of salary
																	}
																	if($ysal > 400000 && $ysal <= 500000){
																		$ftax = ($ysal-400000)*0.15;			//1% of 400000 + 15% of exceeding salary
																		$tax = 4000 + $ftax;
																	}
																	if($ysal > 500000 && $ysal <= 2500000){
																		$ftax = (4000+15000);
																		$ltax = ($ysal - 500000)*0.25;			//1% of 400000 + 15% of next 1 lakh + 25% of exceeding salary
																		$tax = $ftax + $ltax;
																	}
																	
																	
																	if($ysal > 2500000){
																		$ftax = (4000+15000+ 717500);			//1% of 400000 + 15% of next 1 lakh + 25% of next 2050000 + 35% of exceeding salary
																		$ltax = ($ysal - 2050000)*0.35;
																		$tax = $ftax + $ltax;
																	}
																	
																
																	
																}
																
																
																$tax1 =$tax / 12; 
																
																echo 'NRS. ';echo $tax1;}?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount that is deducted as Government Tax.</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Net Salary:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php
															echo 'NRS. ';echo ($salary - (($salary * 0.1) + $cit1 + $tax1));
															?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount that is deposited in Bank.</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" name = "save7" value = "Save"/>
                                                    </div>
                                                    
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    </div>
                                                   </form>
                                                
                                            </div>
										</div>
									</div>
                                </div>
							</div>
                            </div>-->
                       <div class="box bg-white">
								<div class="box bg-white">
									<ul class="nav nav-4" role="tablist">
                                        <li class="nav-item">
											<a class="nav-link" href="#collapseExample" role="tab" data-toggle="tab">
												<i class="pe-7s-id"></i> CIT
											</a>
										</li>
                                        <li class="nav-item">
											<a class="nav-link" href="#collapseExample1" role="tab" data-toggle="tab">
												<i class="pe-7s-id"></i> PF
											</a>
										</li>
                                        <li class="nav-item">
											<a class="nav-link" href="#collapseExample2" role="tab" data-toggle="tab">
												<i class="pe-7s-id"></i> Salary
											</a>
										</li>
                                        <li class="nav-item">
											<a class="nav-link" href="#collapseExample3" role="tab" data-toggle="tab">
												<i class="pe-7s-id"></i> TAX Rules
											</a>
										</li>
                                    
                                    </ul>
								</div>
                            
                        
                        
                        <div class="card-block m-b-8 bg-white">
                                <div class="tab-content">
                                    <div class="tab-pane " id="collapseExample" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">CIT</h4>
											<div class="box box-block bg-white">
                                                
												<form method='post' action = "" name="save" value="CIT">
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
									
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-xs-4 col-form-label">Select CIT:</label>
                                                            <div class="col-xs-8">
                                                            <div class="input-group bootstrap-touchspin">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                                                </span>
                                                                <span class="input-group-addon bootstrap-touchspin-prefix">$</span>
                                                                <input id="demo2" type="text" value="<?php echo $row1['cit']; ?>" name="demo2" class="form-control">
                                                                <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button">+</button>
                                                                </span>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="example-text-input" class="col-xs-4 col-form-label">Citizenship Investment Trust:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
															$cit = $row['cit'] / 100;
															
															$cit1 =$cit * ($salary *0.9) ;
															echo 'NRS. '; echo  $cit1 ; ?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount deposited as Citizenship Investment Trust.</span>
                                                        </div>
                                                        </div>
                                                    </div>
												</div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" name = "save7" value = "Save"/>
                                                    </div>
                                      
                                                </div>
                                            </form>
											</div>
										</div>
                                    <div class="tab-pane " id="collapseExample1" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">PF</h4>
											<div class="box box-block bg-white">
                                                
												
                                                <div class="row">
                                                    <div class="col-md-12">
									
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-xs-4 col-form-label">Provident Fund:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
																	$salary = $row['salary'];
																	$pf1 = $salary * 0.1;
																	$pf = $pf1 * 2;
																	
																	echo 'NRS. '; echo $pf ;?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount deposited as Provident Fund.</span>
                                                        </div>
                                                        </div>
                                                    </div>
												</div>
                                            
											</div>
										</div>
                                    <div class="tab-pane " id="collapseExample2" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">Salary</h4>
											<div class="box box-block bg-white">
                                                
												
                                                <div class="row">
                                                    <div class="col-md-6">
									
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-xs-4 col-form-label">Salary:</label>
                                                            <div class="col-xs-8">
                                                                <input class="form-control" type="text" value="<?php echo 'NRS. ';echo $row1['salary']; ?>" id="example-text-input" readonly>
                                                                <span class="font-90 text-muted">Principal Salary this month.</span>
                                                            </div>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           <label for="example-text-input" class="col-xs-4 col-form-label">Net Salary:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php
															echo 'NRS. ';echo ($salary - (($salary * 0.1) + $cit1 + $tax1));
															?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount that is deposited in Bank.</span>
                                                        </div> 
                                                        </div>
													</div>
												</div>
                                            
											</div>
										</div>
                                    <div class="tab-pane " id="collapseExample3" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">TAX Rules</h4>
											<div class="box box-block bg-white">
                                                
												
                                                <div class="row">
                                                    <div class="col-md-6">
									
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-xs-4 col-form-label">Taxable Amount:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
																$salary = $row['salary'];
                                                                
																$sal = $salary - (($salary*0.1) + $cit1);
																
																echo 'NRS. ';echo $sal; ?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount that is subjected to Government Tax.</span>
                                                        </div>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-xs-4 col-form-label">Government Tax:</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="text" value="<?php 
																$salary = $row['salary'];
																//$salcit = $salary - $cit;
																//$salpf = $salary * 0.1;
																$sal = $salary - (($salary*0.1) + $cit1);
																$ysal = $sal*12;
																$mar = $row['marital'];
																
																if ($mar ==  'No'){
																	
																	
																	if($ysal <= 350000){
																		$tax = $ysal * 0.01;						//1% of salary
																	}
																	if($ysal > 350000 && $ysal <= 450000){
																		$ftax = ($ysal-350000)*0.15;			//1% of 350000 + 15% of exceeding salary
																		$tax = 3500 + $ftax;
																	}
																	if($ysal > 450000 && $ysal <= 2500000){
																		$ftax = (3500+15000);
																		$ltax = ($ysal - 450000)*0.25;			//1% of 350000 + 15% of next 1 lakh + 25% of exceeding salary
																		$tax = $ftax + $ltax;
																	}
																	
																	
																	if($ysal > 2500000){
																		$ftax = (3500+15000+ 717500);			//1% of 350000 + 15% of next 1 lakh + 25% of next 2050000 + 35% of exceeding salary
																		$ltax = ($ysal - 2050000)*0.35;
																		$tax = $ftax + $ltax;
																	}
																	
																	$tax1 =$tax / 12; 
																	
																}
																
																
																
																else if ($mar ==  'Yes' || 'Divorced'){
																	
																	
																	if($ysal <= 400000){
																		$tax = $ysal * 0.01;						//1% of salary
																	}
																	if($ysal > 400000 && $ysal <= 500000){
																		$ftax = ($ysal-400000)*0.15;			//1% of 400000 + 15% of exceeding salary
																		$tax = 4000 + $ftax;
																	}
																	if($ysal > 500000 && $ysal <= 2500000){
																		$ftax = (4000+15000);
																		$ltax = ($ysal - 500000)*0.25;			//1% of 400000 + 15% of next 1 lakh + 25% of exceeding salary
																		$tax = $ftax + $ltax;
																	}
																	
																	
																	if($ysal > 2500000){
																		$ftax = (4000+15000+ 717500);			//1% of 400000 + 15% of next 1 lakh + 25% of next 2050000 + 35% of exceeding salary
																		$ltax = ($ysal - 2050000)*0.35;
																		$tax = $ftax + $ltax;
																	}
																	
																
																	
																}
																
																
																$tax1 =$tax / 12; 
																
																echo 'NRS. ';echo $tax1;}?>" id="example-text-input" readonly>
                                                            <span class="font-90 text-muted">Amount that is deducted as Government Tax.</span>
                                                        </div> 
                                                        </div>
													</div>
												</div>
                                            
											</div>
										</div>
                                </div>
                        </div>
                    </div>
                        
					</div>
				</div>
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						2016 © Neptune
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
        <script type="text/javascript" src="../vendor/nestable/jquery.nestable.js"></script>
		<script type="text/javascript" src="../vendor/multi-select/js/jquery.multi-select.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript" src="js/ui-nestable.js"></script>
		<script type="text/javascript" src="js/forms-plugins.js"></script>

<?php
mysqli_close($connection); // Closing Connection with Server
?>
	</body>
</html>