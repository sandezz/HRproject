<html>
<?php
$user_name = "root";
$pasword ="";
$database="employee";
$server="localhost";
@mysqli_connect("$server","$user_name","$pasword");

@mysqli_select_db("$database");

if (isset($_POST['info'])) {

	$firstname = $_POST['firstname'];
	$lastname= $_POST['lastname'];
	$address= $_POST['address'];
	$contact_number = $_POST['contact_no'];
	$email = $_POST['email'];
	$team = $_POST['team'];
	/*$employeeid = $_POST['employee_id'];*/


	$order = @mysqli_query($con,"INSERT INTO employeeinfo (fname, lname,address,contactno,email,team) VALUES ('$firstname', '$lastname','$address','$contact_number','$email','$team')");

	if ($order) {
		
    echo '<br>Input data is successful';
	
	header("location:empadded.html");
		} else {
    echo '<br>Input data is not valid';}
}

?>
</html>



