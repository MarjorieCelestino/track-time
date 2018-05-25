/*
   Menu functions ================================================================================
*/
function openNav(){

	var navDiv = document.getElementById("navigation");
	var menuIcon =  document.getElementById("menu-icon");

	if(navDiv.className === "navigation"){

		navDiv.className += " menujs";
		menuIcon.innerHTML = "&Cross;";
	}else{

		navDiv.className = "navigation";
		menuIcon.innerHTML = "&#9776;";
	}
}

/*
   Form functions ================================================================================
*/
function display(id){
	document.getElementById(id).style.display = "block";
}

function hide(id){
	document.getElementById(id).style.display = "none";
}

/*
   Clock functions ================================================================================
*/
var h1 = document.getElementsByTagName('h1')[0];
var start = document.getElementById("start");
var pause = document.getElementById("pause");
var stop = document.getElementById("stop");

var seconds = 0;
var minutes = 0;
var hours = 0;
var t, time;

function addTime() {

	    seconds++;

	    if (seconds >= 60) {
	        seconds = 0;
	        minutes++;

	        if (minutes >= 60) {
	            minutes = 0;
	            hours++;
	        }
	    }
	    
	    clock.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + 
	    (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

	    timer();
	}

function timer() {
    t = setTimeout(addTime, 1000);
}

function startClock(){
	timer();
}

function clearClock() {

	/* set value of time input */
	time = clock.textContent;
	document.getElementById("time").value = time;

    clock.textContent = "00:00:00";
    seconds = 0; minutes = 0; hours = 0;
    clearTimeout(t);
}

function resetTime(){
	clock.textContent = "00:00:00";
    seconds = 0; minutes = 0; hours = 0;
}

function pauseClock() {

    clearTimeout(t);
    /* set value of time input */
    time = clock.textContent;
	document.getElementById("time").value = time;
}


