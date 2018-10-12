/*
=====================================================================
	Opus Vid | video.js
		v. 1.0 | October 3rd, 2018
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

	/*
	var tracks = [
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
	var prevBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	prevBTNLink.setAttribute('onclick', 'next()');

		var prevBTNImage = document.createElement("img"); //Adds new image to the DOM
		prevBTNImage.className = "prevBTN"; //Adds the classname to the element
		prevBTNImage.src = "../../../../storage/ui/video-ui/previousVideoButton.png"; //Inital image path of the button

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

	prevBTNLink.appendChild(prevBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(prevBTNLink); //Adds the DOM content to HTML
	*/

//Play/Pause Button
	var playBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	playBTNLink.setAttribute('onclick', 'playClick()');

		var playBTNImage = document.createElement("img"); //Adds new image to the DOM
		playBTNImage.className = "playBTN"; //Adds the classname to the element
		playBTNImage.src = "../../../../storage/ui/video-ui/playButton.png"; //Inital image path of the button

		function playClick(){
			if (video.paused) {
				video.play(); // Starts off with "Play" and will start the video
				playBTNImage.src = "../../../../storage/ui/video-ui/pauseButton.png"; // Changes the button to the "pause" image
				console.log("You played the video");
				}else{
				video.pause(); // Once button is clicked it will pause the video
				playBTNImage.src = "../../../../storage/ui/video-ui/playButton.png"; // Changes the button to the "play" image
				console.log("You paused the video");
				}
		}

	playBTNLink.appendChild(playBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(playBTNLink); //Adds the DOM content to HTML

/*
//Next Video Button
	var nextBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	nextBTNLink.setAttribute('onclick', 'next()');

		var nextBTNImage = document.createElement("img"); //Adds new image to the DOM
		nextBTNImage.className = "nextBTN"; //Adds the classname to the element
		nextBTNImage.src = "../../../../storage/ui/video-ui/nextVideoButton.png"; //Inital image path of the button

	nextBTNLink.appendChild(nextBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(nextBTNLink); //Adds the DOM content to HTML
*/

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
			function vidSeek(){
				var seekto = video.duration * (seekBar.value / 100); // Looks at the giving value of the slider vs. the duration on the video
				video.currentTime = seekto; // Seeks the video to givin length
			}
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
	divSeek.appendChild(seekBar); //Adds the "slider" to "divSeek"
	divSeek.appendChild(counter); //Adds the "counter" to "divSeek"
	document.getElementById("vidCon").appendChild(divSeek); // Adds the DOM content to HTML

//Opus Vid Logo
	var opusLogoLink = document.createElement("a"); //Adds new anchor to the DOM
	opusLogoLink.href = "home"; //Adds the link to the element

		var opusLogoImage = document.createElement("img"); //Adds new image to the DOM
		opusLogoImage.className = "opusLogoBTN"; //Adds the classname to the element
		opusLogoImage.src = "../../../../storage/ui/video-ui/opusLogo.png"; //Image path of the button

	opusLogoLink.appendChild(opusLogoImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(opusLogoLink); //Adds the DOM content to HTML

//Mute/Unmute Button
	var muteBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	muteBTNLink.setAttribute('onclick', 'videoMute()');

		var muteBTNImage = document.createElement("img"); //Adds new image to the DOM
		muteBTNImage.className = "muteBTN"; //Adds the classname to the element
		muteBTNImage.src = "../../../../storage/ui/video-ui/muteButton.png"; //Inital image path of the button

		function videoMute(){
			if(video.muted){
				video.muted = false; // Video audio is NOT muted
				muteBTNImage.src = "../../../../storage/ui/video-ui/muteButton.png"; // Changes the button to the "mute" image
				console.log("You unmuted the video");
			} else {
				video.muted = true; // Video audio IS muted
				muteBTNImage.src = "../../../../storage/ui/video-ui/unmuteButton.png"; // Changes the button to the "unmute" image
				console.log("You muted the video");
			}
		}

	muteBTNLink.appendChild(muteBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(muteBTNLink); //Adds the DOM content to HTML

//Fullscreen Button
	var fullBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	fullBTNLink.setAttribute('onclick', 'toggleFullScreen()');

		var fullBTNImage = document.createElement("img"); //Adds new image to the DOM
		fullBTNImage.className = "fullBTN"; //Adds the classname to the element
		fullBTNImage.src = "../../../../storage/ui/video-ui/fullscreenButton.png"; //Inital image path of the button

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

	fullBTNLink.appendChild(fullBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(fullBTNLink); //Adds the DOM content to HTML

/*
=====================================================================
	@ 2018 Opus Vid
=====================================================================
*/
