function calcParallax(tileheight, speedratio, scrollposition) {
	//	by Brett Taylor http://inner.geek.nz/
	//	originally published at http://inner.geek.nz/javascript/parallax/
	//	usable under terms of CC-BY 3.0 licence
	//	http://creativecommons.org/licenses/by/3.0/
	return ((tileheight) - (Math.floor(scrollposition / speedratio) % (tileheight+1)));
}

window.onload = function() {

	window.onscroll = function() {
		var posX = (document.documentElement.scrollLeft) ? document.documentElement.scrollLeft : window.pageXOffset;
		var posY = (document.documentElement.scrollTop) ? document.documentElement.scrollTop : window.pageYOffset;
		
		var body = document.getElementById('body');
		var bodyparallax = calcParallax(200, 2.5, posY);
		body.style.backgroundPosition = "0 " + bodyparallax + "px"; 
		
		var waves = document.getElementById('wrap');
		var wavesparallax = calcParallax(800, .9, posY);
		waves.style.backgroundPosition = "50% " + wavesparallax + "px"; 
	}
}