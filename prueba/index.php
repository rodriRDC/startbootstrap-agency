<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://cookpad.com/ar');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: cookpad.com';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Accept-Language: es-ES,es;q=0.9,en;q=0.8';
$headers[] = 'Cookie: ab_session=0.6694063739654299; f_unique_id=54987e08-79cf-4382-a5fc-c2483598e395; keyword_history_es=^%^5B^%^22comidas+sabrosas^%^22^%^5D; _pxhd=e1002f5b621589b6c0be8f04726a13e57609b4f54bf9a60189205d9d2548bb5c:6c8e87c0-99d7-11ea-94cc-9d9228da59c6; _ga=GA1.2.2051475158.1589896111; _gid=GA1.2.269928281.1589896111; _pxvid=6c8e87c0-99d7-11ea-94cc-9d9228da59c6; _px2=eyJ1IjoiZDdjMjEyYTAtOTlkNy0xMWVhLWJhN2YtNDk4ZmQ5NTI5MjZkIiwidiI6IjZjOGU4N2MwLTk5ZDctMTFlYS05NGNjLTlkOTIyOGRhNTljNiIsInQiOjE1ODk4OTcwNzM5MzcsImgiOiI1MTgwZmQ4ODllZmNlYTRmMDAxYjUxYTAzYTgyZWU0M2NjMmU1ZGI2YTkyYmZhNjM2ZDNmOTljOWE5YzdkMDgwIn0=; _global_web_session=IB5KvQBXaWFPbxPTWRG8FcgIMyiglCsw^%^2FBujvkMXOrcFX2k87uKqf6TYyL5ucr^%^2B^%^2FqrCvoDp21jpGCWLsbV5U5Exqox34HnYKegf04ZTPewoO05ZkE^%^2Bkkce^%^2FkvoQQAOef0pCFKQqd4rs8UmOwrB4^%^3D--IKLSBHL9vZE6z00w--uVGiWO8HGZRk3h65TmrA8A^%^3D^%^3D';
$headers[] = 'If-None-Match: W/^^75f276d5200ceb880f7fad66f832d92c^^\"\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$head = "<style>.shepherd-modal-overlay-container{filter:blur(1px);height:100%!important;opacity:0.6!important;}</style><link rel='stylesheet' href='https://shepherdjs.dev/dist/css/shepherd.css'>";
$body = "
<body onclick='printID(this.id);'
";
$content = str_replace('</head>', $head.'</head>', $result);
$content = str_replace('<body', $body, $content);
echo $content;
$script = "<script src='https://shepherdjs.dev/dist/js/shepherd.js'></script>";
$script .= "<script>


$(document).ready(onPageReady);

function printID(e){
  e = e || window.event;
  e = e.target || e.scrElement;
  alert(e.id); 
  alert(e.attr('class')); 
};



function onPageReady () {
  $('#splash_primary_action').bind('contextmenu', function(event) {
   console.log(event);
   // Check for right click
   if (event.which == 3){ // can also use button instead of which.
     // prevent default action.
     event.preventDefault(); 
      // simulate left click
    $(this).click();
   }
 });

 $('#splash_primary_action').click(function (event) {
   console.log(' Left Clicked !!',event)
 })
}


</script>";
echo $script;