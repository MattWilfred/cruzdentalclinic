<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
</html>


<?php 
// Include the database configuration file  
require_once 'dbcon.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 


    $id = $_POST['id'];

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif','heic'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $con->query("INSERT into prescription (prescription_image, date_added, id) VALUES ('$imgContent', NOW(), '$id')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "Prescription has been successfully added."; 
            }else{ 
                $statusMsg = "Adding prescription failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            
        } 
    }
} 
echo "<script>alert('$statusMsg');</script>";
header("Location: {$_REQUEST["url"]}");
 

?>