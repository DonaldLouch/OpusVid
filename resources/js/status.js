function autoRefresh(){
	$("#statusAlert").load("../scripts/php/status.php");
}
/* setInterval(autoRefresh, 10000);  */// Every 10 seconds
autoRefresh(); // On load

/*
var staccordion = document.getElementsByClassName("statAccordion"); // Get's all elements with the tag "accordion"

for (var i = 0; i < staccordion.length; i++) {
    staccordion[i].onclick = function(){ // Adds "onclick" to all elements found in the variable "accordion"
        this.classList.toggle("active"); // When section is clicked it will toggle the panel as active OR inactive

        var statusPanel = this.nextElementSibling;
        if (statusPanel.style.display === "block") {
            statusPanel.style.display = "none"; // When toogled off, content is not showing
            console.log("Not Toggled");
        } else {
            statusPanel.style.display = "block"; //When toogled on, content is displayed as a block element
            console.log("You Toggled The Section!");
        }
    }
}
*/

function showStatAccordion() {
    var x = document.getElementById("statusPanel");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
				
/* Code adapted from https://stackoverflow.com/questions/35141442/reload-a-div-via-ajax-immediately-and-then-every-5-seconds */