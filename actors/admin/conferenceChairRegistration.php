<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '1'){
    header('location:../../login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>

    <title>Conference Chair Registration</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
</head>
<body>
  
<nav>
<div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
		<ul>
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a href="adminhomepage.php">Home</a></li>
			<li><a href="requested_conferences.php">Requested conferences</a></li>
			<li><a href="conference_list.php">Conference List</a></li>
			<li><a href="authordetails.php">Author details</a></li>
			<li><a class="active" href="conferenceChairRegistration.php">Conf Chair Registration</a></li>
			<li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>
		

	</nav>
  <br><br>

	<!--Conference Chair Registration form-->
	<div id="main-wrapper">
		<!-- <center>
			<h2>Conference Chair Registration Form</br><br><br></h2>	
		</center> -->
	
		<form action="conferenceChairRegistration.php" method="post">
		<br><br>
			<h1>Conf Chair Registration</h1>
			<fieldset>
      		<legend><span class="number">1</span>Personal Information</legend><br>
		
			  <label for="fname">Full Name:</label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label>Gender:</label><br>
			<input id="Gmale" type="radio" name="gender" value="male" checked required><label for="Gmale" class="light">Male</label><br><br>
			<input id="GFemale" type="radio"  name="gender" value="female" required><label for="GFemale" class="light">Female</label><br><br>
			
			<label for="University">University:</label><br>
			<input id="University" name="University" type="text" class="inputvalues" placeholder="Type your University" required/><br>

			<label for="ContactDetails">Contact Details:</label><br>
			<input id="ContactDetails" name="ContactDetails" type="text" class="inputvalues" placeholder="Type your Contact Details" required/><br>

			<label for="ContactLinks">Contact Links:</label><br>
			<input id="ContactLinks" name="ContactLinks" type="text" class="inputvalues" placeholder="Type your Contact Links" required/><br>
		   
		</fieldset>
		<fieldset>
      	<legend><span class="number">2</span>Login Information</legend><br>
			<label for="Email">Email:</label><br>
			<input id="Email" name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>

			<label for="passW">Password:</label><br>
			<input id="passW" name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			
			<label for="CpassW">Confirm Password:</label><br>
			<input id="CpassW" name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
		</fieldset>
	
			<button name="submit_btn" type="submit" id="signup_btn" value="Sign Up">Register</button><br>
			<!--<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>-->
		</form>



			<!--<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>-->
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

				$fullname =$_POST['fullname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$gender = $_POST['gender'];
				$usertype = "Conference_chair";
				$University = $_POST['University'];
				$ContactDetails = $_POST['ContactDetails'];
				$ContactLinks = $_POST['ContactLinks'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($password==$cpassword)
				{
					$encrypted_pass = md5($password);	//password encrypted

					$query= "select * from userinfotable WHERE email='$email'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same email
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into userinfotable ( full_name, university, contactdetails, contactlinks, gender, user_type, password, email ) 
						values('$fullname','$University','$ContactDetails','$ContactLinks','$gender','$usertype','$encrypted_pass','$email')";
						$query_run = mysqli_query($con,$query);

						$query2= "insert into conferencechair 
									values('$email','$fullname','$gender','$encrypted_pass','$email')";
						$query_run2 = mysqli_query($con,$query2);
						
						if($query_run and $query_run2)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}				
			}
		?>
	</div>

	
	
 <!-- Footer section -->
 <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p> 
         </div>
</body>

</html>
