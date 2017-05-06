<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title> </title>
</head>

<body>
    <div class="body">   
    <?php
$_POST["name"]=$_SESSION["name"];
$_POST["age"]=$_SESSION["age"];
$_POST["Candidates"]=$_SESSION["Candidates"];
$_POST["sub"]=$_SESSION["sub"];
if(empty($_POST["name"]))
{
$_POST["name"]="client name";
}
if(empty($_POST["Candidates"]))
{
$_POST["Candidates"]="candidate";
}
echo'<div class="body">';
echo'<div class="cName">';
echo 'Dear '.$_POST["name"].',<br>';
echo'</div>';
echo'<div class="support">';
echo 'Thank you for supporting your candidate '.$_POST["Candidates"].'<br>';
echo'</div>';
echo'<div class="order">';
echo 'Your order these products: <br><br>';
echo'</div>';
$total=0;
echo'<div class="items">';
for($i=0;$i<5;$i++)
{
$_POST["merch".$i]=$_SESSION["merch".$i];
if(empty($_POST["merch".$i]))
{
        
}
else {
echo $_POST["merch".$i].'<br>';
//just get numbers from merch string
$str = $_POST["merch".$i];
$number =$number+ preg_replace("/[^0-9]/", '', $str);
}
}
echo $_POST["sub"].'<br>';
//get value of subscripition
$str=$_POST["sub"];
$num=preg_replace("/[^0-9]/", '', $str);
if(strlen($num)==5)
{
  $num= substr($num, 2);  
}
else{
$num= substr($num, 1);
}
$total = $total+$num;
$total=$total+$number;
echo"</div>";
echo'<div class="total">';
echo "Total: $". $total;
echo"</div>";
echo'</div>';
?>
   </body>
</html>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy(); 
?>