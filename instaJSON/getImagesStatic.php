
<html>
	<head>
		<link rel="stylesheet" href="styles/dissolve.css"/>
	</head>

	<body>
		
	<div class="wrapper" id="wrapper">
		<?php

	$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
$user = $_GET['user'];
	$instaFeed = file_get_contents("https://www.instagram.com/".$user."/media/", false, stream_context_create($arrContextOptions));
		$feedObject = json_decode($instaFeed, true);
			if(isset($feedObject['items'])) {
				foreach ($feedObject['items'] as $item) {
					$link = $item['link'];
					$img_url = $item['images']['standard_resolution']['url'];
					//$caption = $item['caption']['text'];
					?>
					<div class="img_container" id="img_container">
						<a href="<?php echo $link;?>" target="_blank" class ="instagram-post">
							<img class = "imgs" src="<?php echo $img_url; ?>">
							<!--<div class="caption"> <?php echo $caption; ?></div>-->
						</a>
					</div>
					<?php
					}
			}
?>	
	</div>
	</body>
	<script type="text/javascript">
		var getImages = document.getElementsByClassName('imgs');
		var getImagesClone = getImages;
		var i = 0;
		var len = getImages.length;
		setInterval(function loopDissolve(){
			getImages[i].style.opacity = "1";
			getImages[i].style.visibility = "visible";
			for(var x = 0; x < len; x++)
			{
				if (i != x){
					getImages[x].style.opacity = "0";
					getImages[x].style.visibility = "hidden";
				}
			}
			i++;
			if (i >= 20){
				i = 0;
			}
		}, 4000);
		
		
		/* var x = 1;
		var getCanvas = document.getElementById('wrapper');
		setInterval(function loop() {
			getCanvas.style.transform = "translateX(-" + x + "00vw)";
			x++;
			if (x >= 20){
				x=0;
			}
		}, 4000);*/
	</script>
</html>