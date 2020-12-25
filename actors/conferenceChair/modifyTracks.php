<?php
  session_start();
  require '../../dbconfig/config.php';
  if($_SESSION['login_s'] != '4'){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<head>

    <title>Conference Track Modification</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../../css/nav_footer_styles.css">
	<link rel="stylesheet" href="../../css/reg_form_style.css">
	<link rel="stylesheet" href="../../css/sty.css">
	<link rel="stylesheet" href="../../css/table_style.css">
	<style>

* {
  font-family: sans-serif; /* Change your font family */
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
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
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
			<!--<li><a class="active" href="index.php">WebCOMS</a></li>-->
			<li><a href="conferencechairhomepage.php">Back</a></li>
		</ul>

	</nav>

    <div id="main-wrapper" style="margin:20px auto;height:360px">
        <center>
			<h2>Add New Track to Conference</br><br>
		</center>
        <form action="modifyTracks.php" class="myform" method="post" style="height:280px;">
            <fieldset>
                <label for="selectT"><b>Choose Conference Tracks:</b><br>(Hold Ctrl to select multiple tracks)</label><br>
                <select name="selectedT[]" id="selectT" multiple="multiple" style="height: 100px;">
                    <?php
                        $query_result = mysqli_query($con,"select * from system_conference_track;");
                        while($row = mysqli_fetch_assoc($query_result)){
                    ?>
                    <option value="<?= $row['trackId'] ?>"><?= $row['trackName'] ?></option>
                    <?php 
                        }
                    ?>
                </select>
            <button name="addTrack_btn" id='btnValidate' value="addT" >Add Tracks</button><br>
            </fieldset>
            <br>
        </form>
        <?php
            if(isset($_POST['addTrack_btn'])){
                $c_id = $_SESSION['c_id'];
                $selectedT = $_POST['selectedT'];
                $checkDT = 0;

                foreach($selectedT as $selT){
                    $query = mysqli_query($con,"select * from conferencetrack where (systemTrackId=$selT) and (conferenceID=$c_id)");
                    
                    if(mysqli_num_rows($query)>0){
                        $checkDT++;
                        
                    }
                }

                if($checkDT>0){
                    echo '<script type="text/javascript"> alert("You selected some Track is allready added to this conference...!") </script>';
                }
                else{
                    foreach($selectedT as $selT){
                        $query1 = mysqli_query($con,"insert into conferencetrack values(NULL,$selT,$c_id)");
                    }
                    if($query1){
                        echo '<script type="text/javascript"> alert("Track Adding process is successfully..!") </script>';
                    }
                    else{
                        echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
                    }
                }              
            }
        ?>
    </div>
</body>
</html>