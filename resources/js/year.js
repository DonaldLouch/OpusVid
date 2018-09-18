/*
=====================================================================
	Donald Louch Portfolio | year.js
	v. 2.0 | April 6th, 2017
=====================================================================
*/

addEventListener("load", currYear); //When the page loads it will run the "currYear" function

/*
=====================================================================
	Year
=====================================================================
*/

function currYear(){
	var date = new Date(); // Looks at the current date
	var year = date.getFullYear(); // Looks at the current year via. the "date" data
document.getElementById("currentYear").innerHTML = year; //Looks for the ID "currentYear" and adds the the data from "year"
} //Adds the year to the footer on everypage

/*
=====================================================================
	@ 2013 - 2018 Donald Louch Producrions
=====================================================================
*/