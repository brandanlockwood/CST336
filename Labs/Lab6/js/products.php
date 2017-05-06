<?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether user has logged in
    
    header("Location: login.php");
    
}
include 'include/database.inc.php';

$conn = getDatabaseConnection();

function displayAllProducts(){
    global $conn;
    $sql = "SELECT productId, name FROM Items ORDER BY name";
    $records = getDataBySQL($sql,$conn);

    

     //Using Form Buttons
         echo "<table>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['name'] . "</td>"; 
          echo "<td> <form action=updateProduct.php>";
          echo "<input type='hidden' name='productId' value='".$record['productId'] . "'/>";
          echo "<input type='submit' value='Update'/></form> </td>";
           echo "<td> <form action=deleteProduct.php>";
          echo "<input type='hidden' name='productId' value='".$record['productId'] . "'/>";
          echo "<input type='submit' value='Delete'/></form> </td>";
          echo "</tr>";
        } //endForeach
        echo "</table>";
     
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Products</title>
  <meta name="description" content="">
  <meta name="author" content="brandan lockwood">
<link rel='stylesheet' type='text/css' href='../css/main.css'>
  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  
</head>

<body>
  <div>
    <header>
      <h1>Product Administration</h1>
    </header>

   
    <div>
     <strong> Welcome <?=$_SESSION['adminName']?>!<br/> </strong>
     <?php
    if (isset($_SESSION['update'])) { 
    echo $_SESSION['update'];
    }
    if (isset($_SESSION['delete'])) {  
    echo $_SESSION['delete'];
    }
    if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    }
     ?>
    
         
      <br/>   
      <?=displayAllProducts()?>
      
       <form action="logout.php">
        <input type="submit" value="Logout" />    
     </form>
         
     <form action="addProduct.php">
        <input type="submit" value="Add New Product" />    
     </form>
      
      
    </div>

    <footer>

    </footer>
  </div>
</body>
</html>