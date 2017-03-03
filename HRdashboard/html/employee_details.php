<?php
include("session.php");
include("connection.php");
$connection = mysqli_connect("$host", "$username", "$password"); // Establishing Connection with Server
$db = mysqli_select_db($connection,"employee"); // Selecting Database
//MySQL Query to read data
$query = mysqli_query($connection,"select * from info");
include("active_employee.php");
$username=$_SESSION['username']; 
$department=$_SESSION['department'];
?>
<?php 
//Include the database class
require("db.class.php");
?>
<?php
//If form was submitted
if (isset($_POST['btnSubmit'])) {

	//create instance of database class
	$db = new mysqldb();
	$db->select_db();
	
	//Insert static values into users table
    $id = $_GET['id'];
	$familyname = $_POST['familyname'];
    $familyrel = $_POST['familyrel'];
    $familyno = $_POST['familyno'];
	$sql_user = sprintf(" UPDATE info
				SET 
					 familyname = '$familyname' , familyrel = '$familyrel' , familyno = '$familyno' 
					 
				WHERE
					id = '$id'
	           ",
						mysql_real_escape_string($_POST['familyname']),
						mysql_real_escape_string($_POST['familyrel']),
                        mysql_real_escape_string($_POST['familyno']));  
	$result_user = $db->query($sql_user);


	//Check if user has actually added additional fields to prevent a php error
	if ($_POST['rel_name']) {
		
		
		//Loop through added fields
		foreach ( $_POST['rel_name'] as $key=>$value ) {
			
			//Insert into family_information table
			
            $data1 = mysql_real_escape_string($value);
            $data2 = mysql_real_escape_string($_POST['rel_relation'][$key]);
            $data3 = mysql_real_escape_string($_POST['rel_tel'][$key]);
            mysql_query("INSERT INTO family_information (rel_name, rel_relation, rel_tel,UserID) VALUES ('$data1', '$data2','$data3','$id')") or die(mysql_error());
            
			$inserted_website_id = $db->last_insert_id();
			
			
			//Insert into family_link table
			//$sql_users_website = sprintf("INSERT INTO family_link (UserID, FamilyID) VALUES ('%s','%s')",
			//			    	   mysql_real_escape_string($id),
			//					   mysql_real_escape_string($inserted_website_id) );  
			//$result_users_website = $db->query($sql_users_website);
			
		}
		
	} else {
	
		//No additional fields added by user
		
	}
    
    $success_msg = "";
	//echo "<h1>User Added, <strong>" . count($_POST['name']) . "</strong> website(s) added for this user!</h1>";
	
    
	//disconnect mysql connection
	$db->kill();
}
?> 
<?php
    $host="localhost"; 
    $username="root"; 
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
    if(isset($_POST['save6']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$mnote = $_POST['mnote'];
    
    
        
        
	$hrnote = mysqli_real_escape_string($connect,$hrnote);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 mnote = '$mnote' 
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }
    if(isset($_POST['save7']) ){
    $ids = $_GET['id'];
        
	$id = $_GET['id'];
	$salary = $_POST['salary'];
	$cit = $_POST['cit'];
    
    
        
        
	$salary = mysqli_real_escape_string($connect,$salary);
	$cit = mysqli_real_escape_string($connect,$cit);
	
	$sql="SELECT username FROM info";
		$result=mysqli_query($connect,$sql);
		$result1 = mysqli_fetch_object($result);

	
	$query = " UPDATE info
				SET 
					 salary = '$salary', cit = '$cit'
					 
				WHERE
					id = '$id'
	           ";
	mysqli_query($connect, $query);
	echo mysqli_error( $connect );   
    }
?>
 
<?php // for pop up form of image

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		//$username = $_POST['user_name'];// user name
		//$userjob = $_POST['user_job'];// user email
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 50000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$i_id = $_GET["id"];
			$stmt = $DB_con->prepare("update info set userPic = :upic  where  id = '$i_id'" ) ;
			echo $id;
			//$stmt->bindParam(':uname',$username);
			//$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				//header("refresh:2;employee_details1.php?id = $i_id"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "employee";
$id = $_GET['id'];


$connection = mysqli_connect("$dbhost", "$dbuser", "$dbpass"); // Establishing Connection with Server
$db = mysqli_select_db($connection,"employee"); // Selecting Database
//MySQL Query to read data
$query = mysqli_query($connection,"select * from upload_data");
//$row = mysqli_fetch_array($connection, $query);
//echo $row['1'];


if(isset($_FILES['files'])){

	//$id = 1;
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 20971527898){
			$errors[]='File size must be less than 2 MB';
        }		
        $query="INSERT into upload_data (`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`,`UserID`) VALUES('$file_name','$file_size','$file_type',$id); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir");		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysqli_query($connection,$query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		
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
		<title>Seva Development-<?php echo $row1['full_name'];?></title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="../vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../vendor/waves/waves.min.css">
		<link rel="stylesheet" href="../vendor/chartist/chartist.min.css">
		<link rel="stylesheet" href="../vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../vendor/dropify/dist/css/dropify.min.css">
		<link rel="stylesheet" href="../vendor/select2/dist/css/select2.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="../vendor/multi-select/css/multi-select.css">
		<link rel="stylesheet" href="../vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
        <link rel="stylesheet" href="../vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../vendor/dropify/dist/css/dropify.min.css">
        <link rel="stylesheet" href="../vendor/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../vendor/pe7-icons/assets/Pe-icon-7-stroke.css">
		<link rel="stylesheet" href="../vendor/x-editable/bootstrap3-editable/css/bootstrap-editable.css">
        <link rel="stylesheet" href="../vendor/nestable/nestable.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        

        <script type="text/javascript" src="js/script.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="../dashboard/css/core.css">
        

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]-->
		<!--script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
		<!--script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
		<!--[endif]-->
	       
<!--        <script type="text/javascript">
            var count = 0;
            var limit = 3;
            $(function(){
                $('p#add_field').click(function(){
                    if (count == limit)  {
                        alert("You have reached the limit of adding " + counter + " inputs");
                    }
                    else{
                    count += 1;
                    $('#container').append(
                        '<div class="form-group">Field #'+ count +'<input placeholder="Name" id="name_' + count + '" name="name[]" class="form-control"' + '" type="text"/><br /></div>' ).fadeIn();
                    $('#container').append(
                        '<div class="form-group"><input placeholder="Relation" id="relation_' + count + '" name="relation[]" class="form-control"' + '" type="text" /><br />' ).fadeIn();
                    $('#container').append(
                        '<div class="control-group input-group" style="margin-top:10px"><input placeholder="Contact" id="contact_' + count + '" name="contact[]" class="form-control"' + '" type="text"><div class="input-group-btn"><button class="btn btn-danger remove" type="button" id="remove_wala"><i class="glyphicon glyphicon-close" onClick=”$(this).parent().remove(); return false;”></i> Remove</button></div></div><br />' ).fadeIn();
                    }
	
                });
            });
        </script> -->
        <script>
           $(document).ready(function() {

               var iCnt = 0;
               var jCnt = 0;
               var kCnt = 0;
        
               // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.
               var container = $(document.createElement('div')).attr('class', 'form-group');

               $('#btAdd').click(function() {
                   if (iCnt <= 2) {

                       iCnt = iCnt + 1;
                       jCnt = jCnt + 1;
                       kCnt = kCnt + 1;

                       // ADD TEXTBOX.
                       $(container).append('<hr><input type="text" class="form-control" id="tb' + iCnt + '" ' +
                                           'name="rel_name[]" placeholder="Name" /><small id="rel_name_info" class="form-text text-muted">Name  of the person.  </small><br /><input type="text" class="form-control" name="rel_relation[]" id="ub' + jCnt + '" ' +
                                           'placeholder="Relation" /><small id="rel_relation_info" class="form-text text-muted">Your relationship with the person.</small><br /><input type="text" class="form-control" name="rel_tel[]" id="vb' + kCnt + '" ' +
                                           'placeholder="Contact" data-mask="(999) 999-9999" /><small id="rel_contact_info" class="form-text text-muted">Contact adress of the person.</small><hr>');
                
                       // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
                       if (iCnt == 1) {
                           var divSubmit = $(document.createElement('div'));
                           $(divSubmit).append('<input type="button" class="btn btn-success w-min-sm m-b-0-25 waves-effect waves-light" id="btSubmit" value="Submit" />');
                       }
                       // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                       $('#main').after(container, divSubmit);
                   }
                   // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                   // (3 IS THE LIMIT WE HAVE SET)
                   else {      
                       $(container).append('<label>Reached the limit</label>'); 
                       $('#btAdd').attr('class', 'btn btn-success w-min-sm m-b-0-25 waves-effect waves-light col-md-4'); 
                       $('#btAdd').attr('disabled', 'disabled');
                   }
               });

               // REMOVE ONE ELEMENT PER CLICK.
               $('#btRemove').click(function() {
                   if (iCnt != 0) { 
                       $('#tb' + iCnt).remove(); iCnt = iCnt - 1; 
                       $('#ub' + jCnt).remove(); jCnt = jCnt - 1; 
                       $('#vb' + kCnt).remove(); kCnt = kCnt - 1; 
                
                   }
        
                   if (iCnt == 0) { 
                       $(container)
                           .empty() 
                           .remove(); 

                       $('#btSubmit').remove(); 
                       $('#btAdd')
                           .removeAttr('disabled') 
                           .attr('class', 'btn btn-success w-min-sm m-b-0-25 waves-effect waves-light col-md-4');
                   }
               });

               // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
               $('#btRemoveAll').click(function() {
                   $(container)
                       .empty()
                       .remove(); 

                   $('#btSubmit').remove(); 
                   iCnt = 0; 
            
                   $('#btAdd')
                       .removeAttr('disabled') 
                       .attr('class', 'btn btn-success w-min-sm m-b-0-25 waves-effect waves-light col-md-4');
               });
           });

        </script>
        
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
    $query2 = mysqli_query($connection,"select * from family_information where UserID=$id");
    $query3 = mysqli_query($connection,"select * from upload_data where UserID=$id");
    
    
    
    
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
                        <li>
							<a href="index.php" class="waves-effect  waves-light">
							     <span class="s-icon"><i class="ti-dashboard"></i></span>
								<span class="s-text">Dashboard</span>
							</a>
                        </li>    
                        <li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-icon"><i class="ti-menu-alt"></i></span>
								<span class="s-text">Employee</span>
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
							
						
                        <li>
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
								<li><a href="#">My leave</a></li>
								<li><a href="#">Report</a></li>
								<li><a href="#">Leave List</a></li>
								<li><a href="#">Assign Leave</a></li>
							</ul>
						</li>
                        <li>
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
							
							<!--
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="tag tag-purple">12</span>
                            -->
								<?php echo"<a class='waves-effect  waves-light' href=\"salary.php?id={$row['id']}\"  rel='external'><span class='s-icon'><i class='ti-menu-alt'></i></span><span class='s-text'> Salary </span> </a>";?>
						</li> 
						<li>
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
                        
						
						
						<li>
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
						<li>
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
								<h6>Notificati?ns</h6>
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
                        <div class="row row-md m-b-2">
                            <div class="col-md-4">
                                <div class="box bg-white user-5">
                                    <div class="u-content">
                                        <div class="avatar box-96 m-b-2">
                                            <img class="img-circle m-r-2 col-md-2" >
                                            <?php 
                                            $a=$row1['userPic']; 
                                            if(!empty($row1['userPic'] )){
											?>
                                            <a data-toggle="modal" data-target=".small-modal">
                                                <?php echo "<img src = 'user_images/$a' width='350px' height='200px' style='position:absolute;top:-20px;left:-50px; width : 200px;'>"; }
											else {?>
											<a data-toggle="modal" data-target=".small-modal">
											<?php
											 echo "<img src = 'user_images/avatar.jpg' style='position:absolute;top:-15px;left:-50px; width : 200px;'>";} ?>
                                                </a></a>
                                             <br><br>
                                            
                                             <div class="modal fade small-modal" tabindex="1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="mySmallModalLabel">Profile Image</h4>
                                                        </div>
                                                        <form method="post" action = "" enctype="multipart/form-data" >
                                                        <div class="modal-body">
                                                            <label class="custom-file">
                                                                <input type="file" id="file" class="custom-file-input" name="user_image" accept="image/*">
                                                                <span class="custom-file-control"></span>
                                                            </label>
                                                         </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="btnsave" class="btn btn-primary pull-xs-left">
                                                            <span class="glyphicon glyphicon-save "></span> &nbsp; Save
                                                            </button>
                                                            <button type="button" class="btn btn-danger pull-xs-right" data-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
										
										</div><br><br><br><br><br>
                                        <h5><a class="text-black" href="#"><?php echo $row1['full_name']; ?></a></h5>
                                             <p class="text-muted m-b-1"><?php echo $row1['department']; ?></p>
										
							</div>
								</div>          <!--Avatar-->
                         
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
                                        <li class="nav-item ">
											<a class="nav-link" href="#upload" role="tab" data-toggle="tab">
												<i class="pe-7s-users"></i> Upload Files
											</a>
										</li>
										 <li class="nav-item ">
											<a class="nav-link" href="#finance" role="tab" data-toggle="tab">
												<i class="pe-7s-users"></i> Financial Records
											</a>
										</li>
									</ul>
								</div>                  <!--Menus-->
                                <div class="employee_note">
                                    
                                        <div class="card">
									<form method='post' action = "" name="save" value="save_personal">
                                    <div class="card-header">
										HR Note
                                        <input type="submit" class="btn btn-outline-secondary btn-sm m-b-0-25 waves-effect waves-light pull-xs-right" name = "save5" value = "Save"/>
									</div>
									<div class="card-block">
										<blockquote class="card-blockquote">
											
                                            <textarea id="textarea" class="form-control" maxlength="225" rows="5" name="hrnote"><?php echo $row1['hrnote']; ?></textarea>
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
								
                            </div>                  <!--HR Note and Manager Note-->
                                
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
								</div>      <!--Top-->
                                <div class="card-block m-b-8 bg-white">
									
									<div class="tab-content">
                                        <div class="tab-pane" id="basic" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">Basic Information</h4>
											<div class="box box-block bg-white">
                                                
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
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="department" >
                                                                <option value="Consultant" <?php if ($row1['department'] == 'Consultant') { echo ' selected="selected"'; }  ?>>Consultant</option>
                                                                <option value="Trainee" <?php if ($row1['department'] == 'Trainee') { echo ' selected="selected"'; }  ?>>Trainee</option>
                                                                <option value="Intern" <?php if ($row1['department'] == 'Intern') { echo ' selected="selected"'; }  ?>>Intern</option>
                                                                <option value="Manager" <?php if ($row1['department'] == 'Manager') { echo ' selected="selected"'; }  ?>>Manager</option>
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
                                                                <input type="text" class="form-control mydatepicker" value="<?php echo $row1['hiredate']; ?>" name="hiredate" placeholder="mm/dd/yy">
                                                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            </div>
                                                        </div>
													</div>
												</div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-primary btn-block w-min-sm m-b-0-25 waves-effect waves-light" name = "save" value = "Save"/>
                                                    </div>
                                      
                                                </div>
                                            </form>
											</div>
										</div>
										<div class="tab-pane " id="personal" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">Personal Information</h4>
											<div class="box box-block bg-white">
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
                                                            <input type="text" name = "phone" value="<?php echo $row1['phone']; ?>" class="form-control" data-mask="0-1-9999999">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date Of Birth</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control mydatepicker" value="<?php echo $row1['dob']; ?>" name="dob" placeholder="mm/dd/yy">
                                                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Citizenship Number</label>
                                                            <input type="text" value="<?php echo $row1['citizenshipno']; ?>" class="form-control" name="citizenshipno">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Blood Group</label><br />
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="bloodgroup">
                                                                <option value="A+" <?php if ($row1['bloodgroup'] == 'A+') { echo ' selected="selected"'; }  ?>>A+</option>
                                                                <option value="A-" <?php if ($row1['bloodgroup'] == 'A-') { echo ' selected="selected"'; }  ?>>A-</option>
                                                                <option value="B+" <?php if ($row1['bloodgroup'] == 'B+') { echo ' selected="selected"'; }  ?>>B+</option>
                                                                <option value="B-" <?php if ($row1['bloodgroup'] == 'A-') { echo ' selected="selected"'; }  ?>>B-</option>
                                                                <option value="O+" <?php if ($row1['bloodgroup'] == 'O+') { echo ' selected="selected"'; }  ?>>O+</option>
                                                                <option value="O-" <?php if ($row1['bloodgroup'] == 'O-') { echo ' selected="selected"'; }  ?>>O-</option>
                                                                <option value="AB+" <?php if ($row1['bloodgroup'] == 'AB+') { echo ' selected="selected"'; }  ?>>AB+</option>
                                                                <option value="AB-" <?php if ($row1['bloodgroup'] == 'AB-') { echo ' selected="selected"'; }  ?>>AB-</option>
                                                                
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
                                                            <label>Mobile Number</label>
                                                            <input type="text" value="<?php echo $row1['mobile']; ?>" class="form-control" name="mobile" data-mask="(999) 999-9999">
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
                                                               <input id="radio-male" type="radio" class="custom-control-input" value="Male" name="gender" <?php if (strpos($row1['gender'],'Male') !== false) echo 'checked="checked"'; ?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Male</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-female" type="radio" class="custom-control-input" value="Female" name="gender" <?php if (strpos($row1['gender'],'Female') !== false) echo 'checked="checked"'; ?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Female</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-others" type="radio" class="custom-control-input" value="Others" name="gender" <?php if (strpos($row1['gender'],'Others') !== false) echo 'checked="checked"'; ?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Others</span>
                                                           </label>  
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           <label class="col-sm-4 form-control-label">Married</label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-yes" type="radio" class="custom-control-input" value="Yes" name="marital" <?php if (strpos($row1['marital'],'Yes') !== false) echo 'checked="checked"'; ?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Yes</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-no" type="radio" class="custom-control-input" value="No" name="marital" <?php if (strpos($row1['marital'],'No') !== false) echo 'checked="checked"'; ?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">No</span>
                                                           </label>
                                                           <label class="custom-control custom-radio">
                                                               <input id="radio-divorced" type="radio" class="custom-control-input" value="Divorced" name="marital" <?php if (strpos($row1['marital'],'Divorced') !== false) echo 'checked="checked"'; ?>>
                                                               <span class="custom-control-indicator"></span>
                                                               <span class="custom-control-description">Divorced</span>
                                                           </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" name = "save1" value = "Save"/>
                                                    </div>    
                                                </div>
												</form>
                                            </div>
                                            
                                        </div>
										<div class="tab-pane " id="job" role="tabpanel">
											<h4 class="h-underline h-underline-50 h-underline-primary">Work Experiences</h4>
                                            <div class="box box-block bg-white">
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
                                                                <input type="text" class="form-control" name="fromdate" value="<?php echo $row1['fromdate']; ?>" placeholder="mm/dd/yy">
                                                                
                                                                <span class="input-group-addon bg-primary b-0 text-white">to</span>
                                                                <input type="text" class="form-control" name="todate" value="<?php echo $row1['todate']; ?>" placeholder="mm/dd/yy">
                                                        </div><br/>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Job Description</label><br />
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="job">
                                                                <option value="Programming" <?php if ($row1['job'] == 'Programming') { echo ' selected="selected"'; }  ?>>Programming</option>
                                                                <option value="Senior" <?php if ($row1['job'] == 'Senior') { echo ' selected="selected"'; }  ?>>Senior</option>
                                                                <option value="Junior" <?php if ($row1['job'] == 'Junior') { echo ' selected="selected"'; }  ?>>Junior</option>
                                                                <option value="Design" <?php if ($row1['job'] == 'Design') { echo ' selected="selected"'; }  ?>>Design</option>
                                                                <option value="Executive" <?php if ($row1['job'] == 'Executive') { echo ' selected="selected"'; }  ?>>Executive</option>
                                                                <option value="Intern" <?php if ($row1['job'] == 'Intern') { echo ' selected="selected"'; }  ?>>Intern</option>
                                                                <option value="Trainee" <?php if ($row1['job'] == 'Trainee') { echo ' selected="selected"'; }  ?>>Trainee</option>
                                                                <option value="Project Lead" <?php if ($row1['job'] == 'Project Lead') { echo ' selected="selected"'; }  ?>>Project Lead</option>
                                                                <option value="Project Manger" <?php if ($row1['job'] == 'Project Manger') { echo ' selected="selected"'; }  ?>>Project Manger</option>
                                                                <option value="Department Lead" <?php if ($row1['job'] == 'Department Lead') { echo ' selected="selected"'; }  ?>>Department Lead</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Department</label><br />
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="prevdepartment">
                                                                <option value="Consultant" <?php if ($row1['prevdepartment'] == 'Consultant') { echo ' selected="selected"'; }  ?>>Consultant</option>
                                                                <option value="Trainee" <?php if ($row1['prevdepartment'] == 'Trainee') { echo ' selected="selected"'; }  ?>>Trainee</option>
                                                                <option value="Intern" <?php if ($row1['prevdepartment'] == 'Intern') { echo ' selected="selected"'; }  ?>>Intern</option>
                                                                <option value="Manager" <?php if ($row1['prevdepartment'] == 'Manager') { echo ' selected="selected"'; }  ?>>Manager</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" name = "save2" value = "Save"/>
                                                    </div>    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
										<div class="tab-pane " id="education" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">Education</h4>
											<div class="box box-block bg-white">
                                                <form method='post' action = "" value="save_education">
                                                <div class="row">
                                                <div class="col-md-12">
                                                    
                                                    <div class="form-group">
                                                        <label>Degree Obtained Year</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control mydatepicker" value="<?php echo $row1['degree_year']; ?>" name="degree_year" placeholder="mm/dd/yy">
                                                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            </div>
                                                    </div>
                                                    <br />
                                                    <div class="form-group">
                                                        <label for="select2-demo-1" class="col-md-4 form-control-label">Degree</label>
                                                         
                                                            <select id="select2-demo-1" class="form-control" data-plugin="select2" name="fieldofstudy">
                                                                <option value="SLC" <?php if ($row1['fieldofstudy'] == 'SLC') { echo ' selected="selected"'; }  ?>>SLC</option>
                                                                <option value="CBSC" <?php if ($row1['fieldofstudy'] == 'CBSC') { echo ' selected="selected"'; }  ?>>CBSC</option>
                                                                <option value="O-Level" <?php if ($row1['fieldofstudy'] == 'O-Level') { echo ' selected="selected"'; }  ?>>O-Level</option>
                                                                <option value="ISc" <?php if ($row1['fieldofstudy'] == 'ISc') { echo ' selected="selected"'; }  ?>>ISc</option>
                                                                <option value="Others" <?php if ($row1['fieldofstudy'] == 'Others') { echo ' selected="selected"'; }  ?>>Others</option>
                                                            </select>
                                                        
                                                    </div>
                                                    <div id="main_ed">
                                                                    <input type="button" id="btAdd_ed" value="Add" class="btn btn-success w-min-sm m-b-0-25 waves-effect waves-light col-md-4">
                                                                    <input type="button" id="btRemove_ed" value="Remove Element" class="btn btn-warning w-min-sm m-b-0-25 waves-effect waves-light col-md-4" />
                                                                    <input type="button" id="btRemoveAll_ed" value="Remove All" class="btn btn-danger w-min-sm m-b-0-25 waves-effect waves-light col-md-4" /><br />
                                                                </div>
                                                    
                                                  
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                   
														<input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" name = "save3" value = "Save"/>
                                                    </div>    
                                                </div>
                                                </form>
                                            </div>
										</div>
                                        <div class="tab-pane " id="family" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">Family Information</h4>
                                            
                                            <div class="box box-block bg-white">
                                               
                                                    <!--<p id="add_field"><a href="#family" class="btn btn-success add-more pull-xs-right"><span><i class="glyphicon glyphicon-plus"></i> Add</span></a></p>
                                                    <div id="container">
                                                                </div>-->
                                                    <div class="col-md-12">
                                                        <form name="test" method="post" action=" " value="save_family">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" value="<?php echo $row1["familyname"]; ?>" class="form-control" maxlength="25" name="familyname" id="placement">
                                                                    <small id="rel_name_info" class="form-text text-muted">
                                                                    Name of the person.</small>
                                                                </div>
                                                                
                                                                
                                                                    <div class="form-group">
                                                                        <label>Relation</label>
                                                                        <input type="text" value="<?php echo $row1['familyrel']; ?>" class="form-control" maxlength="25" name="familyrel" id="placement">
                                                                        <small id="rel_relation_info" class="form-text text-muted">
                                                                        Your relationship with the person.</small>
                                                                    </div>
                                                                
                                                                
                                                                    <div class="form-group">
                                                                        <label>Contact</label>
                                                                        <input type="text" value="<?php echo $row1['familyno']; ?>" class="form-control" maxlength="25" name="familyno" data-mask="(999) 999-9999">
                                                                        <small id="rel_contact_info" class="form-text text-muted">
                                                                        Contact adress of the person.</small>
                                                                    </div>
                                                                
                                                                <div id="shower"></div>
                                                                
                                                                <div id="main">
                                                                    <input type="button" id="btAdd" value="Add" class="btn btn-success w-min-sm m-b-0-25 waves-effect waves-light col-md-4">
                                                                    <input type="button" id="btRemove" value="Remove Element" class="btn btn-warning w-min-sm m-b-0-25 waves-effect waves-light col-md-4" />
                                                                    <input type="button" id="btRemoveAll" value="Remove All" class="btn btn-danger w-min-sm m-b-0-25 waves-effect waves-light col-md-4" /><br />
                                                                </div>
                                                                <div class="spacer"></div><br/><br/>
                                                                <input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" value = "Save" id="go" name="btnSubmit" />
                                                                
                                                            </div>
                                                            
                                                            
                                                        </form>
                                                        
                                                       
                                                        
                                                        
<!--                                                            <form action="try.php" >
                                                                <div class="input-group-btn"> 
                                                                        <button class="btn btn-primary add-more pull-right" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                                                </div>

                                                                <div class="input-group control-group after-add-more">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" value="<?php echo $row1['familyname']; ?>" class="form-control" name="familyname[]" maxlength="30" name="addmore[]">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Relationship Type</label>
                                                                        <input type="text" value="<?php echo $row1['familyrel']; ?>" class="form-control" name="familyrel[]">
                                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Contact</label>
                                                                        <input type="text" value="<?php echo $row1['familyno']; ?>" class="form-control" name="familyno[]" data-mask="(999) 999-9999">
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                
                                                            </form>-->

                                                            <!-- Copy Fields -->
                                                         <!--   <div class="copy hide">
          
                                                                <div class="control-group input-group" style="margin-top:10px">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="familyname[]" maxlength="30">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Relationship Type</label>
                                                                        <input type="text" class="form-control" name="familyrel[]">
                                                            
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Contact</label>
                                                                        <input type="text" class="form-control" name="familyno[]" data-mask="(999) 999-9999">
                                                                    </div>
                                                                     
                                                                        <button class="btn remove pull-right btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                    
                                                                </div> 
                                                            </div> -->   
                                                            
                                                        
                                                    </div>
                                                    
                                                    
                                                    <br><br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            
                                                                
                                                        </div>    
                                                    </div>
                                            </div>
										</div>
                                        <div class="tab-pane " id="finance" role="tabpanel">
                                             <h4 class="h-underline h-underline-50 h-underline-primary">Your Financial Records</h4>
											<div class="box box-block bg-white">
                                                <form method='post' action = "" name="save" value="save_personal">
                                                <div class="row">
                                                    
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Monthly Salary</label>
                                                            <input type="number" value="<?php echo $row1['salary']; ?>" class="form-control"  name="salary" id="salary">
                                                            
                                                        </div>
                                                    </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>CIT(%)</label>
                                                            <input type="number" value="<?php echo $row1['cit']; ?>" class="form-control"  name="cit" id="cit">
                                                            
                                                        </div>
                                                    </div>
													
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Yearly Salary</label>
                                                            <input type="number" value="<?php echo $row1['salary'] *12; ?>" class="form-control" disabled>
                                                            
                                                        </div>
                                                    </div>
													
												
											        <div class="col-md-12">
                                                    <table class="table table-striped table-bordered dataTable" id="table-2">
													<thead>
														<tr>
															<th>Monthly Salary</th>
															<th>Provident Fund(10% + 10%)</th>
															<th>CIT</th>
															<th>Govt Tax</th>
															<th>Amount Deposited to Your Account</th>
															
															
														</tr>
														</thead>
														<tbody>
															<!-- populate table from mysql database -->
															<?php 
															include("connection.php");
															$connection = mysqli_connect("$host", "$username", "$password"); // Establishing Connection with Server
															$db = mysqli_select_db($connection,"employee"); // Selecting Database
															//MySQL Query to read data
															$query1 = mysqli_query($connection,"select * from info where id = '$id'");
															
															while ($row = mysqli_fetch_array($query1)){?>
															<tr>
																<td>
																	<?php echo $row['salary'] ;?>
																</td>
																
															   <td>
																	<?php 
																	$salary = $row['salary'];
																	$pf1 = $salary * 0.1;
																	$pf = $pf1 * 2;
																	
																	echo $pf ;?>
																</td>
																 <td>
															<?php 
															$cit = $row['cit'] / 100;
															
															$cit1 =$cit * ($salary *0.9) ;
															echo  $cit1 ; ?>
															</td>
															
															<td>
																<?php 
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
																
																echo $tax1;}?>
															</td>
															<td>
															<?php
															echo ($salary - (($salary * 0.1) + $cit1 + $tax1));
															?>
															
															</td>
															</tr>
														   
														</tbody>
													</table>
												
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
                                        <div class="tab-pane " id="upload" role="tabpanel">
                                            <h4 class="h-underline h-underline-50 h-underline-primary">Upload Files</h4>
											<div class="box box-block bg-white">
                                               
                                                
                                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne">
												<h6 class="panel-title box box-block bg-white">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Upload
													</a>
												</h6>
											</div>
											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
												
                                                    <div class="col-md-12">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                    <input type="file" id="input-file-now-custom-2" class="dropify" data-height="200" name="files[]" multiple/>
                                                        <br>
                                                    <input type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light" value = "Submit" name="uploadFile" />
                                                    </form>
                                                </div>
                                                   
                                                
                                            </div>
										</div>
                                                </div>
                                                <table class="table table-striped table-bordered dataTable" id="table-2">
													<thead>
														<tr>
															<th>File Name</th>
															<th>File Type</th>
															<th>File Size(MB)</th>
															
															
														</tr>
														</thead>
														<tbody>
															<!-- populate table from mysql database -->
															<?php while ($row = mysqli_fetch_array($query3)){?>
															<tr>
																<td class="lalign">
																  <a href="user_data/<?php echo $row['FILE_NAME']; ?>" target="FILE_NAME">  <?php echo $row['FILE_NAME'];?></a></td> 
																   <td>
												  
																	<?php echo $row['FILE_TYPE'];?>
																</td>
																
															   <td>
															<?php echo round($row['FILE_SIZE'] / 1048576,2);}?>
																</td>
																
															</tr>
														   
														</tbody>
													</table>
                                                
                                                
                                               
                                                
                                               
                                              
                                                 
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
						2016 � Seva Development Pvt. Ltd.
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
        <script type="text/javascript" src="../vendor/nestable/jquery.nestable.js"></script>    

		<!-- Neptune JS -->
		
        <script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript" src="js/forms-upload.js"></script>
        <script type="text/javascript" src="js/forms-plugins.js"></script>
        <script type="text/javascript" src="js/forms-pickers.js"></script>
		<script type="text/javascript" src="js/forms-xeditable.js"></script>
        <script type="text/javascript" src="js/forms-masks.js"></script>
        <script type="text/javascript" src="js/extra-crop.js"></script>
		<script type="text/javascript" src="js/forms-upload.js"></script>
		<script type="text/javascript" src="../vendor/dropify/dist/js/dropify.min.js"></script>
        <script type="text/javascript" src="js/ui-nestable.js"></script>
		
		
		<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
		
                
		<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>        
<?php
}
}
?>

<?php
mysqli_close($connection); // Closing Connection with Server
?>
    </body>
</html>