<?php
	if(isset($_POST['style'])){
		$iframeSrc = file_get_contents('getImages.php');
		
		if ($_POST['style'] == "carousel" ){
			$iframeSrc = str_replace('</head>','<link rel="stylesheet" href="styles/carousel.css" /></head>', $iframeSrc);
			
		}
		if ($_POST['style'] == "grid" ){
			$iframeSrc = str_replace('</head>','<link rel="stylesheet" href="styles/grid.css" /></head>', $iframeSrc);
		}
		if ($_POST['style'] == "dissolve" ){
			$iframeSrc = str_replace('</head>','<link rel="stylesheet" href="styles/dissolve.css" /></head>', $iframeSrc);
		}
	}
	
	
?>