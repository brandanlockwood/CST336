
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
       <div>
          <?php 
          $saltPassword = hash("sha1","gH_".$_POST["password"]."9\$xP");
          echo $saltPassword;
          ?>
       </div>
    </body>
</html>