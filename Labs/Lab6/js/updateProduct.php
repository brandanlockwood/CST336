<?php
session_start();
unset($_SESSION["add"]);
unset($_SESSION["delete"]);
 include 'include/database.inc.php';
 $conn = getDatabaseConnection();
 
 function getProductById(){
     global $conn;
    $sql = "SELECT * FROM Items WHERE productID = :productID";
    $namedParameters = array();
    $namedParameters[':productID'] = $_GET['productId'];
    $statement = $conn->prepare($sql);    
    $statement->execute($namedParameters);
    $record = $statement->fetch();
    return $record;
 }

if (isset($_GET['updateForm'])) {  //admin submitted the Update Form
    
    $sql = "UPDATE Items
            SET name = :name,
            price = :price,
            descripition = :description,
            health = :health,
            category = :category,
            health = :health,
            productID =:productID
            WHERE productID = :productID";
    $namedParameters = array();
    $namedParameters[':name'] = $_GET['productName'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':description'] = $_GET['productDescription'];
    $namedParameters[':category'] = $_GET['categoryId'];
    $namedParameters[':health'] = $_GET['health'];
    $namedParameters[':productID'] = $_GET['productId'];

    $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
     $_SESSION['update'] ="Record has been updated!";  
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
<link rel='stylesheet' type='text/css' href='../css/main.css'>
  <title>updateProduct</title>
  <meta name="description" content="">
  <meta name="author" content="brandan lockwood">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  
</head>

<body>
  <div>
    <header>
      <h1>Update Product</h1>
    </header>

    <div>
        
        <?$product = getProductById()?>

      <form>
          
          Product Name: <input type="text" name="productName" value="<?=$product['productName']?>" /> <br />
          Description: <textarea rows="4" cols="20" name="productDescription"></textarea><br />
          Price: <input type="text" name="price" /> <br />
          Category: <select name="categoryId">
                       <option value="1">Soft Drinks</option>
                       <option value="2">Snacks </option>
                       <option value="3">Sandwiches </option>
                    </select>
          <br />      
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
          <input type="hidden" name="productId" value="<?=$_GET['productId']?>" />
          <input type="submit" value="Update Product" name="updateForm" />
          
      </form>

      
    </div>

    <footer>
    </footer>
  </div>
</body>
</html>