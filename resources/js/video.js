/*
=====================================================================
	Donald Louch Portfolio | video.js
	v. 2.0 | April 6th, 2017
=====================================================================
*/

console.log('video.js Working');

/*
=====================================================================
	Video Player
=====================================================================


console.log('video.js Working');

//Settup

var video = document.querySelector("video");
video.controls = ""; // Hide the browser's default controls
	var tracks = [
	"../media/videos/PechaKuchaDonald.mp4",
	"../media/videos/2017DonaldLouchIntro720.mp4",
	"../media/videos/2017DonaldLouchIntro.mp4"
	]; //Video Sources

var current =  0; // Finds what arry number the current video is playing
video.src = tracks[current]; // Outputs the video source

//When The Current Track Finishes

video.addEventListener("ended", next);// Once the video has ended the "next" function will fire
function next(){
	if (current==tracks.length-1){
		current = 0; //Looks ar the length of the array and that sets the starting point at 0
	} else {
	current ++; //Everytime the video is done one incerment gets added
	console.log("You next video is playing");
	}
	video.src = tracks [current]; //Takes the new incerment in effect
	video.play(); //Plays the new video
}

//Previous Video Button
var prevbtn = document.createElement("button"); // Adds new button to the DOM
prevbtn.className = "prevBTN"; // Adds the classname "prevBTN"
prevbtn.style.backgroundImage = "url(../../media/videoUI/previousVideoButton.png)"; // Image of the button
prevbtn.title = "Click to play the previous video"; // Adds a title to the button in the DOM (Semantic)
prevbtn.addEventListener("click", prev);  // Once the button has been clicked it will fire the "prev" function
function prev(){
	if (current===0){
	current=tracks.length-1;
	} else {
	current--; //Everytime the button is clicked one incerment gets taken away from the "tracks" array
	}
	video.src = tracks [current]; //Takes the new incerment in effect
	video.play(); //Plays the new video
	console.log("Previous Video");
}
document.getElementById("vidCon").appendChild(prevbtn); // Adds the DOM content to HTML; Very forgetable to add in code ;)

//Play/Pause Button

var playbtn = document.createElement("button"); // Adds new button to the DOM
playbtn.style.backgroundImage = "url(../../media/videoUI/playButton.png)"; // Initial image of the button
playbtn.className = "playBTN"; // Adds the classname "playBTN"
playbtn.title = "Click to play the video"; // Adds a title to the button in the DOM (Semantic)
playbtn.addEventListener("click", playclick); // Once the button has been clicked it will fire the "playclick" function
function playclick(){
	if (video.paused) {
		video.play(); // Starts off with "Play" and will start the video
		playbtn.style.background = "url(../../media/videoUI/pauseButton.png)"; // Chaanges the button to the "pause" image
		console.log("You played the video");
		}else{
		video.pause(); // Once button is clicked it will pause the video
		playbtn.style.background = "url(../../media/videoUI/playButton.png)"; // Changes the button to the "play" image
		console.log("You paused the video");
		}
}
document.getElementById("vidCon").appendChild(playbtn); // Adds the DOM content to HTML

//Next Video Button

var nextbtn = document.createElement("button"); // Adds new button to the DOM
nextbtn.className = "nextBTN"; // Adds the classname "nextBTN"
nextbtn.style.backgroundImage = "url(../../media/videoUI/nextVideoButton.png)"; // Image of the button
nextbtn.title = "Click to play the next video"; // Adds a title to the button in the DOM (Semantic)
nextbtn.addEventListener("click", next);  // Once the button has been clicked it will fire the "next" function;
document.getElementById("vidCon").appendChild(nextbtn); // Adds the DOM content to HTML

//Slider

var seekBar = document.createElement("input"); //Adds new input slider to the DOM
seekBar.className = "slider"; // Adds the classaname "slider"
seekBar.title = "Seekbar"; //Adds a title to the button in the DOM (Semantic)
seekBar.type = "range"; //The type of the input is "range"
seekBar.min = "0"; // The starting point is 0
seekBar.max = "100"; // The ending point is 0
seekBar.value = "0"; //You start at the slider at 0
seekBar.steps = "1"; // Add one step
seekBar.addEventListener("change", vidSeek);  // Once you slide it will fire the "videoSeek" function
function vidSeek(){
	var seekto = video.duration * (seekBar.value / 100); // Looks at the giving value of the slider vs. the duration on the video
	video.currentTime = seekto; // Seeks the video to givin length
}
document.getElementById("vidCon").appendChild(seekBar); // Adds the DOM content to HTML

//Display: Counter Infomation

var counter = document.createElement("p"); //Adds new button to the DOM
counter.className = "timeCode"; //Adds the classname "timeCode"
counter.innerHTML = "0:00 / 0:00"; //Inital text
counter.title = "Gives you the current time vs. the duration of the video"; //Adds a title to the text in the DOM (Semantic)
video.addEventListener("timeupdate",currentT); // Always updating the time to display later
function currentT(){
	var n = video.currentTime * (100 / video.duration); // Looks at the updated time vs. the duration
	seekBar.value = n; // Takes the time of the seekbar into effect
	var curmins = Math.floor(video.currentTime / 60); // Divides the current time in 60 (to get the minutes)
	var cursecs = Math.floor(video.currentTime - curmins * 60); // Takes the current time from "curmins" and deletes 60 to get the seconds
	var durmins = Math.floor(video.duration / 60); // Divides the duration time in 60 (to get the minutes)
	var dursecs = Math.floor(video.duration - durmins * 60); // Takes the durration time from "durmins" and deletes 60 to get the seconds
	if(cursecs < 10){
		cursecs = "0"+cursecs;  //If less than 10 seconds an extra "0" will be added to the begining
	}
	if(dursecs < 10){
		dursecs = "0"+dursecs; //If less than 10 seconds an extra "0" will be added to the begining
	}
	counter.innerHTML =  curmins+":"+cursecs+" / "+durmins+":"+dursecs; // Adds the content of current time / duration
}
document.getElementById("vidCon").appendChild(counter); // Adds the DOM content to HTML; Very forgetable to add in code ;)

//Mute/Unmute Button

var mutebtn = document.createElement("button"); //Adds new button to the DOM
mutebtn.className = "muteBTN"; // Adds the classname "muteBTN"
mutebtn.style.backgroundImage = "url(../../media/videoUI/muteButton.png)"; //Initial iamge of the button
mutebtn.title = "Click to mute the audio"; //Adds a title to the button in the DOM (Semantic)
mutebtn.addEventListener("click", videoMute);  // Once the button has been clicked it will fire the "videoMute" function
function videoMute(){
if(video.muted){
	video.muted = false; // Video audio is NOT muted
	mutebtn.style.backgroundImage = "url(../../media/videoUI/muteButton.png)"; // Changes the button to the "mute" image
	console.log("You unmuted the video");
} else {
	video.muted = true; // Video audio IS muted
	mutebtn.style.backgroundImage = "url(../../media/videoUI/unmuteButton.png)"; // Changes the button to the "unmute" image
	console.log("You muted the video");
}
}
document.getElementById("vidCon").appendChild(mutebtn); // Adds the DOM content to HTML; Very forgetable to add in code ;)

var fullbtn = document.createElement("button"); //Adds new button to the DOM
fullbtn.className = "fullBTN"; // Adds the classname "fullBTN"
fullbtn.style.backgroundImage = "url(../../media/videoUI/fullscreenButton.png)"; //Image of the button
fullbtn.title = "Click to make the video fullscreen"; //Adds a title to the button in the DOM (Semantic)
fullbtn.addEventListener("click", toggleFullScreen);  // Once the button has been clicked it will fire the "fullScreen" function
function toggleFullScreen(){
	if(video.requestFullScreen){
		video.requestFullScreen(); // Enables fullscreen
		console.log("You played the video in fullscreen");
	} else if(video.webkitRequestFullScreen){
		video.webkitRequestFullScreen(); // Enables fullscreen on Safari, IE, Chrome and other webkit browsers
		console.log("You played the video in fullscreen");
	} else if(video.mozRequestFullScreen){
		video.mozRequestFullScreen(); // Enables fullscreen on Firefox and other moz browsers
		console.log("You played the video in fullscreen");
	}
}
document.getElementById("vidCon").appendChild(fullbtn); // Adds the DOM content to HTML; Very forgetable to add in code ;)

/*
=====================================================================
	@ 2016 - 2017 Donald Louch Producrions
=====================================================================
*/
