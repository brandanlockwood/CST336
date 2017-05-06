function getCountyList() {        
   var stateSelected = document.getElementById("state").value; 
   var url = "http://hosting.csumb.edu/laramiguel/ajax/countyList.php?state="; 
  
   var ajax;
    if (window.XMLHttpRequest) {
         ajax= new XMLHttpRequest();
     }
 
   ajax.open("GET", url + stateSelected, true);
   ajax.send();
                
    ajax.onreadystatechange=function() {
          if (ajax.readyState==4 && ajax.status==200) {
                //alert(ajax.responseText);  //displays value retrieved from PHP program

var data = JSON.parse(ajax.responseText);
var countySelected = document.getElementById("county");
countySelected.innerHTML="<option> Select One </option>";
               
for (var i=0; i< data['counties'].length; i++) {
    countySelected.innerHTML += "<option>" + data["counties"][i].county + "</option>";
  }//endFor
 
           }//endIf 
      } 
  
} //end Function
  
  
