<?php 
session_start();




?>

<!DOCTYPE html>
<html>
   <html lang="en">
<head>
  <meta charset="utf-8">
        <title>Quiz </title>
        <h1><?php echo $_SESSION['username'];?></h1>
        <h2 id="grades"></h2>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
        var Nquiz;
        var Aquiz;
        var Lquiz;
        var dT;
        var total;
        function insertQuizData()
        {
         $.ajax({
		type : "POST",
		url : "submit.php",
		dataType : "json",
		//contentType : "application/form-data",
		data : {
			"username" : $("#student").val(),"method" : "INSERT", "numberOfQuizes" : Nquiz,
			"averageOfQuizes" : Aquiz, "lastQuizTaken" : Lquiz, "total" : total
		
		},
		success : function(data, status) {
		    $("#suc").html("quiz score recorded successfully");
          console.log("log quiz");
          console.log(data);
        
		},
		complete : function(data, status) {//optional, used for debugging purposes
		$("#suc").html("quiz score recorded successfully");
          console.log("log quiz");
          console.log(data);
        location.reload();
		}
		
	});  
	  
        }
         function getQuizData()
   {    
      // alert( $("#student").val());
       $.ajax({
		type : "get",
		url : "submit.php",
		dataType : "json",
		data : {
			"username" : $("#student").val(), "method" : "GetQuiz"
		
		},
		success : function(data, status) {
			//alert(data["city"]);
			Nquiz=data["Nquiz"];
			Aquiz=data["Aquiz"];
			Lquiz=data["Lquiz"];
		    dT=data["date"];
		    total=data["totalC"];
		     $("#date").html(data["date"]);
		     $("#Nquiz").html(data["Nquiz"]);
		      $("#Aquiz").html(data["Aquiz"]);
		       $("#Lquiz").html(data["Lquiz"]);
		        $("#slash").html("/");
		     $("#working").html(data["totalC"]);
	
          
		},
		complete : function(data, status) {//optional, used for debugging purposes
			
		}
	});
   }
   function correct(a1,a2,a3,a4,a5)
   {
          if (a1!=true)
        {
           $("answer1").html("answer is 5");
        }
        if(a2!="stack")
        {
          $("answer2").html("answer is a Stack");
        }
        if(a3!=true)
        {
              $("answer3").html("answer is true");
        }
       if(a4!=6)
       {
          $("answer4").html("answer is 6");
       }
       if(a5!="link")
       {
         $("answer5").html("answer is the image on the right");  
       }
   }
        function check()
        {
            var checker=true;
        
        if(document.getElementById("stackF").checked==false&&document.getElementById("stackT").checked==false)
        {
            checker=false;
            document.getElementById("e3").textContent="Error"
         document.getElementById("e3").style.color="red"
        }
         if(document.getElementById("stack").checked==false&&document.getElementById("linked").checked==false)
         {
              checker=false;
        document.getElementById("e5").textContent="Error"
         document.getElementById("e5").style.color="red"
         }
         if(document.getElementById("qu4").value=='')
         {
              checker=false;
          document.getElementById("e4").textContent="Error"
         document.getElementById("e4").style.color="red"
         }
    
     return checker;
        }
        
$(document).ready(function(){
  getQuizData();
    $("form").submit(function(){
       if(check())
       {
         var counter=0;
        var dt=new Date();
        var month=dt.getMonth();
        var day=dt.getDate();
        var student=document.getElementById("student").value;
       var a1=document.getElementById("answer").checked;
        var a2=document.getElementById("qu2").value ;
        var a3=document.getElementById("stackT").checked; 
        var a4=document.getElementById("qu4").value;
        var a5=document.getElementById("linked").value;
        //var Nquiz=document.getElementByid("Nquiz").value;
        if(day<9)
        {
            day =("0"+dt.getDate()).slice(-2);
        }
        if(month<8)
        {
            month=("0"+dt.getMonth()+1).slice(-2);
        }
        var insert =(dt.getFullYear()+"-"+month+"-"+day+" "+dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds())
        var counter=0;
        if (a1==true)
        {
            counter++;
        }
        if(a2=="stack")
        {
        counter++;
        }
        if(a3==true)
        {
            counter++;
        }
       if(a4==6)
       {
           counter++;
       }
       if(a5=="link")
       {
         counter++;  
       }
      $('html').animate({scrollTop:0}, 1);
    $('body').animate({scrollTop:0}, 1);
       Nquiz=parseInt(Nquiz)+1;
       Lquiz=counter;
        total=Nquiz*5;
       Aquiz=parseInt(Aquiz)+counter;
       insertQuizData();
       }
       
    });
});


        </script>
        
        <form onsubmit="return false">
           <span id="date"></span> 
           <br>
           <p>number of Quizzes </p><span id="Nquiz"></span>
            <p>Average of Quizzes </p><span id="Aquiz"></span><span id="slash"></span><span id="working"></span>
            <p>Last Quiz score </p><span id="Lquiz"></span>
           <span id="suc"></span>
            <input id="student" type="hidden" value="<?php echo $_SESSION['username'];?>">
<div id ="q1">
    <p>What is the size of the array arr[5]?</p><span id="answer1"></span>
      <input id="qu1" type="radio" name="array" value="4" checked> 4<br>
    <input id="answer" type="radio" name="array" value="5"> 5<br>
     <input id ="qu1"type="radio" name="array" value="6">6 
</div>
<div id="q2"> 
<img src="img/images.png">
<p>In the image above reperesents what data structure? </p></p>
 <select id="qu2" name="dataS"><span id="answer2"></span>
  <option value="stack">Stack</option>
  <option value="linkedlist">Linked List</option>
  <option value="list">list</option>
  <option value="queue">Queue</option>
</select>
</div>
<div id="q3">
  <img src="img/index.png">
  <p>Is this a Stack?</p><span id="e3"></span><span id="answer3"></span>
  <input id="stackT" name ="option" type="checkbox" value="true" >True</button>
  <input id="stackF" name = "option" type="checkbox" value="false">False</button>
</div>
<div id="q4">
    <p>b=4;</p>
     <p>t=6;</p>
     <p>b=t;</p>
    <p>What is the value of b?</p><span id="e4"></span><span id="answer4"></span>
     <textarea id="qu4" name="message"  cols="10">
</textarea>
</div>
<div id="t5">
<p>Which is linked List?</p><span id="e5"></span><span id="answer5"></span><br>
<input id="stack" class="question5" name="q5" type="checkbox" value="stack" width="200" height="200">
<img src="img/images.png">
<input id="linked" class="question5" name="q5" type="checkbox" value="link" width=200 height="200">
<img src="img/linked.png">
</div>
<input id="time" type="hidden" name="time">
<input type="submit" value="submit" >
<input type="reset"  value="reset">
</form>
    </body>
</html>