
<!DOCTYPE html>
<html>
<head>

	<title>Upload User Details</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/about_help_styles.css">

 <!-- styles for dots in paragraphs -->
 <style>
.dot {
  height: 8px;
  width: 8px;
  background-color: #86B0DD;
  border-radius: 50%;
  margin-bottom:2px;
  margin-left:28px;
  margin-right:5px;
  display: inline-block;
}
</style>
</head>
<body>

	<nav>
  <div class="logo">Web-COMS</div>
      <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
    <ul>
	  <li><a href="conferencechairhomepage.php">Home</a></li>
      <li><a href="create_conference.php">Create a Conf</a></li>
      <li><a href="viewConferencesForCC.php">View Conf</a></li>
      <li><a href="addnotemplates.php">Add notification templates</a></li>
      <li><a class="active" href="upudetauls.php">Upload User Details</a></li>
      <li style="float:right; margin-right:40px"><a href="../logout.php">Log Out</a></li>

    </ul>
  </nav>

	<br>
	<div id="main-wrapper">


		<h3 style="margin-left:25px;color:dodgerblue;">Upload User Details</h3>

		<form action="create_conference.php"method="post">
			<br><h1>Upload User Bulks</h1>

			<label>Bulk Name</b></label><br>
			<input name="name" type="text" class="inputvalues" placeholder="Type your conference's title" required/><br>
			
			<label>File</b></label><br>
			<button>Add File</button>
			


			<!-- <input name="create_btn" type="submit" id="register_btn" value="CREATE"/><br> -->
			<button name="create_btn" type="submit" id="register_btn" value="CREATE">Submit</button>


		</form>
		
		
	</div>
	<!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
         </div>
</body>

</html>
