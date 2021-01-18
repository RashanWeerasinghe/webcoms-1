<?php
// connect to the database
$conn = $con;

$c_id = $_SESSION['c_id'];

$sql = "SELECT * FROM conferenceguidelinedetails where conf_id=$c_id";

$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../../uploads/conferenceGuidelines/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];


    if (!in_array($extension, ['pdf'])) {
        echo '<script type="text/javascript"> alert("Your file extension must be .pdf") </script>';
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1MB
        // echo "File is large than 1MB !";
        echo '<script type="text/javascript"> alert("file size larger than 1 MB.. Try another file") </script>';

    } else {
        // move the uploaded (temporary) file to the specified destination
        if(move_uploaded_file($file, $destination)) {

        
            

            $query1="select * from conferenceguidelinedetails where conf_id=$c_id ";
            $query1_run=mysqli_query($con,$query1);
            if(mysqli_num_rows($query1_run)>0){
                echo '<script type="text/javascript">alert("This conference has been already uploaded conference guidelines..!!")</script>';
            }
            else{

                $sql = "INSERT INTO conferenceguidelinedetails(name,size,conf_id) VALUES 
                ('$filename',$size,$c_id)";
               
                if (mysqli_query($conn, $sql)) {
                    // echo "File uploaded successfully";
                    echo '<script type="text/javascript"> 
                    if (window.confirm("Conference Guidelines Uploaded Successfully")) 
                    {
                    window.location.href="publish_conf_guidelines.php";
                    };
                  </script>';
    
                }
            }


        }
         else {
            echo '<script type="text/javascript"> alert("Failed to submit your file !!") </script>';
        }
    }
}
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT id,name,size FROM conferenceguidelinedetails WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../uploads/conferenceGuidelines/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../uploads/conferenceGuidelines/' . $file['name']));
        readfile('../../uploads/conferenceGuidelines/' . $file['name']);

        // Now update downloads count
        // $newCount = $file['downloads'] + 1;
        // $updateQuery = "UPDATE conferenceguidelinedetails SET downloads=$newCount WHERE id=$id";
        // mysqli_query($conn, $updateQuery);
        exit;
    }

}
// sql to delete a record



