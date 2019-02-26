<?php
/* This is to check if the request is coming from a specific domain */
$ref = $_SERVER['HTTP_REFERER'];
$refData = parse_url($ref);

if($refData['host'] !== 'www.tfljamcams.net') {
  /* Output string and stop execution*/
  die("Hotlinking not permitted");
}
$pass = ($_GET['config']);
if(!$pass){
/* Output string and stop execution*/
  die("Hotlinking not permitted");
}
if($pass!='428901'){
  /* Output string and stop execution*/
  die("Hotlinking not permitted");
}
date_default_timezone_set('Europe/London');

$servername = "localhost";
$username = "tfljamca_jwbsla";
$password = ",7=vh,)q8veK";
$dbname = "tfljamca_search";
$term = array();
$out = array();
try {
     $dbo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   /*echo "<div style=\"float:right;text-align:right;overflow: auto;font-size:x-small;\">SQL Conn : ".substr($dbname, (strpos($dbname, '_')))."</div>";*/
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$sql = "SELECT term, lat, lng, icon, StationCode FROM `search`";
try {
if ($bfr = $dbo->query($sql)) {
	if ($bfr->rowCount() > 0) {
		foreach ($dbo->query($sql) as $row){
			$q = $row[term];
			$lat = $row[lat];
			$lng = $row[lng];
			$type = $row[icon];
			$stationCode = $row[StationCode];
			if($type=='DLR'){
			$newicon = 'img/dlr.png';
			}else if($type=='London Overground'){
			$newicon = 'img/overground.png';
			}else if($type=='London Underground'){
			$newicon = 'img/underground.png';
			}else if($type=='TfL Rail'){
			$newicon = 'img/tflrail.png';
			}else if($type=='TramLink'){
			$newicon = 'img/tramlink.png';
			}else if($type=='London Borough' || $type=='Town'){
			$newicon = 'img/red-pushpin.png';
			}else if($type=='Camera'){
			$newicon = 'img/cams.png';
			}else{
			$newicon = 'img/rail.png';
			}
			
			if(!$stationCode==null){
			$newicon = 'img/rail.png';
			}


$term[] = array(
        'term' => $q,
		'lat' => $lat,
		'lng' => $lng,
		'icon' => $newicon,
		'StationCode' => $stationCode,
    );
	
	}
	}
	}
} catch (PDOException $e) {
 /*echo "DataBase Error: ".$e->getMessage()."<br />";*/
} catch (Exception $e) {
  /*echo "General Error: ".$e->getMessage()."<br />";*/
}

$dbo = NULL;

/*$out = array(
    'lastupdate' => date('r'),
    'search' => $term,
);*/
$out = $term;

$out = json_encode($out);

header('Cache-Control: max-age=30');
header('Content-Type: application/json');
print $out;
?>
