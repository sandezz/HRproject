<?php

	include("../../connection.php");
?>
<?php
		$username=$_SESSION['username'];
						
		$designation=mysqli_query($connect,"select * from info where username='$username'");
		
		$row=mysqli_fetch_assoc($designation);
		
		
		if($row['department']=='Consultant'||$row['department']=='Trainee'||$row['department']=='Intern')
		{
			?>
		<style>
		.employee
		{
			display:none;
		}
		.dashboard
		{
			display:none;
		}
		
		
		
		</style>
		<?php
		}
		
		?>