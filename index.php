<?php
 session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"]))
    {
        
            // Check if file already exists
        if (file_exists($target_file)) 
        {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
            // Check file size
        if($_FILES["fileToUpload"]["size"] > 500000) 
        {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) 
        {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";


            
            $_SESSION[$_FILES["fileToUpload"]["name"]] = $_FILES["fileToUpload"]["name"];
            
            } 
            else 
            {
            echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    $display = "";
    foreach($_SESSION as $k1=>$v1)
    {
        
        $display.= "<div id = id1><img src=/uploads/".$v1."></div>";
    }
           

       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   
        <form action="" method="POST" enctype="multipart/form-data">
        <h2>Select image to upload:</h2>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload Image" name="submit" id="sub">
       
        </form>
        <?php echo $display;?>

    
</body>
</html>
