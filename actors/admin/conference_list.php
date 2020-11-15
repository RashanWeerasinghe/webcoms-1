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

    <title>Conference List</title>

   
  <link rel="stylesheet" href="../../css/about_help_styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- Added css to style tag to style table -->
<style>
#papersDownloads {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#papersDownloads td, #papersDownloads th {
  border: 1px solid #ddd;
  padding: 8px;
}

#papersDownloads tr:nth-child(even){background-color: #f2f2f2;}

#papersDownloads tr:hover {background-color: #ddd;}

#papersDownloads th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5DADE2;
  color: white;
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
      <li><a class="active" href="conference_list.php">Accepted Conferences</a></li>
      <li><a href="adminhomepage.php">Back to Home</a></li>
    </ul>    
  </nav>
  <br>

  <h2 style="margin-left:20px;">Accepted Conferences List</h2>
  <br><br>

  <div>
   
    <table id="papersDownloads">
      <thead>
	      <tr>
          <th>ID</th>
          <th>Conference</th>
          <th>Venue</th>
          <th>Start date</th>
          <th>End date</th>
          <th>Deadline</th>
          <th>Sposer details</th>
          <th>Conference Chair</th>
      	</tr>
      </thead>

      <tbody>                                     
        <?php
          $sql = mysqli_query($con, "select conferences.id,
          conferences.name,
          conferences.venue,
          conferences.start_date,
          conferences.end_date,
          conferences.deadline_date,
          conferences.sponsor_details,
          conferencechair.fullname
          from conferences
          inner join conferencechair on conferences.emailconfchair = conferencechair.emailconfchair
          where conferences.Accepted='1';") or die(mysqli_error($con));
          $counter = 1;
          while ($row = mysqli_fetch_assoc($sql)) {
        ?>                                            
            <tr id="row<?php echo $row['id'];?>">

              <td><?=$counter?></td>
              <td><?=$row['name']?></td>
              <td><?=$row['venue']?></td>
              <td><?=$row['start_date']?></td>
							<td><?=$row['end_date']?></td>
							<td><?=$row['deadline_date']?></td>
              <td><?=$row['sponsor_details']?></td>
              <td><?=$row['fullname']?></td>
            </tr>
      </tbody>
			<?php
        $counter++;}
      ?>

	  </table>	
  </div>

  <!-- Footer section -->
  <div class="footer">
            <p>&copy;2020, All rights reserved by www.WebComs.lk</p>
        </div>
</body>
</html>
