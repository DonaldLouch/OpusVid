/*
=====================================================================
	OpusVid | embed.js
	v. 1.0 |
=====================================================================
*/

	console.log('video.js Working');

/*
=====================================================================
	Video Player
=====================================================================
*/

//Settup
	var video = document.querySelector("video");
	video.controls = ""; // Hide the browser's default controls
	var fullNavBar = document.getElementById("vidCon");
	console.log(vectorPath);

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
seekBar.addEventListener("change", vidSeek);  // Once you slide it will fire the "videoSeek" function
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
divSeek.appendChild(progressBar); //Adds the "counter" to "divSeek"
document.getElementById("vidCon").appendChild(divSeek); // Adds the DOM content to HTML

var playerButtons = document.createElement("div"); //Adds new div to the DOM
playerButtons.className = "playerButtons";

//Skip Back Mode Button
var skipBackBTNLink = document.createElement("a"); //Adds new anchor to the DOM
skipBackBTNLink.setAttribute('onclick', 'skipBack()');

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
playBTNLink.setAttribute('onclick', 'playClick()');

var playBTNImage = document.createElement("object"); //Adds new object to the DOM
playBTNImage.type = "image/svg+xml";
playBTNImage.data = vectorPath + "playButton.svg";
playBTNImage.className = "playBTN"; //Adds the classname to the element
//playBTNImage.src = vectorPath + "playButton.svg"; //Inital image path of the button

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
skipForwardBTNLink.setAttribute('onclick', 'skipForward()');

var skipForwardBTNImage = document.createElement("object"); //Adds new object to the DOM
skipForwardBTNImage.type = "image/svg+xml";
skipForwardBTNImage.data = vectorPath + "skipForwardButton.svg";
skipForwardBTNImage.className = "skipForwardBTN"; //Adds the classname to the element

function skipForward() {
	video.currentTime += 10 ;
}
skipForwardBTNLink.appendChild(skipForwardBTNImage); //Adds the image to the anchor tag
playerButtons.appendChild(skipForwardBTNLink); //Adds the "slider" to "divSeek"

	//Display: Counter Infomation
		var counter = document.createElement("p"); //Adds new button to the DOM
		counter.className = "timeCode"; //Adds the classname "timeCode"
		counter.innerHTML = "0:00 / 0:00"; //Inital text
		counter.title = "Gives you the current time vs. the duration of the video"; //Adds a title to the text in the DOM (Semantic)
		video.addEventListener("timeupdate", currentT); // Always updating the time to display later
		function currentT() {
			var n = video.currentTime * (100 / video.duration); // Looks at the updated time vs. the duration
			seekBar.value = n; // Takes the time of the seekbar into effect
			var curmins = Math.floor(video.currentTime / 60); // Divides the current time in 60 (to get the minutes)
			var cursecs = Math.floor(video.currentTime - curmins * 60); // Takes the current time from "curmins" and deletes 60 to get the seconds
			var durmins = Math.floor(video.duration / 60); // Divides the duration time in 60 (to get the minutes)
			var dursecs = Math.floor(video.duration - durmins * 60); // Takes the durration time from "durmins" and deletes 60 to get the seconds
			if (cursecs < 10) {
				cursecs = "0" + cursecs;  //If less than 10 seconds an extra "0" will be added to the begining
			}
			if (dursecs < 10) {
				dursecs = "0" + dursecs; //If less than 10 seconds an extra "0" will be added to the begining
			}
			counter.innerHTML = curmins + ":" + cursecs + " / " + durmins + ":" + dursecs; // Adds the content of current time / duration

			var percent = (video.currentTime / video.duration) * 100;
			console.log(percent);
			progressUpdate.style.flexBasis = percent + "%";
		}
		playerButtons.appendChild(counter); //Adds the "slider" to "divSeek"

//Mute/Unmute Button
	var muteBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	muteBTNLink.setAttribute('onclick', 'videoMute()');

		var muteBTNImage = document.createElement("object"); //Adds new object to the DOM
		muteBTNImage.type = "image/svg+xml";
		muteBTNImage.data = vectorPath + "muteButton.svg";
		muteBTNImage.className = "muteBTN"; //Adds the classname to the element

		function videoMute(){
			if(video.muted){
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

	//Opus Vid Logo
		var opusLogoLink = document.createElement("a"); //Adds new anchor to the DOM
		opusLogoLink.href = siteURL; //Adds the link to the element
		opusLogoLink.target = "_blank"; //Adds the link to the element

		var opusLogoImage = document.createElement("object"); //Adds new object to the DOM
		opusLogoImage.type = "image/svg+xml";
		opusLogoImage.data = vectorPath + "titleLogoWhite.svg";
		opusLogoImage.className = "opusLogoBTN"; //Adds the classname to the element

		opusLogoLink.appendChild(opusLogoImage); //Adds the image to the anchor tag
playerButtons.appendChild(opusLogoLink); //Adds the "slider" to "divSeek"

document.getElementById("vidCon").appendChild(playerButtons); // Adds the DOM content to HTML

	video.addEventListener("mouseover", toggleControls);
	video.addEventListener("mouseout", toggleControlsOff);
	fullNavBar.addEventListener("mouseover", toggleControls);
	fullNavBar.addEventListener("mouseout", toggleControlsOff);

	const vidTitle = document.querySelector("#videoTitle");

	function toggleControls() {
		fullNavBar.className = "vidConON";
		vidTitle.className = "full";
		//console.log("You've hovered over the video = control bar is active!");
	}

	function toggleControlsOff() {
		if (video.paused) {
			fullNavBar.className = "vidConON";
			vidTitle.className = "full";
			//console.log("You've hovered over the video = control bar is active!");
		}else{
			fullNavBar.className = "vidConOFF";
			vidTitle.className = "vidPlayer hidden";
			//console.log("Your not hovered over the video = control bar is deactive!");
			}
	}

/*
=====================================================================
	@ 2020 DevLexicon
=====================================================================
*/
