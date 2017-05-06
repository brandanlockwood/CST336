<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1><?=" TMNT Store " ?></h1>
     <?php
    $pageName ="Home: ";
    include 'header.php'
      ?>
      <?php
      for($i=0;$i<10;$i++)
      {
          jackUpPricing(rand(20,30),rand(45,80));
          echo "</br>";
          echo "</br>";
      }
     
       function jackUpPricing($vatLevel2,$vatLevel3)
       {
             
      $productName = "Raphael Costume";
      $productPrice = rand(1,100) + rand(0,99)/100;
      $taxAmount =$productPrice * $taxRate;
      $taxRate1 = 0.0825;
      $taxRate2 = 0.900;
      $taxRate3 = 2.0000;
     
      
      $totalPrice = $productPrice * (1 + $taxRate1);
      
     $format = number_format($totalPrice, 2);
      number_format($taxAmount,2);
      
      $taxRate=0;
      
      echo "<div> \"$productName\" </div>";
      echo "<div> $$productPrice </div>";
      echo "<div> ".  $productPrice * $taxRate1 ."  </div>";
      echo "<div> ". $format ."</div>";
      if( $productPrice >= $vatLevel3)
      {
          $taxRate = $taxRate3;
      }
      else if( $productPrice >= $vatLevel2)
      {
          $taxRate = $taxRate2;
      }
      else{
          $taxRate = $taxRate1;
          
      }
      echo "<div> Tax Rate: $$taxRate </div>";
      echo "<div> Tax: $" .number_format($productPrice * $taxRate,2). " </div>";
      echo "<div> Total : $" .number_format($productPrice * (1 + $taxRate)). "</div>";
       }
       ?>
    </body>
</html>