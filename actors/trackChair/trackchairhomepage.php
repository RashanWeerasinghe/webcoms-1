<?php
	session_start();
    if($_SESSION['login_s'] != '5'){
        header('location:../../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="../../css/main_style.css">
</head>

<body style="background-color:#bdc3c7">
	

<nav>
    <ul>
      <li><a href="firstround.php">First-round paper evaluation</a></li>
      <li><a href="paperaccept.php">Paper Acceptance</a></li>
      <li><a href="assignreviewrs.php">Assign Reviewers </a></li>
      
     
    </ul>
  </nav>

  <br><br>

	<div id="main-wrapper">
		<center>
			<h2>Track Chair Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="../../imgs/webc.png" class="avatar"/>
		</center>
		
		<form class="myform" action="trackchairhomepage.php" method="post">
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:../../index.php');
			}
		?>
	</div>
</body>
</html>
