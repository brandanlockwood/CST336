<?php
session_start();
unset($_SESSION["update"]);
unset($_SESSION["delete"]);
if (isset($_GET['addForm'])) {  //admin submitted form to add product
    
  include 'include/database.inc.php';
  $sql="SELECT MAX(productID) as num FROM `Items`";
 $product=getMAX($sql);
 $num =$product[0]["num"]+1;
  $sql = "INSERT INTO Items ( `name`, `price`, `descripition`, `health`, `category`, `productID`) 
          VALUES ( :name, :price, :descripition, :health, :category, :productID)";
          
  $namedParameters = array();
  $namedParameters[':name'] = $_GET['productName'];
  $namedParameters[':price'] = $_GET['price'];
  $namedParameters[':descripition'] = $_GET['productDescription'];
  $namedParameters[':health'] = $_GET['health'];
  $namedParameters[':category'] =$_GET['categoryID'];
  $namedParameters[':productID']=$num;
   

  $conn = getDatabaseConnection();    
  $statement = $conn->prepare($sql);
  $statement->execute($namedParameters);    
      
  $_SESSION['add'] ="Record has been added!";  
   header("Location: products.php"); 
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Add new Product</title>
  <meta name="description" content="">
  <meta name="author" content="Brandan Lockwood">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">


  <link rel='stylesheet' type='text/css' href='../css/main.css'>
 
</head>

<body>
  <div>
    <header>
      <h1>Adding New Product</h1>
    </header>

    <div>
      
      <form>
          
          Product Name: <input type="text" name="productName" /> <br />
          Description: <textarea rows="4" cols="20" name="productDescription"></textarea><br />
          Price: <input type="text" name="price" /> <br />
          Category: <select name="categoryID">
                       <option value="soft Drinks">Soft Drinks</option>
                       <option value="Snacks">Snacks </option>
                       <option value="Sandwiches">Sandwiches </option>
                    </select>
                    <br>
                    health: <select name="health">
                       <option value="1">1</option>
                       <option value="2">2 </option>
                       <option value="3">3 </option>
                        <option value="4">4</option>
                       <option value="5">5 </option>
                       <option value="6">6 </option>
                        <option value="7">7</option>
                       <option value="8">8 </option>
                       <option value="9">9</option>
                       <option value="10">10</option>
                    </select>
          
          <br />          
          <input type="submit" value="Add Product" name="addForm" />
          
      </form>
      
      
    </div>

    <footer>
    </footer>
  </div>
</body>
</html>