<!DOCTYPE html>
<html>
<head>
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../css/main.css">
  <meta charset="utf-8">
  <title>Zip Code</title>
</head>
<body>
  
  <form>
    <span>Zip:</span>
    <input type="text" id="lookupText" value="93923" />
    <a class="go-button" href="#">Go</a>
  </form>
  <div class="results">
  </div>
  <script>
      $('.go-button').button().click(function() {
     var lookupText = $('#lookupText').val();

console.log('lookup text: ' + lookupText);
      
   var callUrl = 'http://hosting.otterlabs.org/laramiguel/ajax/zip.php?zip_code=' + lookupText;
   
   console.log(callUrl);
   
      $.ajax({ url: callUrl, 
               dataType: 'json', 
               type:'GET',
               success: function(data) {
                 console.log('successful');
                 console.log(data);
                 
                 
                 // REALLY IMPORTANT EXAMPLE RIGHT HERE:
                 var newHeader = $('<h2></h2>');
                 newHeader.html(data.city);
                 $('div.results').append(newHeader);
               }, 
               error: function() {
                 console.log('problem');
               },
              complete: function() {
                 console.log('done');
              }
      });
   
   console.log('done running script');
    });

  </script>
</body>
</html>