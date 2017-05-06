var d = new Date();
var startTime = d.getTime(); //gets the time in miliseconds 


function youFoundIt() {
    //alert("Congrats! You found it!"); 
    d = new Date();
    var endTime = d.getTime();
    var timeTaken = (endTime - startTime) / 1000;
    if (timeTaken < 30) {
        //document.getElementById("feedback").innerHTML = "Awesome!!! You found it!"; 
        $("#feedback").html("Awesome!!! You found it!");

        //document.getElementById("feedback").style.color = "green"; 
        $("#feedback").css("color", "green");
    }
    else if (timeTaken < 60) {

        $("#feedback").html("Nice!");
        $("#feedback").css("color", "orange");
    }
    else {
        $("#feedback").html("Not so good!");
        $("#feedback").css("color", "red");
    }
    //document.getElementById("letterToFind").style.backgroundColor = "yellow"; 
    $("#letterToFind").css("backgroundColor", "yellow");
    $("#letterToFind").parent().css("backgroundColor", "yellow");




    //alert("Time taken: " + timeTaken + " seconds"); 
    //document.getElementById("timeTaken").innerHTML  = "You took " + timeTaken + " seconds."; 
    $("#timeTaken").html($("#timeTaken").html() + "You took " + timeTaken + " seconds.");




}

function clickD() {
    $(document).ready(function() {
        $("button").click(function() {
            $("p").slideToggle();
        });
    });
}

function formValidation() {

    //check whether letterToFind == letterToOmit 
    if ($("#toFind").val() == $("#toOmit").val()) {
        //alert("Letters must be different!"); 
        $("#feedback").html("Letters must be different!");
        $("#feedback").css("color", "red");

        return false;
    }

}


