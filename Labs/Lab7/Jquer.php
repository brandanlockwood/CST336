<?php 

function displayTable() { 

    if (isset($_GET['submitForm'])) {//CHECKS WHETHER THE FORM WAS SUBMITTED 

        $letterToFind = $_GET['letterToFind']; 
        $letterToOmit = $_GET['letterToOmit']; 
        $tableSize = $_GET['tableSize']; 

        echo "<h2>Find the Letter " . $letterToFind . "</h2>"; 
        //echo "<h2> Letter to Omit " . $letterToOmit . "</h2>"; 

        if ($letterToFind == $letterToOmit) { 
            echo "error, letter to find should not be the same"; 
            return; 
        } 

        $lettersArray = array(); 

        for ($i = 0; $i < $tableSize * $tableSize; $i++) { 

            do { 
                $randomLetter = chr(rand(65, 90)); 
            } while ($randomLetter == $letterToOmit || $randomLetter == $letterToFind); 

            $lettersArray[] = $randomLetter; 

        } 

        //Inserting the letter to find  
        $randomIndex = array_rand($lettersArray); 
        //random number from 0 to array size 
        $lettersArray[$randomIndex] = $letterToFind; 

        echo "<table border='1'>"; 
        $index = 0; 
        for ($i = 0; $i < $tableSize; $i++) { 
            echo "<tr>"; 
            for ($j = 0; $j < $tableSize; $j++) { 

                if ($lettersArray[$index] <= "G") { 
                    echo "<td style='color:red'>"; 
                } else if ($lettersArray[$index] <= "O") { 
                    echo "<td style='color:blue'>"; 
                } else { 
                    echo "<td style='color:green'>"; 
                } 
                //echo $lettersArray[$index++]; 
                if ($lettersArray[$index] == $letterToFind){ 
                     
                    //echo "<span id='letterToFind' onclick='youFoundIt()'>"  .$letterToFind  . "</span>"; 
                     
                    echo "<span id='letterToFind'>"  .$letterToFind  . "</span>"; 
                     
                } else { 
                         
                    echo $lettersArray[$index]; 
                     
                } 
                $index++; 
                 
                 
                echo "</td>"; 
            }//endFor columns 
            echo "</tr>"; 
        }//endFor rows 

        echo "</table>"; 

    } 

} 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8"> 
  <title>Lab 7</title> 
  <style> 
     #wrapper, table { margin:0 auto;  
                 text-align:center; 
                 width:800px 
                } 
       td { padding:20px} 
        
       #directions { 
            
               display: none;  /*hides elements*/ 
       } 
  </style> 
   
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> 
   
  <script type="text/javascript" src="js/JqueryFunc.js"></script> 
   
   
</head> 

<body> 
  <div id="wrapper"> 
    <h1> Find the Letter!</h1> 

    <form onsubmit="return formValidation()"> 
      Select a Letter to Find: 
      <select id="toFind" name="letterToFind"> 
       <?php 
         for ($i = 65; $i <= 90; $i++) { 
            echo "<option value=" . chr($i) . ">" . chr($i) . "   </option>"; 
         } 
        ?> 
       </select> 
       <br /> 
        
        Select Table Size: 
        <select name="tableSize"> 
            <option value="6">6x6</option> 
            <option value="7">7x7</option> 
            <option value="8">8x8</option> 
            <option value="9">9x9</option> 
            <option value="10">10x10</option> 
        </select> 
        <br/> 
        Select a Letter to Omit: 
        <select id="toOmit" name="letterToOmit"> 
        <?php 
        for ($i = 65; $i <= 89; $i++) { 
            echo "<option value=" . chr($i) . ">" . chr($i) . "   </option>"; 
        } 
        ?>  <option value="Z" selected>Z</option> 
        </select> 
        <br/> 
        <input type="submit" value="Create Table" name="submitForm" /> 
        <br /> <br /> 
        <a href="#" id="directionsLink"> Directions </a> 
         
    </form> 

    <h2 id="feedback"></h2>  
    <h3 id="timeTaken"></h3> 
  
     <div id="directions"> Directions: Select the letter you want to find.</div> 

    <?= displayTable() ?> 

</div> 

</div> 
<script>
    $("#letterToFind").click(function() {

    youFoundIt();


});


$("#directionsLink").click(function() {

    //$("#directions").css("display","block"); //displays content         

    $("#directions").slideToggle();
});
</script>

 


</body> 
</html> 