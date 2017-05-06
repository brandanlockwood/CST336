<?php 
session_start(); //start or resume an existing session 

include 'include/database.inc.php'; 

$connection = getDatabaseConnection(); 

if (isset($_POST['loginForm'])) { //checks whether user submitted the form 
     
    $username = $_POST['username']; 
    $password = $_POST["password"];  //hash("sha1", $_POST['password']) 
   
             

    $sql = "SELECT *  
            FROM Uploader 
            WHERE username = :username 
            AND password = :password";  //Preventing SQL Injection 
             
    $namedParameters = array(); 
    $namedParameters[':username'] = $username;                 
    $namedParameters[':password'] = $password;             
     
    $statement = $connection->prepare($sql);  
    $statement->execute($namedParameters); 
    $record = $statement->fetch(PDO::FETCH_ASSOC); 
     
    if (empty($record)) { //wrong username or password 
         $_SESSION['message']="Wrong username or password!"; 
     header("Location: index.php"); 
         
    } else { 
         
        $_SESSION['username'] = $record['username']; 
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName']; 
         
        header("Location: profile.php"); 
                 
    } 
     

     
} 




?>