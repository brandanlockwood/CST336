<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>signup</title>
  <meta name="description" content="">
  <meta name="author" content="lara4594">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
 <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  
  <script>
  
           
      function getCity(){
          
          //alert($("#zipCode").val());
          
      $.ajax({
            type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
            dataType: "json",
            data: { "zip_code":$("#zipCode").val()},
            success: function(data,status) {
                 //alert(data['city']);
                 $("#city").html(data['city']);
                 $("#latitude").html(data['latitude']);
                 $("#longitude").html(data['longitude']);
              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
         }); //end Ajax          
          
          
          
      } //endFunction
      
     function getCounty(){
             
             //alert($("#state").val());
             
         $.ajax({
            type: "GET",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
            dataType: "json",
            data: { "state":$("#state").val() },
            success: function(data,status) {
                 //alert(data['counties'][0].county);
                 
                 $("#county").html("<option> - Select One - </option>");
                 
                 for (var i=0; i < data['counties'].length;  i++) {
                     
                     $("#county").append("<option>" + data['counties'][i].county + "</option>");
                     
                 }
                 
                 
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
              }
         });

             
     } //endFunction
      
      function checkPassword()
      {
          if($('#password').val().length < 8){
              $('#passwordError').html("The password must be longer than 8 characters!");
               $('#passwordError').css('color','red');
              return;
          }
          
          if ( !/[0-9]/.test($('#password').val()) ) {
              $('#passwordError').html("The password must have one digit!");
              $('#passwordError').css('color','red');
              return;
          }
          
          if ( !/[A-Z]/.test($('#password').val()) ) {
              $('#passwordError').html("The password must have one uppercase character!");
               $('#passwordError').css('color','red');
              return;
          }          
          
      }
      function checkEmail()
      {
          if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test($('#email').val())){
              $('#emailError').html("Not correct email format!");
              $('#emailError').css('color','red');
              return; 
          }
          
      }
      function checkPhone()
      {
          if(!/\d{3}-\d{3}-\d{4}|\d{10}/.test($('#phone').val()))
          {
              $('#phoneError').html("Phone number incorrect!");
               $('#phoneError').css('color','red');
              return;
          }
      }
      function checkUsername()
      {
          //alert($('#username').val());
          
          if($('#username').val().length < 5){
              
              $('#usernameError').html("Username must be longer than 5 characters!");
              $('#usernameError').css('color','red');
              return;
              
          }
          
          
         $.ajax({
            type: "GET",
            url: "http://hosting.otterlabs.org/laramiguel/cst336/labs/lab8/verifyUsername.php",
            dataType: "json",
            data: {"username" : $('#username').val() },
            success: function(data,status) {
                
                if (data['available'] == "false") {
                
                   $('#usernameError').html("NOT available");    
                   $('#usernameError').css("color","red");
                   $('#username').css("backgroundColor","red");
                    $('#username').focus();
                    
                } else {
                    
                   $('#usernameError').html("Available!");
                   $('#usernameError').css("color","green");
                   $('#username').css("backgroundColor","");
                    
                }
                
                 
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
              }
         });          
          
          
      }
      
    $( document ).ready(function() {
      //console.log( "ready!" );
       
        $("#zipCode").change(function(){getCity()});
        $("#state").change(function(){getCounty()});
        $("#username").change(function(){checkUsername()});
        $("#password").change(function(){checkPassword()});
        $("#email").change(function(){checkEmail()});
        $("#phone").change(function(){checkPhone()});
     });
      
      
  </script>
</head>

<body>
  <div>

    <div>
      <form>
          <fieldset>
              <legend>Sign Up</legend>
            First Name: <input type="text" name="firstName"><br />
            Last name:<input type="text" name="lastName" id="lastName"> <br />
            Email:<input type="text" name="email" id="email"><span id="emailError"></span><br /><br />
         Zip Code:<input type="text" name="zipCode" id="zipCode"><br /><br />    
         City: <span id="city"></span> <br />
         Latitude: <span id="latitude"></span><br />
         Longitude: <span id="longitude"></span><br />
         State: <input type="text" name="state" id="state">Use the two letter abbr.<br>
         County: <select name="county" id="county">
                 <option>- Select One -</option>    
                 </select><br>
        Username: <input type="text" name="username" id="username"><span id="usernameError"></span><br />
        Password: <input type="password" name="password" id="password" /><span id="passwordError"></span> <br />
        Type Password Again: <input type="password" name="rePassword" id="rePassword" /> <br />
        Phone Number: <input type="text" name="phone" id="phone" /><span id="phoneError"> </span><br/>
        <input type="submit" value="Sign up!" />

          </fieldset>
          
      </form>
    </div>

    <footer>
     <p>&copy; Copyright  by Brandan Lockwood</p>
    </footer>
  </div>



</body>
