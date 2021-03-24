<?php
    session_start();
    if($_SESSION['login_s'] != '2'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';

    if($_SESSION['user_password'] == "Reviewer123"){
      echo '<script type="text/javascript"> 
                    if (window.confirm("Your Password is still having default one. Please change it..!")) 
                    {
                    window.location.href="rev_change_password.php";
                    };
                  </script>';
    }

?>

<!DOCTYPE html>
<html>
<head>
<title>Reviewer Home</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/table_style.css">
    <link rel="stylesheet" href="../../css/DropDownListToNav.css">

  <style>
.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid dodgerblue;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
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
		  <li><a class="active" href="reviewerhomepage.php">Home</a></li>
	    <li class="dropdown">				
					<a href="#" class="dropdown">Reviewer <i class="fa fa-caret-down"></i></a>
					
					<div class="dropdown-content" style="margin-left:-10px !important">
						<a href="updateprofile.php">Update profile</a>
						<a href="rev_change_password.php">Change Password</a>
						<a href="../logout.php">Log Out</a>
					</div>
			</li>		
    </ul>
  </nav>

  <br>
	

  <h2 style="margin-left:20px;color:#34495E;"> My Tracks And Assigned Papers</h2>

  <br><br>

  <div>
    
<center>
    <table class="content-table"  >
      <thead>
	      <tr>
          <th>Number</th>
          <th>Track name</th>
          <th>Action</th>          
      	</tr>
      </thead>
</center>
      <tbody>                                     
           <?php
          $sql = "SELECT
          system_conference_track.trackName as trackName, system_conference_track.trackId as sTId
          FROM reviewer_interest_track inner join system_conference_track 
          on reviewer_interest_track.systemTrackID = system_conference_track.trackId 
          where reviewer_interest_track.reviewerEmail='{$_SESSION['r_email']}' ";
          $result = $con->query($sql);
          
          if ($result->num_rows > 0) {
              // output data of each row
              $count = 1;
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>$count</td><td>" . $row["trackName"]."</td><td>"."<a href='route.php?SytemTId=".$row['sTId']."&trackName=".$row["trackName"]."' 
                  title='Assigned papers' style='color:#34495E;text-decoration:none'>
                  <span style='margin-right:5px;'>
                  <i class='fas fa-file'></i></span>View Assigned papers</a>". "</td></tr>";

                  $count++;
              }
              echo "</table>";
          } else {
              echo "You have not been assigned to any conference.";
          }
          
          $con->close();
          ?>
      
	  </table>	
  </div>

    <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
