<?php
	$station = preg_replace("([^/\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['station']);
	$station = filter_var($station, FILTER_SANITIZE_URL);
	require("OpenLDBWS.php");
	$OpenLDBWS = new OpenLDBWS("<API KEY>");
	$response = $OpenLDBWS->GetDepartureBoard(10,"$station");

	header("Content-Type: application/json");
	echo json_encode($response);
?>
