<?php
require_once(__DIR__ . '/vendor/autoload.php');

//APP - CONFIGURATION:
$APP_ID = "";
$CLIENT_SECRET = "";
$REDIRECT_URI = "";

session_start();

$apiInstanceRest = new Meli\Api\RestClientApi();

if (isset($_SESSION["TOKEN"])) {
	
	try {
	$apiInstanceRest->resourceGet('users/me', $_SESSION["TOKEN"]);
	}
	catch(Exception $e) {
		session_destroy();
		header("Location: auth.php");
		die();
	}
}
else {
	
	if (isset($_GET["code"])) {
		$auth_api = new Meli\Api\OAuth20Api();
		
		$result = $auth_api->getToken(
			"authorization_code",
			$APP_ID,
			$CLIENT_SECRET,
			$REDIRECT_URI,
			$_GET["code"]
		);
		$data = json_decode($result[0]);
	
		$_SESSION["TOKEN"] = $data->access_token;
		$_SESSION["user_id"] = $data->user_id;
	}
	else {
		header("Location: https://auth.mercadolibre.com.uy/authorization?response_type=code&client_id=$APP_ID&redirect_uri=$REDIRECT_URI");
	}
}


?>