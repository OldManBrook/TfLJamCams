<?php

$jb = ($_GET['jb']);

if ($jb == "476") {

/*$fp = fopen('count_images.txt', 'c+');
//flock($fp, LOCK_EX);

//$count = (int)fread($fp, filesize('count_images.txt'));
//ftruncate($fp, 0);
//fseek($fp, 0);
//fwrite($fp, $count + 1);

//flock($fp, LOCK_UN);
//fclose($fp);

//Set XML Header*/
header('Content-Type: text/html');
echo '<!DOCTYPE html>';
echo '<html><head><style>
tbody, thead tr {
  display: table;
  width: 100%;
  table-layout: fixed;
}
td {
  border:1px solid;
}
* {box-sizing:border-box; border-collapse:collapse;}
body {font-family:arial;}table {  border-collapse: collapse;  width: 100%;}th, td {padding: 8px;  text-align: left;  border-bottom: 1px solid #ddd;}tr:hover {background-color:#f5f5f5;}</style><title>TfLJamCams - JamCam List</title>';
echo "<script>
	function setCookie(c_name,value,exdays){var exdate=new Date();exdate.setDate(exdate.getDate() + exdays);var c_value=escape(value) + ((exdays==null) ? \"\" : (\"; expires=\"+exdate.toUTCString()+\"; path=/\"));document.cookie=c_name + \"=\" + c_value;}
var thisDomain = window.location.hostname;
/*console.log (thisDomain);*/
function getCookie(cname) {
    var name = cname + \"=\";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return \"\";
}
function delete_cookie( name, path, domain ) {
  if( getCookie( name ) ) {
    document.cookie = name + \"=\" +
      ((path) ? \";path=\"+path:\"\")+
      ((domain)?\";domain=\"+domain:\"\") +
      \";expires=Thu, 01 Jan 1970 00:00:01 GMT\";
  }
}
var CamHide=false,IncHide=false;
var consent = getCookie(\"cookieconsent_status\");
if (consent===\"allow\"){
console.log('Cookie Accept Status : ' + consent);
var script = document.createElement('script');
script.setAttribute('src','https://www.googletagmanager.com/gtag/js?id=UA-111590963-1');
document.head.appendChild(script);

}else if (consent==\"deny\"){
console.log('Cookie Accept Status : ' + consent);
delete_cookie('_ga','/','.tfljamcams.net');
delete_cookie('_gat_gtag_UA-111590963-1','/','.tfljamcams.net');
delete_cookie('_gid','/','.tfljamcams.net');
setCookie('tfljamcams',0,-1);
}else{
console.log('Cookie Accept Status : not set');
}

window.addEventListener(\"load\", function(){
	window.cookieconsent.initialise({
	\"palette\": {
    \"popup\": {
      \"background\": \"#000\"
    },
    \"button\": {
      \"background\": \"#f1d600\"
    }
  },
		\"position\": \"top\",
		\"showLink\": true,
		\"theme\": \"classic\",
		\"type\": \"opt-in\",
		\"content\": {
		\"message\": \"We use cookies to provide visit analytics and mobile responsive views on a variety of devices. You can choose to deny or allow use of Cookies during your visit..\",
			\"dismiss\": '<a aria-label=\"deny cookies\" role=\"button\" tabindex=\"0\" class=\"cc-btn cc-deny\" style=\"min-width: 140px;\">Deny</a>',
			\"allow\": \"Allow\",
			\"link\": \"Learn More\",
			\"href\": \"/contact/privacypolicy.html\",
		},
		\"revokeBtn\": \"<div class='cc-revoke @{{classes}}' style='font-size:x-small;margin-top:0px;' title='Manage Cookie Preferences'>Cookies</div>\",
		onInitialise: function (status) {
		var type = this.options.type;
		var didConsent = this.hasConsented();
		
		if (type == 'opt-in' && didConsent && consent==='allow') {
		setTimeout(function() {
          document.getElementsByClassName(\"cc-revoke\")[0].style.display = \"block\";
        });
			/* enable cookies*/
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-111590963-1');
		
		}else{
		setTimeout(function() {
          document.getElementsByClassName(\"cc-revoke\")[0].style.display = \"block\";
        });
		}
		},
		
		onStatusChange: function(status, chosenBefore) {
		var type = this.options.type;
		var didConsent = this.hasConsented();
		if (type == 'opt-in' && didConsent && consent==='allow') {
			
			/* enable cookies*/
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-111590963-1');
		}
		},
		
		onRevokeChoice: function() {
		var type = this.options.type;
		if (type == 'opt-in' && consent!='allow') {
		console.log('Clear Cookies ');
			/* disable cookies*/
				delete_cookie('_ga','/','.tfljamcams.net');
				delete_cookie('_gat_gtag_UA-111590963-1','/','.tfljamcams.net');
				delete_cookie('_gid','/','.tfljamcams.net');
				setCookie('tfljamcams',0,-1);
				
				/* Get an array of cookies*/
				var arrSplit = document.cookie.split(\";\");
				for(var i = 0; i < arrSplit.length; i++)
				{
					var cookie = arrSplit[i].trim();
					var cookieName = cookie.split(\"=\")[0];
					/* If the prefix of the cookie's name matches the one specified, remove it*/
					if(cookieName.indexOf(\"sssUpp\") ===0) {
						/* Remove the cookie*/
						document.cookie = cookieName + \"=; Max-Age=-99999999;\";
						
					}
				}
			}
		},
	})});
    function imageAppear(id) { 
    document.getElementById(id).style.visibility = \"visible\";}

    function imageDisappear(id) { 
    document.getElementById(id).style.visibility = \"hidden\";}

    </script>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css\" />
<script src=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js\"></script></head><body><h2 style=\"margin-left:50px;\">TfLJamCams - JamCam List</h2>";
echo "<table>";
echo "<thead style=\"display:block;position: sticky;top:20px;background-color: grey;\"><tr><td style=\"text-align:center;\"><strong>Count</strong></td><td><strong>Name</strong></td><td><strong>Available</strong></td><td><strong>Latitude</strong></td><td><strong>Longitude</strong></td><td><strong>View</strong></td></tr></thead><tbody>";

/*$html .= "<cameras>";

//SET STREAM OPTIONS
// Create a stream
//$opts = array(
//  'http'=>array(
//    'method'=>"GET",
//    'header'=>"Accept-language: en\r\n" .
//              "Accept-Encoding: chunked\r\n"
//  )
//);

//$context = stream_context_create($opts);
	
// Read JSON file*/
$json = file_get_contents('https://api.tfl.gov.uk/Place/Type/JamCam'); /*, false, $context);*/
$camCount=0;
/*Decode JSON*/
$json_data = json_decode($json, true);
	
/*Traverse array and get the data*/
foreach ($json_data as $item) {
$camCount +=1;
$imageUrl = array_values(array_filter(
	$item['additionalProperties'], 
	function ($property) {
        return $property['key'] === 'imageUrl';		
    }
))[0]['value'];
		
		
$available = array_values(array_filter(
	$item['additionalProperties'], 
    function ($property) {
        return $property['key'] === 'available';
    }
))[0]['value'];

$view = array_values(array_filter(
	$item['additionalProperties'], 
    function ($property) {
        return $property['key'] === 'view';
    }
))[0]['value'];
		
/*If ($available = 'true') { */
echo "<tr><td style=\"text-align:center;\">".$camCount."</td><td>".$item['commonName']."</td><td>".$available."</td><td>".$item['lat']."</td><td>".$item['lon']."</td><td>".$view."</td></tr>";
/**echo "<tr><td style=\"text-align:center;\" onmouseover=\"imageAppear('place-holder-".$camCount."')\" onmouseout=\"imageDisappear('place-holder-".$camCount."')\">".$camCount."</td><td onmouseover=\"imageAppear('place-holder-".$camCount."')\" onmouseout=\"imageDisappear('place-holder-".$camCount."')\">".$item['commonName']."</td><td onmouseover=\"imageAppear('place-holder-".$camCount."')\" onmouseout=\"imageDisappear('place-holder-".$camCount."')\"><img src=\"".$imageUrl."\" id=\"place-holder-".$camCount."\" style=\"zindex: 100; position: absolute; visibility: hidden;\"/>".$available."</td><td onmouseover=\"imageAppear('place-holder-".$camCount."')\" onmouseout=\"imageDisappear('place-holder-".$camCount."')\">".$item['lat']."</td><td onmouseover=\"imageAppear('place-holder-".$camCount."')\" onmouseout=\"imageDisappear('place-holder-".$camCount."')\">".$item['lon']."</td><td onmouseover=\"imageAppear('place-holder-".$camCount."')\" onmouseout=\"imageDisappear('place-holder-".$camCount."')\">".$view."</td></tr>";	*/	
	
/*}		
//echo $item['commonName'].',';
		//echo $available.',';
		//echo $imageUrl.',';
		//echo $item['lat'].',';
		//echo $item['lon'].'<br />';*/
		
}
/*}*/

echo "</tbody></table><font size=1>&copy;&nbsp;".date("Y")."&nbsp;TfLJamCams.net<br />Live Feeds Powered by <a href=\"https://tfl.gov.uk/info-for/open-data-users/\" target=\"_blank\" title=\"TfL Open Data\">©TfL Open Data.</a></font></body></html>";

} else {
	echo "No Hotlinking please.<br /><br />";
	echo "Get in touch and I'll share my code...Jason";
}
?>
