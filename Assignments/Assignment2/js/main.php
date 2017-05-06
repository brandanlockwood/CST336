<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <?php
    echo"<table >";
    $size = rand(0,100);
    $index=array();
    for($i=0; $i<$size;$i++)
    {
        arsort($index);
       array_push($index,$i);
       echo "<tr rowspan=10><td>";
       $color =generateRandomColor();
       if($i%2==0)
       {
    
           echo"<font color=$color>". $index[$i]  ."even </font></br>";
       } 
       else
       {
           echo "<font  color=$color>".$index[$i]." odd </font></br>";
       }
       echo"</td></tr>";
    }
    echo"</table>";
    function generateRandomColor() {
	return '#' . strtoupper(dechex(rand(0,10000000)));
}
$size =rand(0,100);
$pictures = array();
  for($i=0;$i<$size;$i++)
  {
      shuffle($pictures);
      $color=generateRandomColor();
      $x=$i%13;
      if($x==0)
      {
          $x=1;
      }
     array_push($pictures,"../img/assets/cards/clubs/".$x.".png");
     echo "<img src=$pictures[$i]>";
  }
    ?>
    <div>
    <footer>
        <p align="bottom">
             Copyright by Brandan Lockwood
        </p>
        </div>
    </footer>
</body>

</html>