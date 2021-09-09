/*
=====================================================================
	OpusVid | video.js
		v. 1.0
=====================================================================
*/

console.log("video.js Working | Vector");

/*
=====================================================================
	Video Player
=====================================================================
*/

//Settup
var video = document.querySelector("video");
video.controls = ""; // Hide the browser's default controls

var fullNavBar = document.getElementById("vidCon");

//var vectorPath = "<?php echo $baseFileURL;?>" ;
//+ "/ui/";

var playerButtons = document.createElement("div"); //Adds new div to the DOM
playerButtons.className = "playerButtons";

var divSeek = document.createElement("div"); //Adds new div to the DOM
divSeek.className = "divSeek";
//Slider
var seekBar = document.createElement("input"); //Adds new input slider to the DOM
seekBar.className = "slider"; // Adds the classaname "slider"
seekBar.title = "Seekbar"; //Adds a title to the button in the DOM (Semantic)
seekBar.type = "range"; //The type of the input is "range"
seekBar.min = "0"; // The starting point is 0
seekBar.max = "100"; // The ending point is 0
seekBar.value = "0"; //You start at the slider at 0
seekBar.steps = "1"; // Add one step
seekBar.addEventListener("change", vidSeek); // Once you slide it will fire the "videoSeek" function
function vidSeek() {
  var seekto = video.duration * (seekBar.value / 100); // Looks at the giving value of the slider vs. the duration on the video
  video.currentTime = seekto; // Seeks the video to givin length
}

//Progress Bar
var progressBar = document.createElement("div"); //Adds new div to the DOM
progressBar.className = "progressBar"; // Adds the classaname "progressBar"
var progressUpdate = document.createElement("div"); //Adds new div to the DOM
progressUpdate.className = "progressUpdate"; // Adds the classaname "progressUpdate"
divSeek.appendChild(seekBar); //Adds the "slider" to "divSeek"
progressBar.appendChild(progressUpdate); //Adds the "counter" to "divSeek"
//divSeek.appendChild(progressBar); //Adds the "counter" to "divSeek"
document.getElementById("vidCon").appendChild(progressBar); // Adds the DOM content to HTML
playerButtons.appendChild(divSeek)



//Skip Back Mode Button
var skipBackBTNLink = document.createElement("a"); //Adds new anchor to the DOM
skipBackBTNLink.setAttribute("onclick", "skipBack()");

var skipBackBTNImage = document.createElement("object"); //Adds new object to the DOM
skipBackBTNImage.type = "image/svg+xml";
skipBackBTNImage.data = vectorPath + "skipBackButton.svg";
skipBackBTNImage.className = "skipBackBTN"; //Adds the classname to the element

function skipBack() {
  video.currentTime -= 10;
}
skipBackBTNLink.appendChild(skipBackBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(skipBackBTNLink); //Adds the "slider" to "divSeek"

//Play/Pause Button
var playBTNLink = document.createElement("a"); //Adds new anchor to the DOM
playBTNLink.setAttribute("onclick", "playClick()");

var playBTNImage = document.createElement("object"); //Adds new object to the DOM
playBTNImage.type = "image/svg+xml";
playBTNImage.data = vectorPath + "playButton.svg";
playBTNImage.fill = "red";
playBTNImage.className = "playBTN"; //Adds the classname to the element

function playClick() {
  if (video.paused) {
    video.play(); // Starts off with "Play" and will start the video
    playBTNImage.data = vectorPath + "pauseButton.svg"; // Changes the button to the "pause" image
    console.log("You played the video");
  } else {
    video.pause(); // Once button is clicked it will pause the video
    playBTNImage.data = vectorPath + "playButton.svg"; // Changes the button to the "play" image
    console.log("You paused the video");
  }
}

video.addEventListener("click", playClick);

playBTNLink.appendChild(playBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(playBTNLink); //Adds the "slider" to "divSeek"

//Skip Forward Mode Button
var skipForwardBTNLink = document.createElement("a"); //Adds new anchor to the DOM
skipForwardBTNLink.setAttribute("onclick", "skipForward()");

var skipForwardBTNImage = document.createElement("object"); //Adds new object to the DOM
skipForwardBTNImage.type = "image/svg+xml";
skipForwardBTNImage.data = vectorPath + "skipForwardButton.svg";
skipForwardBTNImage.className = "skipForwardBTN"; //Adds the classname to the element

function skipForward() {
  video.currentTime += 10;
}
skipForwardBTNLink.appendChild(skipForwardBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(skipForwardBTNLink); //Adds the "slider" to "divSeek"

//Display: Counter Infomation
var counter = document.createElement("p"); //Adds new button to the DOM
counter.className = "timeCode fullTimeCode"; //Adds the classname "timeCode"
counter.innerHTML = "0:00 / 0:00"; //Inital text
counter.title = "Gives you the current time vs. the duration of the video"; //Adds a title to the text in the DOM (Semantic)
video.addEventListener("timeupdate", currentT); // Always updating the time to display later

var counterMobile = document.createElement("p"); //Adds new button to the DOM
counterMobile.className = "timeCode mobileTimeCode"; //Adds the classname "timeCode"
counterMobile.innerHTML = "0:00"; //Inital text
counterMobile.title = "Gives you the current time vs. the duration of the video"; //Adds a title to the text in the DOM (Semantic)

function currentT() {
  var n = video.currentTime * (100 / video.duration); // Looks at the updated time vs. the duration
  seekBar.value = n; // Takes the time of the seekbar into effect
  var curmins = Math.floor(video.currentTime / 60); // Divides the current time in 60 (to get the minutes)
  var cursecs = Math.floor(video.currentTime - curmins * 60); // Takes the current time from "curmins" and deletes 60 to get the seconds
  var durmins = Math.floor(video.duration / 60); // Divides the duration time in 60 (to get the minutes)
  var dursecs = Math.floor(video.duration - durmins * 60); // Takes the durration time from "durmins" and deletes 60 to get the seconds

  var timeLeftMinutes = durmins - curmins;
  var timeLeftSeconds = dursecs - Math.floor(cursecs + 1);

  if (cursecs < 10) {
    cursecs = "0" + cursecs; //If less than 10 seconds an extra "0" will be added to the begining
  }
  if (dursecs < 10) {
    dursecs = "0" + dursecs; //If less than 10 seconds an extra "0" will be added to the begining
  }
  counter.innerHTML = curmins + ":" + cursecs + " / " + durmins + ":" + dursecs; // Adds the content of current time / duration
  
if (timeLeftSeconds <= -1 ) {
    timeLeftSeconds = Math.floor(dursecs + 60) - cursecs;
}

if (timeLeftSeconds < 10 && timeLeftSeconds >= 0) {
  timeLeftSeconds = "0" + timeLeftSeconds; //If less than 10 seconds an extra "0" will be added to the begining
}

 console.log(timeLeftSeconds);
  counterMobile.innerHTML = timeLeftMinutes + ":" + timeLeftSeconds; // Adds the content of current time / duration

  var percent = (video.currentTime / video.duration) * 100;
  console.log(percent);
  progressUpdate.style.flexBasis = percent + "%";
}

playerButtons.appendChild(counter); //Adds the "slider" to "divSeek"
playerButtons.appendChild(counterMobile); //Adds the "slider" to "divSeek"

//Mute/Unmute Button
var muteBTNLink = document.createElement("a"); //Adds new anchor to the DOM
muteBTNLink.setAttribute("onclick", "videoMute()");

var muteBTNImage = document.createElement("object"); //Adds new object to the DOM
muteBTNImage.type = "image/svg+xml";
muteBTNImage.data = vectorPath + "muteButton.svg";
muteBTNImage.className = "muteBTN"; //Adds the classname to the element

function videoMute() {
  if (video.muted) {
    video.muted = false; // Video audio is NOT muted
    muteBTNImage.data = vectorPath + "muteButton.svg"; // Changes the button to the "mute" image
    console.log("You unmuted the video");
  } else {
    video.muted = true; // Video audio IS muted
    muteBTNImage.data = vectorPath + "unmuteButton.svg"; // Changes the button to the "unmute" image
    console.log("You muted the video");
  }
}

//Popup volume slider

muteBTNLink.appendChild(muteBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(muteBTNLink); //Adds the "slider" to "divSeek"

/* 
FEATURE COMING LATER!
//More Button
	var moreBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	//moreBTNLink.setAttribute('onclick', 'moreThings()');
	moreBTNLink.href = "openMoreOptions";
		var moreBTNImage = document.createElement("object"); //Adds new object to the DOM
		moreBTNImage.type = "image/svg+xml";
		moreBTNImage.data = vectorPath + "moreButton.svg";
		moreBTNImage.className = "moreBTN"; //Adds the classname to the element

		function moreThings() {
			//video.playbackRate = value;
			/*if (video.muted) {
				video.muted = false; // Video audio is NOT muted
				muteBTNImage.src = vectorPath + "muteButton.svg"; // Changes the button to the "mute" image
				console.log("You unmuted the video");
			} else {
				video.muted = true; // Video audio IS muted
				muteBTNImage.src = vectorPath + "unmuteButton.svg"; // Changes the button to the "unmute" image
				console.log("You muted the video");
			}
			//CREATE FUNCTION
			//Playback Rate?
		}
moreBTNLink.appendChild(moreBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(moreBTNLink); //Adds the "slider" to "divSeek" */

const playerWrap = document.querySelector(".playerWrap");
const homeButton = document.querySelector("#videoHomeButton");
const videoPlayerWrap = document.querySelector("#videoPlayerWrap");
const theVideoWrap = document.querySelector("#vidVidWrap");
const vidTitle = document.querySelector("#videoTitle");
const innerContainer = document.querySelector(".inner-container");
const vidInfoWrap = document.querySelector(".videoInformation");
const videoChapCom = document.querySelector("#chapters");
const vidDescription = document.querySelector("#description");
const theFooter = document.querySelector("footer");
const theHeader = document.querySelector("#vidHeader");

//Theater Button
var theaterBTNLink = document.createElement("a"); //Adds new anchor to the DOM
theaterBTNLink.setAttribute("onclick", "enterTheaterMode()");

var theaterBTNImage = document.createElement("object"); //Adds new object to the DOM
theaterBTNImage.type = "image/svg+xml";
theaterBTNImage.data = vectorPath + "theaterButton.svg";
theaterBTNImage.className = "theaterBTN"; //Adds the classname to the element

function enterTheaterMode() {
  console.log("You played the video in theater mode");
  theaterBTNImage.data = vectorPath + "exitTheaterButton.svg"; // Changes the button to the "pause" image
  theaterBTNLink.setAttribute("onclick", "exitTheaterMode()");

  videoPlayerWrap.className = "videoPlayerWrap theater";
  theVideoWrap.className = "theVideoWrap outer-container theater";
  vidTitle.className = "theater";
  vidDescription.className = "theaterDescription";

  homeButton.className = "vidPlayer hidden";
  vidInfoWrap.className = "vidPlayer hidden";
  videoChapCom.className = "vidPlayer hidden";
  //theFooter.className = "vidPlayer hidden";
  theHeader.className = "vidPlayer hidden";
  //wrapPlayer.className = "vidPlayer hidden";
}

function exitTheaterMode() {
  console.log("You have exited theater mode");
  theaterBTNImage.data = vectorPath + "theaterButton.svg"; // Changes the button to the "pause" image
  theaterBTNLink.setAttribute("onclick", "enterTheaterMode()");

  videoPlayerWrap.className = "videoPlayerWrap";
  theVideoWrap.className = "theVideoWrap outer-container";
  vidTitle.className = "";

  //vidInfoWrap.classList.remove = "vidPlayer hidden";
  homeButton.className = "videoHomeButton";
  vidInfoWrap.className = "videoInformation";

  //videoChapCom.classList.remove = "vidPlayer hidden";
  videoChapCom.className = "chapters";

  vidDescription.className = "";
  //theFooter.className = "vidPlayer hidden";
  theHeader.className = "";
  //wrapPlayer.className = "vidPlayer hidden";
}

theaterBTNLink.appendChild(theaterBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(theaterBTNLink); //Adds the "slider" to "divSeek"


//Fullscreen Button
var fullBTNLink = document.createElement("a"); //Adds new anchor to the DOM
fullBTNLink.setAttribute("onclick", "openFullscreen()");

var fullBTNImage = document.createElement("object"); //Adds new object to the DOM
fullBTNImage.type = "image/svg+xml";
fullBTNImage.data = vectorPath + "fullscreenButton.svg";
fullBTNImage.className = "fullBTN"; //Adds the classname to the element

var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) {
    /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) {
    /* IE11 */
    elem.msRequestFullscreen();
  }
  videoPlayerWrap.className = "videoPlayerWrap fullscreen";
  theVideoWrap.className = "theVideoWrap outer-container fullscreen";
  vidTitle.className = "fullscreen";
  vidDescription.className = "fullscreenDescription";

  homeButton.className = "vidPlayer hidden";
  vidInfoWrap.className = "vidPlayer hidden";
  videoChapCom.className = "vidPlayer hidden";
  //theFooter.className = "vidPlayer hidden";
  theHeader.className = "vidPlayer hidden";
  //wrapPlayer.className = "vidPlayer hidden";

  console.log("You played the video in theater mode");
  fullBTNImage.data = vectorPath + "exitFullscreenButton.svg"; // Changes the button to the "pause" image
  //fullBTNImage.data = vectorPath + "fullscreenButton.svg";
  fullBTNLink.setAttribute("onclick", "closeFullscreen()");
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
    /* Safari */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    /* IE11 */
    document.msExitFullscreen();
  }
  videoPlayerWrap.className = "videoPlayerWrap";
  theVideoWrap.className = "theVideoWrap outer-container";
  vidTitle.className = "";

  //vidInfoWrap.classList.remove = "vidPlayer hidden";
  homeButton.className = "videoHomeButton";
  vidInfoWrap.className = "videoInformation";

  //videoChapCom.classList.remove = "vidPlayer hidden";
  videoChapCom.className = "chapters";

  vidDescription.className = "";
  //theFooter.className = "vidPlayer hidden";
  theHeader.className = "";
  //wrapPlayer.className = "vidPlayer hidden";

  console.log("You played the video not in theater mode");
  fullBTNImage.data = vectorPath + "fullscreenButton.svg"; // Changes the button to the "pause" image
  //fullBTNImage.data = vectorPath + "fullscreenButton.svg";  //Inital image path of the
  fullBTNLink.setAttribute("onclick", "openFullscreen()");
}

function toggleFullscreenMode() {
  fullBTNLink.setAttribute("onclick", "toggleNormScreen()");
}
function toggleNormScreen() {
  theVideoWrap.className = "theVideoWrap outer-container";
  vidTitle.className = "";
  vidInfoWrap.className = "vidInfoWrap";
  videoChapCom.className = "videoChapCom";

  vidDescription.className = "";
  theHeader.className = "";

  console.log("You played the video not in theater mode");
  fullBTNLink.setAttribute("onclick", "toggleFullscreenMode()");
}

fullBTNLink.appendChild(fullBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(fullBTNLink); //Adds the "slider" to "divSeek"

document.getElementById("vidCon").appendChild(playerButtons); // Adds the DOM content to HTML

video.addEventListener("mouseover", toggleControls);
video.addEventListener("mouseout", toggleControlsOff);
fullNavBar.addEventListener("mouseover", toggleControls);
fullNavBar.addEventListener("mouseout", toggleControlsOff);

function toggleControls() {
  fullNavBar.className = "vidConON";
}

function toggleControlsOff() {
  if (video.paused) {
    fullNavBar.className = "vidConON";
  } else {
    fullNavBar.className = "vidConOFF";
  }
}

function changeChapter(time) {
  video.currentTime = time;
  console.log(time);
}

/*
=====================================================================
	@ 2020 DevLexicon
=====================================================================
*/
