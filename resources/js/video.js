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

	var fullNavBar = document.getElementById("vidCon");

//Play/Pause Button
	var playBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	playBTNLink.setAttribute('onclick', 'playClick()');

		var playBTNImage = document.createElement("img"); //Adds new image to the DOM
		playBTNImage.className = "playBTN"; //Adds the classname to the element
		playBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/playButton.png"; //Inital image path of the button

		function playClick(){
			if (video.paused) {
				video.play(); // Starts off with "Play" and will start the video
				playBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/pauseButton.png"; // Changes the button to the "pause" image
				console.log("You played the video");
				}else{
				video.pause(); // Once button is clicked it will pause the video
				playBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/playButton.png"; // Changes the button to the "play" image
				console.log("You paused the video");
				}
			}

	playBTNLink.appendChild(playBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(playBTNLink); //Adds the DOM content to HTML

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
		opusLogoImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/opusLogo.png"; //Image path of the button

	opusLogoLink.appendChild(opusLogoImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(opusLogoLink); //Adds the DOM content to HTML

//Mute/Unmute Button
	var muteBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	muteBTNLink.setAttribute('onclick', 'videoMute()');

		var muteBTNImage = document.createElement("img"); //Adds new image to the DOM
		muteBTNImage.className = "muteBTN"; //Adds the classname to the element
		muteBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/muteButton.png"; //Inital image path of the button

		function videoMute(){
			if(video.muted){
				video.muted = false; // Video audio is NOT muted
				muteBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/muteButton.png"; // Changes the button to the "mute" image
				console.log("You unmuted the video");
			} else {
				video.muted = true; // Video audio IS muted
				muteBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/unmuteButton.png"; // Changes the button to the "unmute" image
				console.log("You muted the video");
			}
		}

	muteBTNLink.appendChild(muteBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(muteBTNLink); //Adds the DOM content to HTML

//Fullscreen Button
	var fullBTNLink = document.createElement("a"); //Adds new anchor to the DOM
	fullBTNLink.setAttribute('onclick', 'toggleFullScreen()');

	var wrapHeader = document.getElementById("vidHeader");
	var wrapDescription = document.getElementById("vidDescription");
	var wrapVideo = document.getElementById("vidVidWrap");
	var wrapFooter = document.querySelector("footer");

		var fullBTNImage = document.createElement("img"); //Adds new image to the DOM
		fullBTNImage.className = "fullBTN"; //Adds the classname to the element
		fullBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/fullscreenButton.png"; //Inital image path of the button

		wrapHeader.className = "vidPlayer1";
		wrapDescription.className = "vidPlayer1";
		wrapFooter.className = "vidPlayer1";

		function toggleFullScreen(){
			console.log("You played the video in fullscreen");
			fullBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/exitFullscreenButton.png"; //Inital image path of the
			fullBTNLink.setAttribute('onclick', 'toggleNormScreen()');
			wrapHeader.className = "vidPlayer hidden";
			wrapDescription.className = "vidPlayer hidden";
			wrapHeader.className = "vidPlayer hidden";
			wrapDescription.className = "vidPlayer hidden";
			wrapFooter.className = "vidPlayer hidden";
			//wrapPlayer.className = "vidPlayer hidden";
			wrapVideo.className = "outer-container full";
		}
		function toggleNormScreen() {
			console.log("You played the video not in fullscreen");
			fullBTNImage.src = "https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/fullscreenButton.png"; //Inital image path of the
			fullBTNLink.setAttribute('onclick', 'toggleFullScreen()');
			wrapHeader.className = "vidPlayer";
			wrapDescription.className = "vidPlayer";
			wrapFooter.className = "vidPlayer";
			wrapVideo.className = "outer-container";
			//wrapPlayer.className = "vidPlayer";
		}
/*
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
		}*/

	fullBTNLink.appendChild(fullBTNImage); //Adds the image to the anchor tag
	document.getElementById("vidCon").appendChild(fullBTNLink); //Adds the DOM content to HTML

	//fullNavBar = document.getElementById("vidCon");
	//video.addEventListener("mouseover", toggleControls)
	//document.getElementById("player").addEventListener("mouseover", toggleControls);
	//document.getElementById("player").addEventListener("mouseout", toggleControlsOff);

	video.addEventListener("mouseover", toggleControls);
	video.addEventListener("mouseout", toggleControlsOff);
	fullNavBar.addEventListener("mouseover", toggleControls);
	fullNavBar.addEventListener("mouseout", toggleControlsOff);


	function toggleControls() {
		fullNavBar.className = "vidConON";
		console.log("You've hovered over the video = control bar is active!");
	}

	function toggleControlsOff() {
		fullNavBar.className = "vidConOFF";
		console.log("Your not hovered over the video = control bar is deactive!");
	}

/*
=====================================================================
	@ 2018 Opus Vid
=====================================================================
*/
