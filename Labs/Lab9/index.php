<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>login</title>
  <meta name="description" content="">
  <meta name="author" content="brandan lockwood">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">
 
 
</head>

<body>
  <div>
    <header>
      <h1>ImageLogin</h1>
    </header>
    <div>
     <p>user:bar<br>
     password:trello</p>
        <form method="post" action="loginProcess.php">
            <?php if(!empty($_SESSION['message']))
            {
              echo $_SESSION['message']."<br>";
            
            }?>
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
            <input type="submit" value="Login" name="loginForm" />
            
        </form>
      
    </div>

    <footer>
    </footer>
    
    
  </div>
</body>
</html>