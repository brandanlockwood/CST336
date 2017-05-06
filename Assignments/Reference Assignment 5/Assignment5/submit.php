<?php 

include 'include/database.inc.php';

if($_POST["method"]=="INSERT")
{

 //echo $_POST["method"];
$sql="INSERT INTO Grades (username,Nquiz,Aquiz,Lquiz,date,totalC)
VALUES (:username,:numberOfQuizes,:averageOfQuizes,:lastQuizTaken,:date,:total) ON DUPLICATE KEY
UPDATE username=:username,Nquiz=:numberOfQuizes,Aquiz=:averageOfQuizes,Lquiz=:lastQuizTaken,date=:date,totalC=:total";
$dbConn=getDatabaseConnection();
$namedParameters=array();
$namedParameters[":username"]=$_POST["username"];
$namedParameters[":numberOfQuizes"]=$_POST["numberOfQuizes"];
$namedParameters[":averageOfQuizes"]=$_POST["averageOfQuizes"];
$namedParameters[":lastQuizTaken"]=$_POST["lastQuizTaken"];
$namedParameters[":date"]=date("Y-m-d H:i:s");
$namedParameters[":total"]=$_POST["total"];
//print_r($namedParameters);
insertQuizData($namedParameters,$sql,$dbConn);
}
if($_GET["method"]=="GetQuiz")
{
$sql="SELECT Nquiz,Aquiz,Lquiz,date,totalC
FROM `Grades`
WHERE username=:username";
$param[":username"]=$_GET["username"];
//echo $sql;
$dbConn=getDatabaseConnection();
$result=getQuizData($param,$sql,$dbConn);
// Set HTTP Response Content Type
header('Content-Type: application/json; charset=utf-8');
// Format data into a JSON response
$json_response = json_encode($result);
// Deliver formatted data
echo $json_response;
}


?>