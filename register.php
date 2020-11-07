<?php
	require 'dbconfig/config.php';
?>		

<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>

		<link rel="stylesheet" href="css/main_style.css">
		<!-- <link rel="stylesheet" href="css/sty.css"> -->
		<link rel="stylesheet" href="css/style_footer.css">
		<link rel="stylesheet" href="css/reg_form_style.css">

		<!--<link rel="stylesheet" href="css/sty.css">
		<link rel="stylesheet" href="css/styleNavbar.css">

		<style>
			body {
			margin: 0;
			}

			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			width: 25%;
			background-color: #f1f1f1;
			position: fixed;
			height: 100%;
			overflow: auto;
			}

			li a {
			display: block;
			color: #000;
			padding: 8px 16px;
			text-decoration: none;
			}

			li a.active {
			background-color: #6495ED;
			color: white;
			}

			li a:hover:not(.active) {
			background-color: #555;
			color: white;
			}
		</style>
		-->
</head>

<body>

	<!--Navigation bar -->
	<nav>
		<ul>
		<li><a class="active" href="index.php">WebCOMS</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="contactUs.php">Contact Us</a></li>
		</ul>
		<br /><br />
	</nav>

	<!--Registration form-->
	<div id="main-wrapper">
		<!-- <center>
			<h2>Registration Form</br><br><br></h2>	
		</center>
	
		<form class="myform" action="register.php"method="post">
			<label for="fname"><b>Full Name:</b></label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label><b>Gender:</b></label>
			<input id="Gmale" type="radio" class="radiobtns" name="gender" value="male" checked required> 
			<label for="Gmale">Male</label>
			<input id="GFemale" type="radio" class="radiobtns" name="gender" value="female" required>
			<label for="GFemale">Female</label><br>
			
			<label for="actor"><b>User Role: </b></label>
				<select id="actor" class="" name="usertype">
					<option value="Author">Author</option>
					<option value="Reviewer">Reviewer</option>
					<option value="TrackChair">Track Chair</option>
					<option value="PublicationChair">Publication Chair</option>
				</select><br>
			
			<label for="Email"><b>Email:</b></label><br>
			<input id="Email" name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>

			<label for="University"><b>University:</b></label><br>
			<input id="University" name="University" type="text" class="inputvalues" placeholder="Type your University" required/><br>

			<label for="ContactDetails"><b>Contact Details:</b></label><br>
			<input id="ContactDetails" name="ContactDetails" type="text" class="inputvalues" placeholder="Type your Contact Details" required/><br>

			<label for="ContactLinks"><b>Contact Links:</b></label><br>
			<input id="ContactLinks" name="ContactLinks" type="text" class="inputvalues" placeholder="Type your Contact Links" required/><br>
			
			<label for="passW"><b>Password:</b></label><br>
			<input id="passW" name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			
			<label for="CpassW"><b>Confirm Password:</b></label><br>
			<input id="CpassW" name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			Here is a comment<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>-->
		<!-- </form> --> 
		
		<!-- <center>
			<h2>Registration Form</br><br><br></h2>	
		</center>
	 -->
		<form action="register.php"method="post">

			<br><h1>Register</h1>
			<fieldset>
      		<legend><span class="number">1</span>Your Basic Information</legend><br>
			
			<label for="fname">Full Name:</label><br>
			<input id="fname" name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label>Gender:</label><br>
			<input id="Gmale" type="radio" name="gender" value="male" checked required><label for="Gmale" class="light">Male</label><br><br>
			<input id="GFemale" type="radio"  name="gender" value="female" required><label for="GFemale" class="light">Female</label>
			<br><br>
			<label for="actor">User Role:</label><br>
				<select id="actor" class="" name="usertype">
					<option value="Author">Author</option>
					<option value="Reviewer">Reviewer</option>
					<option value="TrackChair">Track Chair</option>
					<option value="PublicationChair">Publication Chair</option>
				</select><br>
			
			<label for="University">University:</label><br>
			<input id="University" name="University" type="text" class="inputvalues" placeholder="Type your University" required/><br>

			<label for="ContactDetails">Contact Details:</label><br>
			<input id="ContactDetails" name="ContactDetails" type="text" class="inputvalues" placeholder="Type your Contact Details" required/><br>

			<label for="ContactLinks">Contact Links:</label><br>
			<input id="ContactLinks" name="ContactLinks" type="text" class="inputvalues" placeholder="Type your Contact Links" required/><br>
		   
		</fieldset>
		<fieldset>
      	<legend><span class="number">2</span>Your Login Information</legend><br>
			<label for="Email">Email:</label><br>
			<input id="Email" name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>

			<label for="passW">Password:</label><br>
			<input id="passW" name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			
			<label for="CpassW">Confirm Password:</label><br>
			<input id="CpassW" name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
		</fieldset>
	
			<button name="submit_btn" type="submit" id="signup_btn" value="Sign Up">Register</button<br>
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
				$usertype = $_POST['usertype'];
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
						$query= "insert into userinfotable (email, full_name, gender, user_type, password) 
						values('$email','$fullname','$gender','$usertype','$encrypted_pass')";
						$query_run = mysqli_query($con,$query);

						switch($usertype){
							case "Author":
								$query2= "insert into author 
									values('$email','$fullname','$University','$ContactDetails','$ContactLinks','$gender','$encrypted_pass','$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							case "Reviewer":
								$query2= "insert into reviewer 
									values('$email','$fullname','$gender','$encrypted_pass','$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							case "TrackChair":
								$query2= "insert into trackchair 
									values('$email','$fullname','$gender','$encrypted_pass','$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							case "PublicationChair":
								$query2= "insert into publicationchair 
									values('$email','$fullname','$encrypted_pass','$gender','$email')";
								$query_run2 = mysqli_query($con,$query2);
								break;
							default:
								$query_run2 = false;
						}
						
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
	<?php include "footer.html" ?></body>

</body>
</html>
