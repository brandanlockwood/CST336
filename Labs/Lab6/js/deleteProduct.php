<?php 
session_start();
unset($_SESSION["update"]);
unset($_SESSION["add"]);
 include 'include/database.inc.php';
 $conn = getDatabaseConnection();
function getProductById(){
     global $conn;
    $sql = "SELECT * FROM Items WHERE productID = :productID";
   $namedParameters = array();
    $namedParameters[':productID'] = $_GET['productId'];
    $statement = $conn->prepare($sql);  
    $statement->execute($namedParameters);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    return $record;
 }
 
 function deleteProductById(){
     global $conn;
    $sql = "DELETE FROM Items
    		WHERE productID = :productID";
    $namedParameters = array();
    $namedParameters[':productID'] = $_GET['productId'];
    $statement = $conn->prepare($sql);    
    $statement->execute($namedParameters);
 }
 if(isset($_GET['deleteForm']))
 {
 deleteProductById();
 $_SESSION['delete'] ="Record has been deleted!";  
 header("Location: products.php"); 
 }
 if(isset($_GET['cancelForm']))
 {
 
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

  <title>deleteProduct</title>
  <meta name="description" content="">
  <meta name="author" content="brandan lockwood">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
    <header>

    </header>

    <div>
        
        <?php $product = getProductById()?>

      <form>
          
          <?php echo "Do you really want to delete " .$product['name']."?"?>
          <input type="hidden" name="productId" value="<?=$_GET['productId']?>" />
          <input type="submit" value="OK" name="deleteForm" />
          <input type="submit" value="Cancel" name="cancelForm"/>
          
      </form>

      
    </div>

    <footer>
    </footer>
  </div>
</body>
</html>