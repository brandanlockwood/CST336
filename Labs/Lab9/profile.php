<?php 
include 'include/database.inc.php'; 


if ($_FILES["fileName"]["error"] > 0) {
          echo "Error: " . $_FILES["fileName"]["error"] . "<br>";
        }
 else {


          if (file_exists("uploadedFiles/" .$_SESSION["username"])) {
     // echo $_FILES["file"]["name"] . " already exists. ";
  }  else {
     mkdir ($username=$_SESSION["username"]);
move_uploaded_file($_FILES["fileName"]["tmp_name"], 
  $username . "/" . $_FILES["fileName"]["name"]); 
}
}
 function createThumbnail(){
     $sourcefile = imagecreatefromstring(file_get_contents($_FILES["fileName"]["tmp_name"]));
    $newx = 150; $newy = 150; //new size
    if (imagesx($sourcefile) > imagesy($sourcefile)) {   // landscape orientation
            $newy = round($newx/imagesx($sourcefile) * imagesy($sourcefile));
      }
     else {   // portrait orientation 
            $newx = round($newy/imagesy($sourcefile) * imagesx($sourcefile));
      }

    $thumb = imagecreatetruecolor($newx,$newy);
    imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
     imagesx($sourcefile), imagesy($sourcefile)); 
    imagejpeg($thumb,"thumb.jpg"); //creates jpg image file called "thumb.jpg"
    
}
echo "<img src='thumb.jpg'/>";
if(isset($_POST["name"]))
{
  createThumbnail();
}
else
{
    
}
  
  
  




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<link rel='stylesheet' type='text/css' href='css/main.css'>
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>login</title>
  <meta name="description" content="">
  <meta name="author" content="brandan lockwood">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../css/main.css">
 
</head>

<body>
<form method="POST" enctype="multipart/form-data"> 
Select file: <input type="file" name="fileName" /> <br />
Name:<input type="text" name="name"/><br/>
<input type="submit"  name="uploadForm" value="Upload File" /> 
</form>
<form method="post" action="logout.php">
<input type="submit" value="logout"/>
</form>
</body>
</html>