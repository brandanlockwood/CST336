<?php 
;
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

// Structure the select
$sql = "SELECT * FROM Items";

// Prepare the SQL...the DBMS uses this to figure out how best to execute the query
$stmt = $dbConn->prepare($sql);

// Execute the query
$stmt -> execute ();
$data=array();
// Loop through the results...notice that this is just a good ol' associative array
while ($row = $stmt -> fetch())  {
    // Notice how it represents my numbers and dates in the associative array
    // How would I use this? How do I get from the string to a number or a date?
   
    
 array_push($data,$row);
    //var_dump($row['health']);
    //echo "<br /><br />";
    
    //echo $row['name'] . ", " . $row['price'] . ", " . $row['descripition']
    // . ", " . $row['health'];
  //  echo "<br /><br />";
}

function getItems()
{
    global $data;
   $length=count($data);
   $h=array();
   $hP=array();
   $hd=array();
   for($i=0;$i<$length;$i++)
   {
     // echo  $data[$i]["health"],"<br>";
     array_push($hP,$data[$i]["price"]);
       $h[$data[$i]["price"]]=$data[$i]["name"];
       $hd[$data[$i]["price"]]=$data[$i]["descripition"];
   }
   sort($hP);
    
      for($i=0;$i<$length;$i++)
    {
    echo "<div class='item-wrapper'>";
    echo "<div class='item-name'>".$h[$hP[$i]] ."  $".$hP[$i]."</div>
    <div class='item-descripition'>".$hd[$hP[$i]]."</div>
    </div>";
    }
}
function getSearch()
{
    echo "Product Search: <input type='checkbox' name='Product Search'onclick='submit();' value='Category'></input><br>";
    echo "Max Price: <input id='price'type='text' name='Price'  value=''></input><br>";
    echo "healthy choice: <input type='checkbox' name='healthy choice' onclick='submit();' value='health'></input><br>";
}
function sortCategories()
{
   global $data;
   $length=count($data);
   $category=array();
   $cP=array();
   $cD=array();
   for($i=0;$i<$length;$i++)
   {
     $cP[$data[$i]["name"]]=$data[$i]["price"];
     $category[$data[$i]["category"]][$i]=$data[$i]["name"];
      $cD[$data[$i]["name"]]=$data[$i]["descripition"];
   }
    foreach ($category as $k=>$s1)
    {
     echo "<b>".$k."</b>";
     foreach($s1 as $s2)
     {
   echo "<div class='item-wrapper'>";
   echo "<div class='item-name'>".$s2."  $".$cP[$s2]."</div>
   <div class='item-descripition'>".$cD[$s2]."</div>
   </div>";
     }
    }
}
function sortP($MAXP)
{
   global $data;
   $length=count($data);
   $h=array();
   $hP=array();
   $hd=array();
   for($i=0;$i<$length;$i++)
   {
       array_push($hP,$data[$i]["price"]);
       $h[$data[$i]["price"]]=$data[$i]["name"];
       $hd[$data[$i]["price"]]=$data[$i]["descripition"];
   }
   rsort($hP);
    if(isset($_GET["Price"]))
    {
      for($i=0;$i<$length;$i++)
    {
        if($hP[$i]<=$MAXP)
        {
    echo "<div class='item-wrapper'>";
    echo "<div class='item-name'>".$h[$hP[$i]] ."  $".$hP[$i]."</div>
    <div class='item-descripition'>".$hd[$hP[$i]]."</div>
    </div>";
        }
    }
    }
}
function sortH()
{
   global $data;
   $length=count($data);
   $h=array();
   $hP=array();
   $hd=array();
   $itemPrice=array();
   for($i=0;$i<$length;$i++)
   {
      array_push($hP,$data[$i]["health"]);
       $h[$data[$i]["health"]]=$data[$i]["name"];
       $hd[$data[$i]["health"]]=$data[$i]["descripition"];
        $itemPrice[$data[$i]["health"]]=$data[$i]["price"];
   }
   sort($hP);
   for($i=0;$i<$length;$i++)
    {
    echo "<div class='item-wrapper'>";
    echo "<div class='item-name'>".$h[$hP[$i]]."  $".$itemPrice[$hP[$i]]."</div>
    <div class='item-descripition'>".$hd[$hP[$i]]."</div>
    </div>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <h1>Otter Express</h1>
    
    <body>
      <div>
          <form  method="get">
              <div>
               <fieldset>
						<legend>Search Criteria:</legend>
						<?=getSearch(); 
						//var_dump($_GET);?>
						   </fieldset>
						   </div>
						   <div>
						       <fieldset>
				<legend>Menu</legend>
				<?php if(isset($_GET["healthy_choice"]))
                 {
                  sortH(); 
    
                  }
                  else if(!$_GET["Price"]=="" && isset($_GET["Price"]))
                  {
                      if(is_numeric($_GET["Price"]))
                      {
                    sortP($_GET["Price"]);
                      }
                      else
                      {
                         
                    echo "Error not a valid value" ;
                          
                      }
                  }
                 else if(isset($_GET["Product_Search"]))
                  {
                   sortCategories();
                  }
                  else
                  {
                  getItems();
                  }?>
<script>
$('.item-wrapper').click(function() {
  var thisDescription = $('.item-descripition', $(this));

  // Hide all other descriptions
  $('.item-descripition').not(thisDescription).hide();

  // Toggle (show or hide) this description
  thisDescription.toggle();  
});

</script>
			    </fieldset>
			    </div>
          </form>
      </div>
    </body>
</html>