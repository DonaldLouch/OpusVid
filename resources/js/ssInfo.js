function autoRefresh(){
	$("#ssDL").load("../scripts/php/ssInfo/ssDL.php");
	$("#ssDLPh").load("../scripts/php/ssInfo/ssDLPh.php");
	$("#ssTP").load("../scripts/php/ssInfo/ssTP.php");
	$("#ssTL").load("../scripts/php/ssInfo/ssTL.php");
	$("#ssDLP").load("../scripts/php/ssInfo/ssDLP.php");
	$("#ssDLS").load("../scripts/php/ssInfo/ssDLS.php");
	$("#ssDLW").load("../scripts/php/ssInfo/ssDLW.php");
	$("#ssDLPo").load("../scripts/php/ssInfo/ssDLPo.php");
	$("#ssDLV").load("../scripts/php/ssInfo/ssDLV.php");
	$("#ssDLF").load("../scripts/php/ssInfo/ssDLF.php");
}
setInterval(autoRefresh, 18000000);  // Every 5 Hours
autoRefresh(); // On load

				
/* Code adapted from https://stackoverflow.com/questions/35141442/reload-a-div-via-ajax-immediately-and-then-every-5-seconds */