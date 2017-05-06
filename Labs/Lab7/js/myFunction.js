function backC(Element) {

    Element.style.backgroundColor = "yellow";

}
var d = new Date();
var startTime = d.getTime(); //gets the time in miliseconds


function youFoundIt() {
    d = new Date();
    var endTime = d.getTime();
    var timeTaken = (endTime - startTime) / 1000;
    //alert("Congrats! You found it!");
    if (timeTaken < 30) {
        document.getElementById("feedback").innerHTML = "Awesome!!! You found it!";
        document.getElementById("feedback").style.color = "green";
    }
    else if (timeTaken < 60) {
        document.getElementById("feedback").innerHTML = "Good job";
        document.getElementById("feedback").style.color = "orange";
    }
    else {
        document.getElementById("feedback").innerHTML = "Not so good";
        document.getElementById("feedback").style.color = "red";
    }
    document.getElementById("letterToFind").style.backgroundColor = "yellow";



    //alert("Time taken: " + timeTaken + " seconds");
    document.getElementById("timeTaken").innerHTML = "You took " + timeTaken + " seconds.";




}
