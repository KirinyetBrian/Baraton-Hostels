<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Database
include('db.php');
if (isset($_POST['submit'])) {

    $uploadsDir = "/uploads";
    $allowedFileType = array('jpg', 'png', 'jpeg');

    // Velidate if files exist
    if (!empty(array_filter($_FILES['fileUpload']['name']))) {
        // Loop through file items
        // $countfiles = count($_FILES['fileUpload']['name']);

        foreach ($_FILES['fileUpload']['name'] as $i => $val) {
            $filename = $_FILES['fileUpload']['name'][$i];
            // move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i],'uploads/'.$filename);
            // Get files upload path
            // $fileName        = $_FILES['fileUpload']['name'][$i];
            $tempLocation    = $_FILES['fileUpload']['tmp_name'][$i];
            $targetFilePath  = $uploadsDir . $filename;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadDate      = date('Y-m-d H:i:s');
            $uploadOk = 1;

            $propertyname = $_POST['propertyname'];
            $userid = $_SESSION['user'];
            // $userid= 5;
            $Room_Type = $_POST['Room_Type'];
            $location = $_POST['location'];
            $contact = $_POST['contact'];
            $cost = $_POST['cost'];

            //    echo   $propertyname;
            //echo $_SESSION["user"];
            //    echo $Room_Type;
            //    echo $location;
            //    echo  $contact;
            //    echo  $cost;


            if (is_null($propertyname)) {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "its null ooh",
                );
            }

            if (in_array($fileType, $allowedFileType)) {
                if (move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i], 'uploads/' . $filename)) {

                    $sqlVal = "('" . $filename . "','" . $uploadDate . "','" . $userid . "','" . $propertyname . "','" . $Room_Type . "'
                            ,'" . $location . "','" . $contact . "',,'" . $cost . "')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File could not be uploaded.",
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }

            // Add into MySQL database
            // $insert = mysqli_query($con, "INSERT INTO uploads (images,date_time,userid,propertyname,Room_Type,location,contact,cost) 
                   
            //       VALUES ('" . $filename . "','" . $uploadDate . "','" . $userid . "','" . $propertyname . "','" . $Room_Type . "','" . $location . "','" . $contact . "','" . $cost . "')");
            if (!empty($sqlVal)) {
                $insert = mysqli_query($con, "INSERT INTO uploads (images,date_time,userid,propertyname,Room_Type,location,contact,cost) 
                   
                   VALUES ('" . $filename . "','" . $uploadDate . "','" . $userid . "','" . $propertyname . "','" . $Room_Type . "','" . $location . "','" . $contact . "','" . $cost . "')");

                if ($insert) {
                    $response = array(
                        "status" => "alert-success",
                        "message" => "Files successfully uploaded."
                    );
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => $sqlVal,
                    );
                }
            }
        }
    } else {
        // Error
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }
}
