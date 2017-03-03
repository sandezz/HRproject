<?php
    include("../session.php");
	include("connection.php");
	
	
$tbl_name="users"; // Table name
$tbl_name1="info";
	
	$connect = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($connect,"$db_name")or die("cannot select DB");

	
	if(isset($_POST['register']))
	{
	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	$email=$_POST['email'];	
	$fname = $_POST['firstname'];
	$mname = $_POST['middlename'];
	$lname = $_POST['lastname'];
	$full_name = $fname." ".$mname." ".$lname;
	$status = $_POST['status'];
   
	
	$myusername = stripslashes($myusername);
	$myusername = mysqli_real_escape_string($connect,$myusername);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);
	
	$myusername = mysqli_real_escape_string($connect,$myusername);
	$mypassword = mysqli_real_escape_string($connect,$mypassword);
	$email = mysqli_real_escape_string($connect,$email);
	$full_name = mysqli_real_escape_string($connect,$full_name);
	$status = mysqli_real_escape_string($connect,$status);
	$mypassword = md5($mypassword); 
	
	
	mysqli_query($connect,"INSERT INTO info (username,password,email,full_name, status) 
	VALUES ('$myusername','$mypassword','$email','$full_name','$status')")or die(mysqli_error($connect));
	
	$_SESSION['success'] = 'Successfully Registered';
	echo "Sucessfully registered....... redirecting to HRM dashboard";
	echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
	
	exit();
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
		<title>HR Dashboard</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="vendor/waves/waves.min.css">
		<link rel="stylesheet" href="vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="vendor/morris/morris.css">
		<link rel="stylesheet" href="vendor/jvectormap/jquery-jvectormap-2.0.3.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="dashboard/css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="large-sidebar fixed-sidebar fixed-header skin-5">
		<div class="wrapper">
            
			<!-- Preloader -->
			<!--
			<div class="preloader"></div>
			-->

			<!-- Sidebar -->
			<div class="site-sidebar-overlay"></div>
			<div class="site-sidebar">
				<a class="logo" href="index.php">
					<span class="l-text"><img class="img-circle"  src="dashboard/images/sevalogo.png" /></span>
					<span ></span>
				</a>
				<div class="custom-scroll custom-scroll-dark">
					<ul class="sidebar-menu">
					    <!--
						<li class="menu-title m-t-0-5">Navigation</li>
						-->
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<!--
								<span class="s-icon"><i class="ti-dashboard"></i></span>
								-->
								
								
								<span class="s-text">Employee</span>
							</a>
							
							<ul>
								<li><a href="html/index_employee_details.php">Employee List</a></li>
								<li><a href="#">Add Note</a></li>
								<li><a href="#">Report</a></li>
							</ul>
							
						</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<!--
								<span class="s-icon"><i class="ti-dashboard"></i></span>
								-->
								
								<span class="s-text">Leave</span>
							</a>
							
							<ul>
								<li class="with-sub">
									<a href="#" class ="waves-effect waves-light">
									    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
										<span class="s-text">Entitlement</span>
									</a>
								
								<ul>
								<li><a href="#">Add Entitlement</a></li>
								<li><a href="#">Entitlement List</a></li>
								<li><a href="#">Reports</a></li>
								<li><a href="#">Leave list</a></li>
								<li><a href="#">Assign Leave</a></li>
								
							    </ul>
								</li>
							
							</ul>
							
						</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-danger">7</span>
								<span class="s-icon"><i class="ti-package"></i></span>
							-->
								<span class="s-text"></span>
							</a>
							<!--
							<ul>
								<li><a href="widgets-blog.html">Blog</a></li>
								<li><a href="widgets-social.html">Social</a></li>
								<li><a href="widgets-ecommerce.html">Ecommerce</a></li>
								<li><a href="widgets-navigation.html">Navigation</a></li>
								<li><a href="widgets-headers.html">Headers</a></li>
								<li><a href="widgets-footers.html">Footers</a></li>
								<li><a href="widgets-tiles.html">Tiles</a></li>
								<li><a href="widgets-modals.html">Modals</a></li>
							</ul>
							-->
						</li>
						
						<li class="menu-title">More</li>
                        <li class="with-sub">
							<a href="html/attendance.php" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
								<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						    -->
								<span class="s-text">Attendance</span>
							</a>
						
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
								<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						    -->
								<span class="s-text">Announcements</span>
							</a>
							<!--
							<ul>
								<li><a href="ui-buttons.html">Buttons</a></li>
								<li><a href="ui-dropdowns.html">Dropdowns</a></li>
								<li><a href="ui-notifications.html">Notifications</a></li>
								<li><a href="ui-cards.html">Cards</a></li>
								<li><a href="ui-navs.html">Navs</a></li>
								<li><a href="ui-progress.html">Progress</a></li>
								<li><a href="ui-modal.html">Modal</a></li>
								<li><a href="ui-carousel.html">Carousel</a></li>
								<li><a href="ui-typography.html">Typography</a></li>
								<li><a href="ui-grid.html">Grid</a></li>
								<li><a href="ui-other.html">Other</a></li>
							</ul>
							-->
                            
						</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
						    -->
								<span class="s-text">Organizational Charts</span>
							</a>
							<!--
							<ul>
								<li><a href="sortbutton.php">View Employee</a></li>
								<li><a href="register.php">Add Employee</a></li>
					
								<li><a href="forms-plugins.html">Plugins</a></li>
								<li><a href="forms-pickers.html">Form Pickers</a></li>
								<li><a href="forms-masks.html">Form Masks</a></li>
								<li><a href="forms-wizard.html">Form Wizard</a></li>
								<li><a href="forms-xeditable.html">X-editable</a></li>
								<li><a href="forms-upload.html">File Upload</a></li>
								<li><a href="forms-typeahead.html">Typeahead</a></li>
								<li><a href="forms-range-slider.html">Range Slider</a></li>
								
							</ul>
							-->
							
						</li>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
							
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="s-icon"><i class="ti-menu-alt"></i></span>
						    -->
								<span class="s-text">Assets</span>
							</a>
							
							<ul>
								<li><a href="tables-basic.html">View Assets</a></li>
								<li><a href="tables-datatable.html">Vendors</a></li>
								<li><a href="tables-editable.html">Brands</a></li>
								<!--
								<li><a href="tables-responsive.html">Responsive Tables</a></li>
								<li><a href="tables-jsgrid.html">jsGrid Tables</a></li>
								-->
							</ul>
							
						</li>
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-success">3</span>
								<span class="s-icon"><i class="ti-gallery"></i></span>
								<span class="s-text">Pages</span>
							</a>
							<ul>
								<li><a href="pages-blank.html">Blank</a></li>
								<li><a href="pages-403.html">Error 403</a></li>
								<li><a href="pages-404.html">Error 404</a></li>
								<li><a href="pages-500.html">Error 500</a></li>
								<li><a href="pages-faq.html">FAQ</a></li>
								<li><a href="pages-invoice.html">Invoice</a></li>
								<li><a href="pages-profile.html">Profile</a></li>
								<li><a href="pages-sign-in.html">Sign In</a></li>
								<li><a href="pages-sign-in2.html">Sign In 2</a></li>
								<li><a href="pages-reset-password.html">Reset Password</a></li>
								<li><a href="pages-sign-up.html">Sign Up</a></li>
								<li><a href="pages-contactform.html">Contact Form</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-view-grid"></i></span>
								<span class="s-text">Apps</span>
							</a>
							<ul>
								<li><a href="apps-inbox.html">Inbox</a></li>
								<li><a href="apps-chat.html">Chat</a></li>
								<li><a href="apps-contacts.html">Contacts</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-star"></i></span>
								<span class="s-text">Icons</span>
							</a>
							<ul>
								<li><a href="icons-fontawesome.html">Font Awesome</a></li>
								<li><a href="icons-material.html">Material Design</a></li>
								<li><a href="icons-themify.html">Themify Icons</a></li>
								<li><a href="icons-weather.html">Weather Icons</a></li>
								<li><a href="icons-ionicons.html">Ionicons</a></li>
								<li><a href="icons-typicons.html">Typicons</a></li>
								<li><a href="icons-pe7.html">Pe7 Icons</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-settings"></i></span>
								<span class="s-text">Utilities</span>
							</a>
							<ul>
								<li><a href="utilities-color.html">Color utilities</a></li>
								<li><a href="utilities-border.html">Border utilities</a></li>
								<li><a href="utilities-other.html">Other utilities</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="menu-title">More</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-location-arrow"></i></span>
								<span class="s-text">Extra</span>
							</a>
							<ul>
								<li><a href="extra-animations.html">Animations</a></li>
								<li><a href="extra-comments.html">Comments</a></li>
								<li><a href="extra-lightbox.html">Lightbox</a></li>
								<li><a href="extra-nestable.html">Nestable</a></li>
								<li><a href="extra-crop.html">Image Crop</a></li>
								<li><a href="extra-loading-progress.html">Loading Progress</a></li>
								<li><a href="extra-prices.html">Prices</a></li>
								<li><a href="extra-timeline.html">Timeline</a></li>
								<li><a href="extra-search.html">Search</a></li>
								<li><a href="extra-scrollbar.html">Scroll Bar</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-new-window"></i></span>
								<span class="s-text">Frontend</span>
							</a>
							<ul>
								<li><a href="frontend.html">Frontend 1</a></li>
								<li><a href="frontend2.html">Frontend 2</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-info">6</span>
								<span class="s-icon"><i class="ti-bar-chart-alt"></i></span>
								<span class="s-text">Charts</span>
							</a>
							<ul>
								<li><a href="charts-flot.html">Flot Chart</a></li>
								<li><a href="charts-morris.html">Morris Chart</a></li>
								<li><a href="charts-chartjs.html">Chart.js</a></li>
								<li><a href="charts-peity.html">Peity Chart</a></li>
								<li><a href="charts-sparkline.html">Sparkline Chart</a></li>
								<li><a href="charts-chartist.html">Chartist Chart</a></li>
								<li><a href="charts-easy.html">Easy Pie Chart</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-email"></i></span>
								<span class="s-text">Email Templates</span>
							</a>
							<ul>
								<li><a href="email-basic.html">Basic</a></li>
								<li><a href="email-alert.html">Alert</a></li>
								<li><a href="email-ecommerce.html">Ecommerce</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-location-pin"></i></span>
								<span class="s-text">Maps</span>
							</a>
							<ul>
								<li><a href="maps-vector.html">Vector Map</a></li>
								<li><a href="maps-google.html">Google Map</a></li>
							</ul>
						</li>
						-->
						<!--
						<li>
							<a href="calendar.html" class="waves-effect  waves-light">
								<span class="s-icon"><i class="ti-calendar"></i></span>
								<span class="s-text">Calendar</span>
							</a>
						</li>
						-->
						<!--
						<li class="with-sub compact-hide">
							<a href="javascript: void(0);" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-menu"></i></span>
								<span class="s-text">Menu Levels</span>
							</a>
							<ul>
								<li class="with-sub">
									<a href="javascript: void(0);">
										<span class="s-caret"><i class="fa fa-angle-down"></i></span>
										<span class="s-text">Level 1</span>
									</a>
									<ul>
										<li class="with-sub">
											<a href="javascript: void(0);">
												<span class="s-caret"><i class="fa fa-angle-down"></i></span>
												<span class="s-text">Level 1.2</span>
											</a>
											<ul>
												<li class="with-sub">
													<a href="javascript: void(0);">
														<span class="s-caret"><i class="fa fa-angle-down"></i></span>
														<span class="s-text">Level 1.2.3</span>
													</a>
													<ul>
														<li><a href="javascript: void(0);">Level 1.2.3.4</a></li>
														<li><a href="javascript: void(0);">Level 1.2.3.4</a></li>
													</ul>
												</li>
												<li><a href="javascript: void(0);">Level 1.2.3</a></li>
											</ul>
										</li>
										<li><a href="javascript: void(0);">Level 1.2</a></li>
									</ul>
								</li>
								<li><a href="javascript: void(0);">Level 1</a></li>
							</ul>
						</li>
						-->
						<!--
						<li class="menu-title compact-hide">Unique Visitors</li>
						-->
						<!--
						
						<li class="compact-hide">
							<div id="sidebar-chart" class="chartist-animated chartist-dark"></div>
						</li>
						-->
						<!--
						<li class="menu-title compact-hide">Tags</li>
						-->
						<!--
						<li class="compact-hide">
							<a href="javascript: void(0);" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-circle-o text-danger"></i></span>
								<span class="s-text">Ideas</span>
							</a>
						</li>
						-->
						<!--
						<li class="compact-hide">
							<a href="javascript: void(0);" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-circle-o text-warning"></i></span>
								<span class="s-text">Projects</span>
							</a>
						</li>
						-->
						<!--
						<li class="compact-hide">
							<a href="documentation.html" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-circle-o text-primary"></i></span>
								<span class="s-text">Documentation</span>
							</a>
						</li>
						-->
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
								<a class="dropdown-item" href="../punchout.php">
									<i class="ti-email m-r-0-5"></i> Punch Out
								</a>
								<a class="dropdown-item" href="../logout.php">
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
						<div class="row row-md m-b-2">
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
						</div>
						<div class="row row-md m-b-2">
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
						</div>
						<div class="row row-md m-b-2">
						    <!--
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
							-->
							<div class="col-md-6">
								<div class="box box-block bg-white">
									<h5 class="m-b-2">CPU load</h5>
									<div class="chart-container" style="height: 340px;">
										<div id="realtime" class="chart-placeholder"></div>
									</div>
								</div>
							</div>
						</div>
						<!--
						<div class="row">
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
						</div>
						-->
					</div>
				</div>
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						2016 © Seva Development LLC
					</div>
				</footer>
			</div>

		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="vendor/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="vendor/flot/jquery.flot.min.js"></script>
		<script type="text/javascript" src="vendor/flot/jquery.flot.pie.js"></script>
		<script type="text/javascript" src="vendor/flot/jquery.flot.stack.js"></script>
		<script type="text/javascript" src="vendor/flot/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
		<script type="text/javascript" src="vendor/CurvedLines/curvedLines.js"></script>
		<script type="text/javascript" src="vendor/TinyColor/tinycolor.js"></script>
		<script type="text/javascript" src="vendor/sparkline/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script type="text/javascript" src="vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="dashboard/js/app.js"></script>
		<script type="text/javascript" src="dashboard/js/demo.js"></script>
		<script type="text/javascript" src="dashboard/js/index3.js"></script>
	</body>
</html>


<!---------------------------------------------------------------------------------------------------------------------------------------------------------------
<!--
<html>
  <head>
    <title>HR Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- ImageReady Styles (dashboard (1).psd) -->
  <!--  <style type="text/css">
      <!--
      #Table_01 {
        position:absolute;
        left:0px;
        top:0px;
        width:1350px;
        height:768px;
      }
      .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 0px;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }
      .dropdown {
        position: relative;
        display: inline-block;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      }
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      .dropdown-content a:hover {
        background-color: #f1f1f1}
      .dropdown:hover .dropdown-content {
        display: block;
      }
      .dropdown:hover .dropbtn {
        background-color: #3e8e41;
      }
      #left-panel {
        position:absolute;
        left:0px;
        top:0px;
        width:93px;
        height:768px;
      }
      #returning-visitors {
        position:absolute;
        left:93px;
        top:0px;
        width:19px;
        height:12px;
      }
      #extreme-top {
        position:absolute;
        left:112px;
        top:0px;
        width:1211px;
        height:1px;
      }
      #right-panl {
        position:absolute;
        left:1323px;
        top:0px;
        width:27px;
        height:768px;
      }
      #returning-visitors005 {
        position:absolute;
        left:112px;
        top:1px;
        width:1211px;
        height:11px;
      }
      #logo-back-btn {
        position:absolute;
        left:93px;
        top:12px;
        width:74px;
        height:59px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #logo-back-btn:hover {
        -webkit-transform:scale(0.9);
        -moz-transform:scale(0.9);
        -o-transform:scale(0.9);
        transform:scale(0.9);
      }
      #seva-logo {
        position:absolute;
        left:167px;
        top:12px;
        width:295px;
        height:59px;
      }
      #returning-visitors008 {
        position:absolute;
        left:462px;
        top:12px;
        width:861px;
        height:14px;
      }
      #returning-visitors009 {
        position:absolute;
        left:462px;
        top:26px;
        width:641px;
        height:45px;
      }
      #username-top-display {
        position:absolute;
        left:1207px;
        top:26px;
        width:205px;
        height:61px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #username-top-display:hover {
        -webkit-transform:scale(1.05);
        -moz-transform:scale(1.05);
        -o-transform:scale(1.05);
        transform:scale(1.05);
        border-color: #D70000
      }
      #returning-visitors011 {
        position:absolute;
        left:1308px;
        top:26px;
        width:15px;
        height:706px;
      }
      #returning-visitors012 {
        position:absolute;
        left:93px;
        top:71px;
        width:500px;
        height:34px;
      }
      #employee-tab {
        position:absolute;
        left:593px;
        top:71px;
        width:124px;
        height:34px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #employee-tab:hover {
        -webkit-transform:scale(1.25);
        -moz-transform:scale(1.25);
        -o-transform:scale(1.25);
        transform:scale(1.25);
        border-color: #D70000;
      }
      #returning-visitors014 {
        position:absolute;
        left:717px;
        top:71px;
        width:17px;
        height:34px;
      }
      #management-tab {
        position:absolute;
        left:734px;
        top:71px;
        width:169px;
        height:34px;
      }
      #client-tab {
        position:absolute;
        left:903px;
        top:71px;
        width:179px;
        height:34px;
      }
      #returning-visitors017 {
        position:absolute;
        left:1082px;
        top:71px;
        width:21px;
        height:34px;
      }
      #returning-visitors018 {
        position:absolute;
        left:1103px;
        top:87px;
        width:205px;
        height:18px;
      }
      #returning-visitors019 {
        position:absolute;
        left:93px;
        top:105px;
        width:87px;
        height:56px;
      }
      #working-for-client-tab {
        position:absolute;
        left:180px;
        top:105px;
        width:179px;
        height:38px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #working-for-client-tab:hover {
        -webkit-transform:scale(0.8);
        -moz-transform:scale(0.8);
        -o-transform:scale(0.8);
        transform:scale(0.8);
      }
      #goal-completion {
        position:absolute;
        left:359px;
        top:105px;
        width:172px;
        height:38px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #goal-completion:hover {
        -webkit-transform:scale(0.8);
        -moz-transform:scale(0.8);
        -o-transform:scale(0.8);
        transform:scale(0.8);
      }
      #seva-calendar {
        position:absolute;
        left:531px;
        top:105px;
        width:186px;
        height:38px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #seva-calendar:hover {
        -webkit-transform:scale(0.8);
        -moz-transform:scale(0.8);
        -o-transform:scale(0.8);
        transform:scale(0.8);
      }
      #list-of-employees-tab {
        position:absolute;
        left:717px;
        top:105px;
        width:207px;
        height:38px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #list-of-employees-tab:hover {
        -webkit-transform:scale(0.8);
        -moz-transform:scale(0.8);
        -o-transform:scale(0.8);
        transform:scale(0.8);
      }
      #inventory-tab {
        position:absolute;
        left:924px;
        top:105px;
        width:179px;
        height:38px;
        -webkit-transition:  -webkit-transform .2s ease-out;
        -moz-transition: -moz-transform .2s ease-out;
        -o-transition: -o-transform .2s ease-out;
        -ms-transition: -ms-transform .2s ease-out;
        transition: transform .2s ease-out;
      }
      #inventory-tab:hover {
        -webkit-transform:scale(0.8);
        -moz-transform:scale(0.8);
        -o-transform:scale(0.8);
        transform:scale(0.8);
      }
      #account-setting-tab {
        position:absolute;
        left:1103px;
        top:105px;
        width:205px;
        height:38px;
      }
      #returning-visitors026 {
        position:absolute;
        left:180px;
        top:143px;
        width:1128px;
        height:18px;
      }
      #returning-visitors027 {
        position:absolute;
        left:93px;
        top:161px;
        width:74px;
        height:571px;
      }
      #active-visitor-widget {
        position:absolute;
        left:167px;
        top:161px;
        width:228px;
        height:262px;
      }
      #returning-visitors029 {
        position:absolute;
        left:395px;
        top:161px;
        width:84px;
        height:286px;
      }
      #goal-completion-widget {
        position:absolute;
        left:479px;
        top:161px;
        width:238px;
        height:262px;
      }
      #returning-visitors031 {
        position:absolute;
        left:717px;
        top:161px;
        width:90px;
        height:286px;
      }
      #seva-calander {
        position:absolute;
        left:807px;
        top:161px;
        width:489px;
        height:315px;
      }
      #returning-visitors033 {
        position:absolute;
        left:1296px;
        top:161px;
        width:12px;
        height:571px;
      }
      #returning-visitors034 {
        position:absolute;
        left:167px;
        top:423px;
        width:228px;
        height:309px;
      }
      #returning-visitors035 {
        position:absolute;
        left:479px;
        top:423px;
        width:238px;
        height:24px;
      }
      #returning-visitors036 {
        position:absolute;
        left:395px;
        top:447px;
        width:55px;
        height:285px;
      }
      #real-time-report {
        position:absolute;
        left:450px;
        top:447px;
        width:303px;
        height:97px;
      }
      #returning-visitors038 {
        position:absolute;
        left:753px;
        top:447px;
        width:54px;
        height:285px;
      }
      #returning-visitors039 {
        position:absolute;
        left:807px;
        top:476px;
        width:489px;
        height:28px;
      }
      #visual-report-your-goals {
        position:absolute;
        left:807px;
        top:504px;
        width:275px;
        height:209px;
      }
      #returning-visitors041 {
        position:absolute;
        left:1082px;
        top:504px;
        width:214px;
        height:228px;
      }
      #returning-visitors042 {
        position:absolute;
        left:450px;
        top:544px;
        width:303px;
        height:188px;
      }
      #returning-visitors043 {
        position:absolute;
        left:807px;
        top:713px;
        width:275px;
        height:19px;
      }
      #seva-footer-copyright {
        position:absolute;
        left:93px;
        top:765px;
        width:1230px;
        height:36px;
      }
      -->
   <!-- </style>
    <!-- End ImageReady Styles -->
 <!-- </head>
  <body style="background-color:#FFFFFF; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px; ">
    <!-- ImageReady Slices (dashboard (1).psd) -->
  <!--  <div id="Table_01">
      <div id="left-panel">
        <img src="images/left_panel.jpg" width="93" height="822" alt="" />
      </div>
      <div id="returning-visitors">
        <img src="images/returning_visitors.jpg" width="19" height="12" alt="" />
      </div>
      <div id="extreme-top">
        <img src="images/extreme_top.jpg" width="1211" height="1" alt="" />
      </div>
      <div id="right-panl">
        <img src="images/right_panl.jpg" width="117" height="822" alt="" />
      </div>
      <div id="returning-visitors005">
        <img src="images/returning_visitors-05.jpg" width="1211" height="11" alt="" />
      </div>
      <div id="seva-logo">
        <img src="images/seva_logo.jpg" width="295" height="59" alt="" />
      </div>
      <div id="returning-visitors008">
        <img src="images/returning_visitors-08.jpg" width="861" height="14" alt="" />
      </div>
      <div id="returning-visitors009">
        <img src="images/returning_visitors-09.jpg" width="641" height="45" alt="" />
      </div>
      <div id="username-top-display">
        <img src="images/logout.png" onclick = "window.location.href='logout.php'" width="95" height="56" alt="" />
        <!--<img src="images/username_top_display.jpg" width="205" height="61" alt="" />-->
    <!--  </div>
    <!--  <div id="returning-visitors011">
        <img src="images/returning_visitors-11.jpg" width="15" height="706" alt="" />
      </div>
      <div id="returning-visitors012">
        <img src="images/returning_visitors-12.jpg" width="500" height="34" alt="" />
      </div>
      <div id="returning-visitors014">
        <img src="images/returning_visitors-14.jpg" width="17" height="34" alt="" />
      </div>
      <div id="returning-visitors017">
        <img src="images/returning_visitors-17.jpg" width="21" height="34" alt="" />
      </div>
      <div id="returning-visitors018">
        <img src="images/returning_visitors-18.jpg" width="205" height="18" alt="" />
      </div>
      <div id="returning-visitors019">
      </div>
      <div id="working-for-client-tab">
        <img src="images/working_for_client_tab.jpg" width="179" height="38" alt="" />
      </div>
      <div id="goal-completion">
        <img src="images/goal_completion.jpg" width="172" height="38" alt="" />
      </div>
      <div id="seva-calendar">
        <img src="images/seva_calendar.jpg" width="186" height="38" alt="" />
      </div>
      <div class="dropdown">
        <div id="list-of-employees-tab">
          <img src="images/list_of_employees_tab.jpg" onclick="window.location.href='employeepage12.php'" width="207" height="38" alt="" />
        </div>
        <div id="inventory-tab">
          <img src="images/inventory_tab.jpg" width="179" height="38" alt="" />
        </div>
        <div id="account-setting-tab">
          <img src="images/account_setting_tab.jpg" width="205" height="38" alt="" />
        </div>
        <div id="returning-visitors026">
          <img src="images/returning_visitors-26.jpg" width="1128" height="18" alt="" />
        </div>
        <div id="returning-visitors027">
          <img src="images/returning_visitors-27.jpg" width="74" height="571" alt="" />
        </div>
        <div id="active-visitor-widget">
          <img src="images/active_visitor_widget.jpg" width="228" height="262" alt="" />
        </div>
        <div id="returning-visitors029">
          <img src="images/returning_visitors-29.jpg" width="84" height="286" alt="" />
        </div>
        <div id="goal-completion-widget">
          <img src="images/goal_completion_widget.jpg" width="238" height="262" alt="" />
        </div>
        <div id="returning-visitors031">
          <img src="images/returning_visitors-31.jpg" width="90" height="286" alt="" />
        </div>
        <div id="seva-calander">
          <img src="images/seva_calander.jpg" width="489" height="315" alt="" />
        </div>
        <div id="returning-visitors033">
          <img src="images/returning_visitors-33.jpg" width="12" height="571" alt="" />
        </div>
        <div id="returning-visitors034">
          <img src="images/returning_visitors-34.jpg" width="228" height="309" alt="" />
        </div>
        <div id="returning-visitors035">
          <img src="images/returning_visitors-35.jpg" width="238" height="24" alt="" />
        </div>
        <div id="returning-visitors036">
          <img src="images/returning_visitors-36.jpg" width="55" height="285" alt="" />
        </div>
        <div id="real-time-report">
          <img src="images/real_time_report.jpg" width="303" height="97" alt="" />
        </div>
        <div id="returning-visitors038">
          <img src="images/returning_visitors-38.jpg" width="54" height="285" alt="" />
        </div>
        <div id="returning-visitors039">
          <img src="images/returning_visitors-39.jpg" width="489" height="28" alt="" />
        </div>
        <div id="visual-report-your-goals">
          <img src="images/visual_report_your_goals.jpg" width="275" height="209" alt="" />
        </div>
        <div id="returning-visitors041">
          <img src="images/returning_visitors-41.jpg" width="214" height="228" alt="" />
        </div>
        <div id="returning-visitors042">
          <img src="images/returning_visitors-42.jpg" width="303" height="188" alt="" />
        </div>
        <div id="returning-visitors043">
          <img src="images/returning_visitors-43.jpg" width="275" height="19" alt="" />
        </div>
        <div id="seva-footer-copyright">
          <img src="images/seva_footer_copyright.jpg" width="1230" height="57" alt="" />
        </div>
      </div>
      </div>
      <!-- End ImageReady Slices -->
   <!--   </body>
    </html>

