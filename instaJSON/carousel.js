var styles = document.styleSheets;
var theStyle = styles[0];
if (theStyle.href.includes("carousel")){
		
		var x = 1;
		var getCanvas = document.getElementById('wrapper');
		setInterval(function loop() {
			getCanvas.style.transform = "translateX(-" + x + "00vw)";
			x++;
			if (x >= 20){
				x=0;
			}
		}, 4000);	
}