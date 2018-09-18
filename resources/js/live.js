function autoRefresh(){
    $("#load").load("../scripts/php/reload.php");
}
setInterval(autoRefresh, 10000); // Every 10 seconds
autoRefresh(); // On load
	
/* Code adapted from https://stackoverflow.com/questions/35141442/reload-a-div-via-ajax-immediately-and-then-every-5-seconds */