<?php
//header("Location: https://www.tfljamcams.net");
//die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
function setCookie(c_name,value,exdays){var exdate=new Date();exdate.setDate(exdate.getDate() + exdays);var c_value=escape(value) + ((exdays==null) ? "" : ("; expires="+exdate.toUTCString()+"; path=/"));document.cookie=c_name + "=" + c_value;}
var thisDomain = window.location.hostname;
/*console.log (thisDomain);*/
function getCookie(cname) {
    var name = cname + "=";
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
    return "";
}
function delete_cookie( name, path, domain ) {
  if( getCookie( name ) ) {
    document.cookie = name + "=" +
      ((path) ? ";path="+path:"")+
      ((domain)?";domain="+domain:"") +
      ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
  }
}
var consent = getCookie("cookieconsent_status");
if (consent==="allow"){
console.log('Stored Cookie Status :' + consent);
var script = document.createElement('script');
//script.type = 'text/javascript';
script.setAttribute('src','https://www.googletagmanager.com/gtag/js?id=UA-111590963-1');
document.head.appendChild(script);

}else if (consent=="dismiss"){
console.log('Stored Cookie Status :' + consent);
delete_cookie('_ga','/','.tfljamcams.net');
delete_cookie('_gat_gtag_UA-111590963-1','/','.tfljamcams.net');
delete_cookie('_gid','/','.tfljamcams.net');
delete_cookie('tfljamcams','/','www.tfljamcams.net');
delete_cookie('video_count','/','www.tfljamcams.net');
delete_cookie('image_count','/','www.tfljamcams.net');
}else{
console.log('Cookie Status not selected');
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Use this page to let us know of a problem with the tfljamcams map.">
<meta name="keywords" content="london traffic,camera, cctv, map, london, traffic, tfl, jamcam, tfljamcams, problem, not working">
<meta name="nosnippets">
<title>TfL JamCams - Report A Problem</title>
</head>

<frameset rows="0,*" cols="*" frameborder="no">
  <frame src="" scrolling="no">
  <frame src="formpage.html">
</frameset>
<noframes><body>
</body>
</noframes></html>
