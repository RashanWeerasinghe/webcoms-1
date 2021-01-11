<?php
    session_start();
    if($_SESSION['login_s'] != '3'){
        header('location:../../login.php');
    }
    require '../../dbconfig/config.php';
?>
<?php //include 'fileLogicForViewConfGuidelines.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Home</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
    <link rel="stylesheet" href="../../css/reg_form_style.css">
    <link rel="stylesheet" href="../../css/table_style.css">
    <link rel="stylesheet" href="../../css/DropDownListToNav.css">


<!-- Here added jquery to add a filter-search bar -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <style>

.conListLink{
  color:white;
  /* text-shadow: 1px 1px 0 #444; */
}

.conListLink:link,
.conListLink:link:visited{
  background-color: dodgerblue;
  color: white;
  padding: 7px 15px;
  width:110px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius:6px;
}  

.conListLink:hover, 
.conListLink:active {
  background-color: #00b8e6;
}


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
  min-width:180px;
}

.content-table tbody tr {
  border-bottom: 1px solid #E5E8E8 ;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid dodgerblue;
}

.content-table tbody tr.active-row {
  font-weight: 400;
  color: #111;
}
 
.isDisable{
  color:currentColor;
  cursor:not-allowed;
  opacity:0.5;
  text-decoration:none;
}

.linkDec, .link:visited{
  text-decoration:none;
  color:currentColor;
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
	  <li><a class="active" href="author_home.php">Home</a></li> 
	  <!-- <li><a href="updateprofile.php">Update Profie</a></li> -->
    <li class="dropdown">				
					<a href="#" class="dropdown">Profile <i class="fa fa-caret-down"></i></a>
					
					<div class="dropdown-content">
						<a href="updateprofile.php">Update profile</a>
						<a href="#">Link 2</a>
						<a href="../logout.php">Log Out</a>
					</div>
			</li>
	</ul>
</nav>

  <br>
  <h2 style="margin-left:20px;">All Conferences </h2>

  <input style="margin-left:735px;width:348px;height:45px;color:#111;" id="myInput" type="text" placeholder="Type to search..">
<br>
  <center>


<table class="content-table" >
  <thead>
  <tr>
     <th>Conference</th>
	   <th>Location</th>
	   <th>Conference Start Date</th>
	   <th>Paper Submission Due Date</th>
	   <th>Conference Guidelines</th>
     <th>View Camera-Ready <br>Submission Guidelines</th>
	   <th>Submit Research Paper</th>
	   <th>Submitted Research Papers</th>

	 </tr>
   </thead>

	<!-- <br> -->
  <tbody id="myTable">

	
	<?php
	
	 if(isset($_POST['back']))
			{
				header('location:.php');
	}


	
	$conn = $con;
	
  $sql = "SELECT * from conferences 
          group by conferences.id DESC";
  $result = $conn-> query($sql);
  
  // $c_id = $_SESSION['id'];

	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){

	    echo "</tr><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"];
      echo "<td><a href='route.php?ConfGuid_Id=". $row['id'] . "&Conf_Name=". $row['name'] . " '    class='conListLink' > View </a></td>";

      echo "<td><a href='route.php?CamSubGuid_Id=". $row['id'] . "&CamSubGuid_Name=". $row['name'] . " '    class='conListLink' > View </a></td>";
      echo "<td><a href='papersubmission.php?c_id=". $row['id'] ." ' title='submit paper' class='linkDec'><span style='margin-right:5px;'><i class='fas fa-file-upload'></i></span>Submit</a></td>";

      echo "<td><a href='route.php?viewRPaper_cid=". $row['id'] . "&con_Name=". $row['name'] . "' class='conListLink'>View</a></td>";
		
       
    }
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	
	?>


</tbody>
	
	</table>
</center>

</div>
	   	
  <!-- Footer section -->
	<div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
	</div>

</body>
</html>
