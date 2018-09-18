/*
=====================================================================
	Donald Louch Portfolio | template.js
	v. 2.0 | April 6th, 2017
=====================================================================
*/

/*
=====================================================================
	Year
=====================================================================
*/

addEventListener("load", currYear); //When the page loads it will run the "currYear" function

function currYear(){
	var date = new Date(); // Looks at the current date
	var year = date.getFullYear(); // Looks at the current year via. the "date" data
document.getElementById("currentYear").innerHTML = year; //Looks for the ID "currentYear" and adds the the data from "year"
} //Adds the year to the footer on everypage

/*
=====================================================================
	@ 2016 - 2017 Donald Louch Producrions
=====================================================================
*/