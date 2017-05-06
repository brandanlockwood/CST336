<?php
function getDatabaseConnection()
{
// Set the Cloud 9 MySQL related information...this is set in stone by C9!
$servername = getenv('IP');
$dbPort = 3306;

// Which database (the name of the database in phpMyAdmin)?
$database = "OtterExpress";
// My user information...I could have prompted for password, as well, or stored in the
// environment, or, or, or (all in the name of better security)
$username = getenv('C9_USER');
$password = "Bel14766";

// Establish the connection and then alter how we are tracking errors
$dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
return $dbConn;
}

function getDataBySQL($sql,$dbConn)
{
 
    $stmt = $dbConn->prepare($sql);

// Execute the query
$stmt -> execute ();
$data=array();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
  
   
    
 array_push($data,$row);
   
}
    return $data;
    
}
function getMAX($sql)
{
    $dbConn=getDatabaseConnection();
       $stmt = $dbConn->prepare($sql);

// Execute the query
$stmt -> execute ();
$data=array();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
  
   
    
 array_push($data,$row);
   
}
    return $data;
}
?>