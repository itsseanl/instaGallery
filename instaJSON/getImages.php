<?php
	header('P3P: CP="CAO PSA OUR"');

session_start();
$user = $_SESSION['user'];
?>
<html>
	<head>
		<link rel="stylesheet" href="styles/carousel.css">
	</head>

	<body onload="">
		
	<div class="wrapper" id="wrapper">
		<?php

	$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$x = 1;
	$instaFeed = file_get_contents("https://www.instagram.com/".$user."/media/", false, stream_context_create($arrContextOptions));
		$feedObject = json_decode($instaFeed, true);
			if(isset($feedObject['items'])) {
				foreach ($feedObject['items'] as $item) {
					$link = $item['link'];
					$img_url = $item['images']['standard_resolution']['url'];
					?>
					<div class="img_container">
						<a href="<?php echo $link;?>" target="_blank" class ="instagram-post">
							<img class="imgs" src="<?php echo $img_url; ?>">
							<div class="caption"> <?php echo $caption; ?></div>
						</a>
					</div>
					<?php
					}
			}
			session_abort();
?>	
	</div>
	<script type="text/javascript">

		var styles = document.styleSheets;
		var theStyle = styles[0];
		var links = document.getElementsByTagName('link');
		var getCanvas = document.getElementById('wrapper');
		var getImages = document.getElementsByClassName('imgs');
		var i = 0;
		var len = getImages.length;
		
		setInterval(function checkStyle(){
			newLinks = document.getElementsByTagName('link');
			if (links[0] != newLinks[0])
			{
				links[0] = newLinks[0];
			}
		}, 1000);
		
		
			var x = 1;
			setInterval(function loop() {
			if (links[0].getAttribute("href").includes("carousel")){

				getCanvas.style.transform = "translateX(-" + x + "00vw)";
				x++;
				links = document.getElementsByTagName('link');
				
				if (x >= 20){
					x=0;
				}
			}
			else{
				getCanvas.style.transform = "translateX(0px)";
			}
			}, 4000);	

		
		setInterval(function loopDissolve(){
			if (links[0].getAttribute("href").includes("dissolve")){
				getImages[i].style.opacity = "1";
				getImages[i].style.visibility = "visible";
				for(var z = 0; z < len; z++)
				{
					if (i != z){
						getImages[z].style.opacity = "0";
						getImages[z].style.visibility = "hidden";
					}
				}
				i++;
				if (i >= 20){
					i = 0;
				}
			}
			else{
				for(var z = 0; z < len; z++)
				{
					getImages[z].style.opacity = "1";
					getImages[z].style.visibility = "visible";
				}
			}
		}, 4000);
	
	</script>
	</body>
</html>