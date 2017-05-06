<?php

function  drawWord($text,$color,$pattern)
{
   $textLen = strlen($text);
   if($textLen>1)
   {
   echo "<table  >";
   echo "<tr>";
    for ($i =0; $i<$textLen;$i++)
    {
    if(ctype_digit($text[$i]))
    {
    printNumber($text[$i],$color,$pattern);
    }
    else{
      $text[$i] = strtoupper($text[$i]);
        if(isVowel($text[$i]))
        {
        printCharacter($text[$i],$color,$pattern);
        }
        else{
         printCharacter($text[$i],$color,$pattern);
        }
    }
    }
    echo "</tr>";
    echo"</table>";
   }
}
function isVowel($vow) {
	if ($vow == "A" || $vow == "E" || $vow == "I" || $vow == "O" || $vow == "U") {
		return true;
	} 
	else {
		return false;
	}
}
function generateRandomColor() {
	return '#' . strtoupper(dechex(rand(0,10000000)));
}
function printRow($r1,$r2,$r3,$r4,$r5,$r6,$r7,$color,$pattern)
{
    $length= array($r1,$r2,$r3,$r4,$r5,$r6,$r7);  
    echo "<br>";
    if($pattern==1)
    {
    for($i=0;$i<count($length);$i++)
    { 
        $color=generateRandomColor();
        if($length[$i]==0)
        {
            echo'<font class="zeros">'. "0"."</font>";
        }
        else
        {
            echo "<font class=\"zeros\" color=$color>". "1"."</font>";       
        }
    }
    }
    else
    {
    for($i=0;$i<count($length);$i++)
      { 
        if($length[$i]==0)
        {
            echo'<font class="zeros">'. "0"."</font>";
        }
        else
        {
            echo "<font class=\"zeros\" color=$color>". "1"."</font>";       
        } 
       }
    }
    echo"</br>";
}
function printNumber($character,$color,$pattern)
{
    echo "<td>";
    if($pattern==2)
    {
       $color=generateRandomColor();
    }
    switch ($character)
    {
         case'0':
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,0,0,1,1,1,$color,$pattern);
             printRow(1,1,0,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,0,1,1,$color,$pattern);
             printRow(1,1,1,0,0,1,1,$color,$pattern);
             printRow(0,1,1,1,1,1,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
            break;
        case '1':
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case '2':
             printRow(0,0,1,1,1,1,1,$color,$pattern);
             printRow(0,0,1,1,1,1,1,$color,$pattern);
             printRow(0,1,1,0,0,1,1,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,0,0,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,0,0,0,$color,$pattern);
             printRow(0,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case '3':
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,0,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(0,0,0,0,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
            break;
        case '4':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
            break;
        case '5':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(0,0,0,1,1,1,0,$color,$pattern);
             printRow(0,0,0,0,1,1,0,$color,$pattern);
             printRow(1,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
            break;
        case '6':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case '7':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,0,1,1,0,$color,$pattern);
             printRow(0,0,0,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,0,0,0,$color,$pattern);
             printRow(0,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
            break;
            case '8':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
            case '9':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
            break;
        default:
            break;
        
    }//end of switch statement
    echo"</td>";
}
    
function printCharacter($character,$color,$pattern)
{   
   if($pattern==2)
   {
       $color=generateRandomColor();
   }
   echo"<td>";
   switch ($character)
    {
         case'A':
             printRow(0,0,0,1,0,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'B':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'C':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(1,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'D':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,1,$color,$pattern);
             printRow(1,1,0,0,0,0,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'E':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'F':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
            break;
        case 'G':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,1,0,1,1,1,$color,$pattern);
             printRow(1,1,1,0,1,1,1,$color,$pattern);
             printRow(1,1,1,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'H':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'I':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'J':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,1,1,0,0,$color,$pattern);
             printRow(0,0,0,1,1,0,0,$color,$pattern);
             printRow(1,1,0,1,1,0,0,$color,$pattern);
             printRow(1,1,0,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             break;
        case 'K':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(1,1,1,1,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,0,0,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'L':
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break; 
        case 'M':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,1,0,1,1,$color,$pattern);
             printRow(1,1,0,1,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'N':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,0,1,1,$color,$pattern);
             printRow(1,1,0,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,1,1,1,$color,$pattern);
             printRow(1,1,0,0,1,1,1,$color,$pattern);
             printRow(1,1,0,0,1,1,0,$color,$pattern);
            break;
        case 'O':
             printRow(0,1,1,1,1,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
            break;
        case 'P':
             printRow(1,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
            break;
        case 'Q':
             printRow(0,1,1,1,1,1,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,0,1,1,0,$color,$pattern);
            break;
        case 'R':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,1,1,1,0,$color,$pattern);
             printRow(1,1,0,0,1,1,0,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'S':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'T':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
            break;
        case 'U':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        case 'V':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
            break;
        case 'W':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,0,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,1,0,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,0,1,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'X':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,0,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,1,0,$color,$pattern);
             printRow(1,1,1,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
            break;
        case 'Y':
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(1,1,0,0,0,1,1,$color,$pattern);
             printRow(0,1,1,0,1,1,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,1,0,0,$color,$pattern);
            break;
        case 'Z':
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(0,0,0,0,1,1,0,$color,$pattern);
             printRow(0,0,0,1,1,0,0,$color,$pattern);
             printRow(0,0,1,1,0,0,0,$color,$pattern);
             printRow(0,1,1,0,0,0,0,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
             printRow(1,1,1,1,1,1,1,$color,$pattern);
            break;
        default:
            break;
        }//end of switch 
     echo"</td>";
}
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>
    <?php echo "<div>"; 
    drawWord( "hello", "red",1); 
    echo "</div>"; 
    echo "<div >"; 
    drawWord("what","blue",0);
    echo "</div>"; 
    echo "<div >"; 
    drawWord("Less789","red",2); 
    echo "</div>"; ?>
    <footer>
        <p>
            &copy; Copyright by Brandan Lockwood
        </p>
    </footer>
</body>

</html>