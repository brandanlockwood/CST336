<?php
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

function getTable()
{
  echo "<p>SELECT * FROM Items</p>
    <table>
    <th>MENU</th>
         <tr class='header'>
                <td>Name</td>
                <td>Price</td>
                <td>Heatlth</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT * FROM Items";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["name"]."</td>";
 echo "<td>".$row["price"]."</td>";
 echo "<td>".$row["health"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
function collegeTable()
{
  echo "<p>SELECT firstName,lastName,CollegeName
FROM `Client`
INNER JOIN College ON Client.CollegeID = College.CollegeID</p>

    <table>
    <th>Customer from each College</th>
         <tr class='header'>
                <td>Name</td>
                <td>College</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT firstName,lastName,CollegeName
FROM `Client`
INNER JOIN College ON Client.CollegeID = College.CollegeID";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["firstName"]." ".$row["lastName"]."</td>";
 echo "<td>".$row["CollegeName"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
function minPrice()
{
    
}
function otterTotal()
{
  echo "<p>SELECT otterID, SUM( price ),orderDate
FROM `Order` o
INNER JOIN `Items` i ON o.productID = i.productID
GROUP BY otterID</p>

    <table>
    <th>Customer Totals for a given day</th>
         <tr class='header'>
                <td>otterID</td>
                <td>Total</td>
                <td>Date</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT otterID, SUM( price ),orderDate
FROM `Order` o
INNER JOIN `Items` i ON o.productID = i.productID
GROUP BY otterID";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
$data=array();
$i=0;
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["otterID"]."</td>";
 echo "<td>".$row["SUM( price )"]."</td>";
 echo "<td>".$row["orderDate"]."</td>";
 echo "</tr>";
}
echo "</table>";
}

function otterNoOrder()
{
  echo "<p>SELECT otterID
FROM `Client`
LEFT JOIN `Order`
USING ( otterID )
WHERE productID IS NULL </p>

    <table>
    <th>Otters that have not order anything</th>
         <tr class='header'>
                <td>otterID</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT otterID
FROM `Client`
LEFT JOIN `Order`
USING ( otterID )
WHERE productID IS NULL";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["otterID"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
function otterNumOrder()
{
  echo "<p>SELECT otterID, count( * ) AS num
FROM `Order`
GROUP BY OtterID </p>

    <table>
    <th>Number of orders from otters</th>
         <tr class='header'>
                <td>otterID</td>
                <td>number of orders<td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT otterID, count( * ) AS num
FROM `Order`
GROUP BY OtterID";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["otterID"]."</td>";
  echo "<td>".$row["num"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
function collegeTotal()
{
  echo "<p>SELECT collegeName, SUM( price )
FROM `Order` o
INNER JOIN `Items` i ON o.productID = i.productID
INNER JOIN `Client` c ON o.otterID = c.otterID
INNER JOIN `College` cl ON c.CollegeID = cl.collegeID
GROUP BY collegeName</p>

    <table>
    <th>Total revenue per College</th>
         <tr class='header'>
                <td>College</td>
                <td>Total</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT collegeName, SUM( price )
FROM `Order` o
INNER JOIN `Items` i ON o.productID = i.productID
INNER JOIN `Client` c ON o.otterID = c.otterID
INNER JOIN `College` cl ON c.CollegeID = cl.collegeID
GROUP BY collegeName";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["collegeName"]."</td>";
 echo "<td>".$row["SUM( price )"]."</td>";
 echo "</tr>";
}
echo "</table>";
}

function marchCustomers()
{
  echo "<p>SELECT firstName, lastName, orderDate
FROM `Order` o
INNER JOIN `Client` c ON o.otterID = c.otterID
WHERE orderDate
BETWEEN '2016-03-01'
AND '2016-03-31'</p>

    <table>
    <th>Customers in March</th>
         <tr class='header'>
                <td>Name</td>
                <td>Date</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT firstName, lastName, orderDate
FROM `Order` o
INNER JOIN `Client` c ON o.otterID = c.otterID
WHERE orderDate
BETWEEN '2016-03-01'
AND '2016-03-31'";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["firstName"]." ".$row["lastName"]."</td>";
 echo "<td>".$row["orderDate"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
function aprilCustomers()
{
  echo "<p>SELECT firstName, lastName, orderDate
FROM `Order` o
INNER JOIN `Client` c ON o.otterID = c.otterID
WHERE orderDate
BETWEEN '2016-04-01'
AND '2016-04-30'</p>

    <table>
    <th>Customers in April</th>
         <tr class='header'>
                <td>Name</td>
                <td>Date</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT firstName, lastName, orderDate
FROM `Order` o
INNER JOIN `Client` c ON o.otterID = c.otterID
WHERE orderDate
BETWEEN '2016-04-01'
AND '2016-04-30'";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["firstName"]." ".$row["lastName"]."</td>";
 echo "<td>".$row["orderDate"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
function buildingDeliveries()
{
  echo "<p>SELECT collegeName ,email,buildingName
FROM `Client` c
INNER JOIN `College` cl ON c.collegeID = cl.collegeID
INNER JOIN `Order` o ON c.otterID = o.otterID
INNER JOIN `Items` i ON i.productID = o.productID</p>

    <table>
    <th>Deliveries per college</th>
         <tr class='header'>
                <td>College</td>
                <td>email</td>
                <td>Building Name</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT collegeName ,email,buildingName
FROM `Client` c
INNER JOIN `College` cl ON c.collegeID = cl.collegeID
INNER JOIN `Order` o ON c.otterID = o.otterID
INNER JOIN `Items` i ON i.productID = o.productID";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["collegeName"]."</td>";
 echo "<td>".$row["email"]."</td>";
 echo "<td>".$row["buildingName"]."</td>";
 echo "</tr>";
}
echo "</table>";
}

function popularItems()
{
  echo "<p>SELECT otterID, count( * ) AS num, name
FROM `Order` o
INNER JOIN `Items` i ON o.productID = i.productID
GROUP BY o.productID</p>

    <table>
    <th>Popular Item</th>
         <tr class='header'>
                <td>otterID</td>
                <td>number sold</td>
                <td>name of item</td>
            </tr>";
 
global $dbConn;
// Structure the select
$sql = "SELECT otterID, count( * ) AS num, name
FROM `Order` o
INNER JOIN `Items` i ON o.productID = i.productID
GROUP BY o.productID";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);



// Execute the query
$stmt -> execute ();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
 echo "<tr>";
 echo "<td>".$row["otterID"]."</td>";
 echo "<td>".$row["num"]."</td>";
 echo "<td>".$row["name"]."</td>";
 echo "</tr>";
}
echo "</table>";
}
?>


<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../css/main.css">
        <title> </title>
    </head>
    <body>
   <div ="menu">
    <?php getTable();?>
    </div>
  <div ="customers">
    <?php collegeTable();?>
  </div>
  <div ="total">
    <?php otterTotal();?>
  </div>
  <div ="noOrder">
    <?php otterNoOrder();?>
  </div>
  <div ="CollegeT">
    <?php collegeTotal();?>
  </div>
  <div ="march">
    <?php marchCustomers();?>
  </div>
   <div ="building">
    <?php buildingDeliveries();?>
  </div>
  <div ="April">
    <?php aprilCustomers();?>
  </div>
   <div ="Orders">
    <?php otterNumOrder();?>
  </div>
  <div ="Orders">
    <?php popularItems();?>
  </div>
    </body>
</html>