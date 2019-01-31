<?php

        $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['comment'])){
          $comment=$_POST['comment'];
        }if(isset($_POST['token'])){
          $captcha=$_POST['token'];
	  }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
	$secretKey = "put your secret key here";
	$ip = $_SERVER['REMOTE_ADDR'];

	// post request to server

	$url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
	$response = file_get_contents($url);
	$responseKeys = json_decode($response,true);
	header('Content-type: application/json');
	if($responseKeys["success"]) {
		echo json_encode(array('success' => 'true'));
	} else {
		echo json_encode(array('success' => 'false'));
        }
?>
