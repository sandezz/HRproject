<?php
include("connection.php");
	include("session.php");
	include("active_employee.php");
	 //$connect = mysqli_connect("$host", "$username", "$password", "employee");
	  date_default_timezone_set('Asia/Kathmandu'); 
                              $current_date = date('Y-m-d');
                              $current_time=date('H:i:s');
							  $username=$_SESSION['username']; 
							   $department=$_SESSION['department'];
							   
						      $result=mysqli_query($connect,"select * from attendance where( date1='$current_date' and username='$username')");
						            $row=mysqli_fetch_assoc($result);
									$check_in=$row['check_in'];
									$check_out=$row['check_out'];
									$reason=$row['reason'];
									
                            
							 
                              
                     


if(isset($_POST['save5']))
						{
							
							$reason=$_POST['reason'];
						
							$query3="UPDATE attendance SET reason='$reason' WHERE (date1='$current_date'and username='$username')";
							$result3=mysqli_query($connect,$query3);
							
							
							
							
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
		<link rel="stylesheet" href="../vendor/DataTables/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="../vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="../vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap-daterangepicker/daterangepicker.css">

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
							<a href="indexs.php" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
                            -->
								
                                <span class="s-icon"><i class="ti-menu-alt"></i></span>
								<span class="s-text">Salary</span>
							</a>
							
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
								<a class="dropdown-item" href="../../logout.php">
									<i class="ti-email m-r-0-5"></i> Sign Out
								</a>
                                <a class="dropdown-item" href="../../punchout.php">
									<i class="ti-email m-r-0-5"></i> Punch Out
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
<!--						<div class="row row-md m-b-2">
							<div class="col-md-4">
								<div class="box box-block bg-white">
									<div class="clearfix m-b-1">
										<h5 class="pull-xs-left">Projects</h5>
										<div class="pull-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>
									<div class="text-xs-center">
										<div class="btn-group m-b-1">
											<button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Complete</button>
											<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Open</button>
										</div>
									</div>
									<div class="chart-container" style="height: 250px;">
										<div id="chart-1" class="chart-placeholder"></div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="box box-block bg-white">
									<div class="clearfix m-b-1">
										<h5 class="pull-xs-left">Tasks</h5>
										<div class="pull-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>
									<div class="text-xs-center">
										<div class="btn-group m-b-1">
											<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Today</button>
											<button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Week</button>
											<button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Month</button>
										</div>
									</div>
									<div class="chart-container" style="height: 250px;">
										<div id="chart-2" class="chart-placeholder"></div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="box box-block bg-white">
									<div class="clearfix m-b-1">
										<h5 class="pull-xs-left">Sales</h5>
										<div class="pull-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>
									<div class="text-xs-center">
										<div class="btn-group m-b-1">
											<button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Mobile</button>
											<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Web</button>
											<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Retail</button>
										</div>
									</div>
									<div class="chart-container" style="height: 250px;">
										<div id="chart-3" class="chart-placeholder"></div>
									</div>
								</div>
							</div>
						</div>-->
						
							  
                        <div class="box box-block bg-white">
							<div class ="row row-md m-b-2">
                                <div class="col-md-8">
                                    <h5 class="m-b-1">Employee Attendance</h5><br>
					
                                </div>
								<div class="col-md-12">
                                    
									
									<div class="col-md-2">
									<span class="input-group-addon bg-primary b-0 text-white">Punch In :<?php echo ' '.$check_in;?></span>
                             <b>     <br> 
							 <span class="input-group-addon bg-primary b-0 text-white">Punch Out :<?php echo ' ' .$check_out;?></span> <br> <br>
                                 <b>
                                     <?php
									 if($check_out>$check_in)
									 {
                                    $diff_seconds  = strtotime($check_out) - strtotime($check_in);
                                     $total_hours = floor($diff_seconds/3600).'h:'.floor(($diff_seconds%3600)/60).'m';
                                     $result1= mysqli_query( $connect,"UPDATE attendance SET total_hours='$total_hours' WHERE date1='$current_date'and username='$username'") ;
									 
								?>
                                 <span class="input-group-addon bg-primary b-0 text-white">Total hours :<?php echo ' ' .$total_hours;?></span> 
									 <?php
									 }
									 ?>
							         </b>
                                </div>
                                    
                                   
								
								
								<div class="col-md-4">
                              <form method='post' action = "" name="save" value="save_personal">
                                  <textarea id="textarea" placeholder="Reason" class="form-control" maxlength="125" rows="7" name="reason"><?php echo $reason;?></textarea><br>
                                            
                              <input type="submit" class="btn btn-primary btn-sm m-b-0-25 waves-effect waves-light pull-xs-right" name = "save5" value = "Save" align="left"/>
                                            
                                            
                                        
                                    </form>
                                </div>
						
                                </div>
								
                            </div>
                        </div>
						
						<!--<h6 class="m-b-1">Punch In:<br><br> 3456</h6>-->
                        <div class="box box-block bg-white">  
                                  <h6>Date Range </h6>
								  <form method="POST" >
									<div class="input-daterange input-group" id="date-range">
									
									<span class="input-group-addon bg-primary b-0 text-white">From</span>
									<input type="date" class="form-control" name="start" placeholder="curdate()">
										<span class="input-group-addon bg-primary b-0 text-white">to</span>
										<input type="date" class="form-control" name="end" placeholder="curdate()">
										
									
									</div>
									<br>
                                      
                                      
                                     
                                      
									<?php
									if($department=='Manager')
							{
								
                                       
									
									
									echo' <div class="dropdown dropup pull-xs-left m-r-0-25">';
									
									echo '	<select class="btn btn-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="full_name"';
									
									
									
									$result = $connect->query("select full_name from info order by full_name");
									 while ($row = $result->fetch_assoc()) {

                                    unset( $name);
                 
                                    $name = $row['full_name']; 
								
									
									echo	'<a class="dropdown-item" href="#"> <option value="'.$name.'">'.$name.'</option> </a>';
										
									 }
									 
									echo '</div>';
									echo '</select>';
								echo '</div>';
								
							}?>
									<input type="submit" name="submit" align="left">
                                      
									
									 
									</form>	
                                     <br>									
							           <table class="table table-striped table-bordered dataTable" id="table-2">
                                <thead>
									<tr>
									    <th>Id </th>
										<th>Name</th>
										<th>Date</th>
										<th>Checkin Time</th>
										<th>Checkout Time</th>
                                        <th>Total Hours</th>
                                        <th>Reason</th>
                                        
										
										
									</tr>
								</thead>
								
							<?php	if($department=='Manager')
							{
								?>
								<tbody>
                                    <!-- populate table from mysql database -->
                                    <?php
									
                     $query = "SELECT attendance.date1,attendance.check_in,attendance.check_out,info.full_name,info.id,attendance.reason,attendance.total_hours FROM attendance INNER JOIN info ON attendance.username=info.username where attendance.date1='$current_date'";
					 if((isset($_POST['submit'])))
					 {
					 
					 $from_date=$_POST['start'];
			         $to_date=$_POST['end'];
					 $full_name=$_POST['full_name'];
					  $query2="SELECT attendance.date1,attendance.check_in,attendance.check_out,info.full_name,info.id,attendance.total_hours,attendance.reason from attendance inner join info ON attendance.username=info.username where ( (attendance.date1 between '$from_date' and '$to_date')and info.full_name='$full_name')";
                       $result2 = mysqli_query($connect, $query2);
                         
                                  
					   while ($row1= mysqli_fetch_array($result2,MYSQLI_NUM)):?>
                                     <tr>
                                        <td class="lalign">
                                            <?php echo $row1[4];?>
                                        </td>
										<td>
                                            <?php echo $row1[3];?>
                                        </td>
                                        <td>
                                            <?php echo $row1[0];?>
                                        </td>
                                        <td>
                                            <?php echo $row1[1];?>
                                        </td>
										<td>
                                            <?php echo $row1[2];?>
                                        </td>
                                         <td>
                                            <?php echo $row1[5];?>
                                        </td>
                                         <td>
                                            <?php echo $row1[6];?>
                                        </td>
                                       
                                     </tr>
                                     <?php 
									 endwhile;
					 }
					 
				
									
					 
					  else
					 
					 {
						 
						 $result = mysqli_query($connect, $query);
                             
                                while ($row2= mysqli_fetch_array($result,MYSQLI_NUM)):?>
                                     <tr>
                                        <td class="lalign">
                                            <?php echo $row2[4];?>
                                        </td>
										<td>
                                       
                                            <?php echo $row2[3];?>
                                        </td>
                                        <td>
                                            <?php echo $row2[0];?>
                                        </td>
                                        <td>
                                            <?php echo $row2[1];?>
                                        </td>
										<td>
                                            <?php echo $row2[2];?>
                                        </td>
										<td>
                                            <?php echo $row2[6];?>
                                        </td>
                                         <td>
                                            <?php echo $row2[5];?>
                                        </td>
                                       
                                     </tr>
                                     <?php 
									 endwhile;
					 }
									?>
                                 </tbody>
						<?php	}?>
								</div>
								
								<?php	
								if($department=='Consultant'||$department=='Intern'||$department=='Trainee')
							{
								?>
								<tbody>
                                    <!-- populate table from mysql database -->
                                    <?php
									
                     $query = "SELECT attendance.date1,attendance.check_in,attendance.check_out,info.full_name,info.id,attendance.reason,attendance.total_hours FROM attendance INNER JOIN info ON attendance.username=info.username where attendance.date1='$current_date' and attendance.username='$username'";
					 if((isset($_POST['submit'])))
					 {
					 
					 $from_date=$_POST['start'];
			         $to_date=$_POST['end'];
					  $query2="SELECT attendance.date1,attendance.check_in,attendance.check_out,info.full_name,info.id,attendance.reason, attendance.total_hours from attendance inner join info ON attendance.username=info.username where  (attendance.date1 between '$from_date' and '$to_date') and attendance.username='$username'";
                       $result2 = mysqli_query($connect, $query2);
					   while ($row1= mysqli_fetch_array($result2,MYSQLI_NUM)):?>
                                     <tr>
                                        <td class="lalign">
                                            <?php echo $row1[4];?>
                                        </td>
										<td>
                                       
                                            <?php echo $row1[3];?>
                                        </td>
                                        <td>
                                            <?php echo $row1[0];?>
                                        </td>
                                        <td>
                                            <?php echo $row1[1];?>
                                        </td>
										<td>
                                            <?php echo $row1[2];?>
                                        </td>
										<td>
                                            <?php echo $row1[6];?>
                                        </td>
                                         <td>
                                            <?php echo $row1[5];?>
                                        </td>
                                       
                                     </tr>
                                     <?php 
									 endwhile;
					 }
					 
				
									
					 
					  else
					 
					 {
						 
						 $result = mysqli_query($connect, $query);
                             
                                while ($row2= mysqli_fetch_array($result,MYSQLI_NUM)):?>
                                     <tr>
                                        <td class="lalign">
                                            <?php echo $row2[4];?>
                                        </td>
										<td>
                                       
                                            <?php echo $row2[3];?>
                                        </td>
                                        <td>
                                            <?php echo $row2[0];?>
                                        </td>
                                        <td>
                                            <?php echo $row2[1];?>
                                        </td>
										<td>
                                            <?php echo $row2[2];?>
                                        </td>
										<td>
                                            <?php echo $row2[6];?>
                                        </td>
                                         <td>
                                            <?php echo $row2[5];?>
                                        </td>
                                       
                                     </tr>
                                     <?php 
									 endwhile;
					 }
									?>
                                 </tbody>
							<?php
							}
							?>
									
							</table>
                                
						</div>
                        
<!--						<div class="row row-md m-b-2">
							<div class="col-md-4">
								<div class="box box-block bg-white">
									<h5 class="m-b-2">Current progress</h5>
									<p class="m-b-0-5">Vance Osborn <span class="pull-xs-right">25%</span></p>
									<progress class="progress progress-success progress-sm" value="25" max="100">100%</progress>
									<p class="m-b-0-5">Wolfe Stevie <span class="pull-xs-right">75%</span></p>
									<progress class="progress progress-danger progress-sm" value="75" max="100">100%</progress>
									<p class="m-b-0-5">Carleton Josiahn <span class="pull-xs-right">40%</span></p>
									<progress class="progress progress-info progress-sm" value="40" max="100">100%</progress>
									<p class="m-b-0-5">Ron Carran <span class="pull-xs-right">18%</span></p>
									<progress class="progress progress-primary progress-sm" value="18" max="100">100%</progress>
									<p class="m-b-0-5">Lucius Skyler <span class="pull-xs-right">90%</span></p>
									<progress class="progress progress-success progress-sm" value="90" max="100">100%</progress>
									<p class="m-b-0-5">Landon Graham <span class="pull-xs-right">63%</span></p>
									<progress class="progress progress-primary progress-sm m-b-0" value="63" max="100">100%</progress>
								</div>
							</div>
							<div class="col-md-8">
								<div class="box bg-white">
									<div class="box-block clearfix">
										<h5 class="pull-xs-left">Contracts</h5>
										<div class="pull-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>
									<table class="table m-md-b-0">
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Walmart</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">First project</span></a>
												</td>
												<td>
													<span class="text-muted">5 minutes ago</span>
												</td>
												<td>
													<span class="tag tag-primary">signed</span>
												</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Sinopec Group</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Second project</span></a>
												</td>
												<td>
													<span class="text-muted">3 days ago</span>
												</td>
												<td>
													<span class="tag tag-success">paid</span>
												</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Apple</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Third project</span></a>
												</td>
												<td>
													<span class="text-muted">Last monday</span>
												</td>
												<td>
													<span class="tag tag-success">paid</span>
												</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td>McKesson</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Another project</span></a>
												</td>
												<td>
													<span class="text-muted">5 minutes ago</span>
												</td>
												<td>
													<span class="tag tag-danger">lost</span>
												</td>
											</tr>
											<tr>
												<th scope="row">5</th>
												<td>Costco</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Old project</span></a>
												</td>
												<td>
													<span class="text-muted">3 days ago</span>
												</td>
												<td>
													<span class="tag tag-success">paid</span>
												</td>
											</tr>
											<tr>
												<th scope="row">6</th>
												<td>Foxconn</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Important project</span></a>
												</td>
												<td>
													<span class="text-muted">Last monday</span>
												</td>
												<td>
													<span class="tag tag-primary">signed</span>
												</td>
											</tr>
											<tr>
												<th scope="row">7</th>
												<td>Tata Group</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">First project</span></a>
												</td>
												<td>
													<span class="text-muted">5 minutes ago</span>
												</td>
												<td>
													<span class="tag tag-success">paid</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>-->
<!--						<div class="row row-md m-b-2">
							<div class="col-md-6">
								<div class="card">
									<div class="card-block b-b clearfix">
										<h5 class="pull-xs-left">Messages</h5>
										<div class="pull-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>
									<div class="items-list">
										<div class="il-item">
											<a class="text-black" href="#">
												<div class="media">
													<div class="media-left">
														<div class="avatar box-48">
															<img class="b-a-radius-circle" src="img/avatars/1.jpg" alt="">
															<i class="status bg-success bottom right"></i>
														</div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">John Doe</h6>
														<span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</span>
													</div>
												</div>
												<div class="il-icon"><i class="fa fa-angle-right"></i></div>
											</a>
										</div>
										<div class="il-item">
											<a class="text-black" href="#">
												<div class="media">
													<div class="media-left">
														<div class="avatar box-48">
															<img class="b-a-radius-circle" src="img/avatars/2.jpg" alt="">
															<i class="status bg-danger bottom right"></i>
														</div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">John Doe</h6>
														<span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</span>
													</div>
												</div>
												<div class="il-icon"><i class="fa fa-angle-right"></i></div>
											</a>
										</div>
										<div class="il-item">
											<a class="text-black" href="#">
												<div class="media">
													<div class="media-left">
														<div class="avatar box-48">
															<img class="b-a-radius-circle" src="img/avatars/3.jpg" alt="">
															<i class="status bg-secondary bottom right"></i>
														</div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">John Doe</h6>
														<span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</span>
													</div>
												</div>
												<div class="il-icon"><i class="fa fa-angle-right"></i></div>
											</a>
										</div>
									</div>
									<div class="card-block">
										<button type="submit" class="btn btn-primary btn-block">Open chat app</button>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box box-block bg-white">
									<h5 class="m-b-2">CPU load</h5>
									<div class="chart-container" style="height: 340px;">
										<div id="realtime" class="chart-placeholder"></div>
									</div>
								</div>
							</div>
						</div>-->
<!--						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 m-b-2">
									<div class="t-icon left bg-danger"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Orders</h6>
										<h1 class="m-b-0">1,325</h1>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 m-b-2">
									<div class="t-icon left bg-success"><i class="ti-bar-chart"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Revenue</h6>
										<h1 class="m-b-0">$ 47,855</h1>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 m-b-2">
									<div class="t-icon left bg-primary"><i class="ti-package"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Products</h6>
										<h1 class="m-b-0">6,800</h1>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 m-b-2">
									<div class="t-icon left bg-warning"><i class="ti-receipt"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Sold</h6>
										<h1 class="m-b-0">1,682</h1>
									</div>
								</div>
							</div>
						</div>-->
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
        <script type="text/javascript" src="../vendor/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="../vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="../vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="../vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="../vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="../vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="../vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/JSZip/jszip.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/pdfmake/build/pdfmake.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/pdfmake/build/vfs_fonts.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/Buttons/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../vendor/DataTables/Buttons/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="../vendor/jquery/app.min.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="../vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        
		

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript" src="js/tables-datatable.js"></script>
        <script type="text/javascript" src="js/ui-modal.js"></script>
		<script type="text/javascript" src="js/forms-pickers.js"></script>
	</body>
</html>
<?php



?>