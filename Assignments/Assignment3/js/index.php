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
<?php 
   // define variables and set to empty values
   $nameErr = $ageErr = $candidateErr = $somErr = "";
   $name = $age = $candidate = $something =  "";
   $error=true;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //error checking
   if (empty($_POST["name"])) 
   {
   $nameErr = "Name is required";
   }
   else {
   $_SESSION["name"]=$_POST["name"];
   }
   if(empty($_POST["age"]))
   {
   $ageErr="Age is required";
   }
   else
   {
   $_SESSION["age"]=$_POST["age"];
   }
   if(empty($_POST["Candidates"]))
   {
   $candidateErr="Candidate is required";
   }
   else
   {
   $_SESSION["Candidates"]=$_POST["Candidates"];
   }
   for($i=0;$i<5;$i++)
   {
   if(empty($_POST["merch".$i]))
   {
   $somErr="must select something to purchase is required";
   }
   else 
   {
    $_SESSION["merch".$i]=$_POST["merch".$i];
   }
   }
   }
   if(empty($_POST["sub"]))
   {
    $somErr="must select something to purchase is required";
   }
   else 
   {
     $_SESSION["sub"]=$_POST["sub"];
   }
//if all the keys exist go ahead to the next page
   if( array_key_exists("name",$_SESSION)&&array_key_exists("age",$_SESSION)&&array_key_exists("Candidates",$_SESSION) )
   {
     for($i=1;$i<5;$i++) 
     {
      if(array_key_exists("merch".$i,$_SESSION)||array_key_exists("sub",$_SESSION))
      {
       $error=false;
      }
     }
   }
   ?>
 <div class="body">
  <div class="header">
   <h1>Support your Presidential Candidate</h1>

   <div class="img">
    <img class="png" src="../img/download.png">
   </div>
  </div>
  <div class="form">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   
    <div class="personInfo">
     <label>Enter your name</label>
     <input STYLE="border:2px solid black; background-color:#C6D9F0;"type="text" name="name" value=<?php echo$_SESSION['name'];?>>
     <?php echo $nameErr;?><br>
     <label>Enter your age</label>
     <input STYLE="border:2px solid black; background-color:#C6D9F0;" type="text" name="age" size="3" maxlength="3"value=<?php echo$_SESSION['age'];?>>(Must be 18 years or older)
    <?php echo $ageErr;?> <br>
    </div>
    <div class="candidate">
     
     <label>Select your Candidate</label>
     <SELECT NAME="Candidates">
      <OPTION SELECTED value=<?php echo $_SESSION['Candidates'];?>>
       <OPTION value="Donald Trump"> Donald Trump
        <OPTION value="Bernie Sanders"> Bernie Sanders
         <OPTION value="Other candidate"> Other candidate
      
     </SELECT>
     <?php echo $candidateErr;?>
    </div>
    <div class="merch">
     <p>Merchandise</p>
     
     <input  type="checkbox" name="merch1" value="Mug ($15)"> Mug ($15)
     <?php echo $somErr;?>
     <br>
     <input type="checkbox" name="merch2" value="Cap ($20)"> Cap ($20)
     <br>
     <input type="checkbox" name="merch3" value="Tote Bag ($10)"> Tote Bag ($10)
     <br>
     <input type="checkbox" name="merch4" value="Pin ($5)"> Pin ($5)
     <br>
     <p>Campaign Magazine ($10 per month)</p>
    </div>
    <div>

    </div>
    <div class="month">
     <input type="radio" name="sub" value="1 month Campaign Magazine ($10)"> 1 months
     <input type="radio" name="sub" value="3 month Campaign Magazine ($30)"> 3 month
     <input type="radio" name="sub" value="6 month Campaign Magazine ($60)"> 6 month
     <input type="radio" name="sub" value="12 month Campaign Magazine ($120)"> 12 month
     <br>
    </div>
    <div>
     <input class="buyNow" name="form" type="image" src="../img/buy-now-button.png" alt="submit">
    </div>


   </form>
  </div>
 </div>
</body>

</html>

<?php
if(!$error)
   {
   header('location:confirmation.php');
        exit();
   }
 
?>