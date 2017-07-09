<?php
	header('P3P: CP="CAO PSA OUR"');

	session_start();
	if (isset($_POST['instaUser'])){
		$_SESSION['user'] = $_POST['instaUser'];
	}
	else{
		$_SESSION['user'] = 'doggosdoingthings';
	}
	
?>