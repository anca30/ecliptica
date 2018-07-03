</!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
</!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>DEBUG</h1>

<?php
    
	$url = 'https://www.cora.ro/ursus-cooler-bere-cu-lamaie-fara-alcool-4x0-5-l-P-2434709';

	$info = array(
	    'grant_type' =>'client_credentials'
	);

	$post_field_string = http_build_query($info, '', '&');
	//echo "</br>";
	$headers = array(
	"Accept-Language: en-us",
	"User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
	"Connection: Keep-Alive",
	"Cache-Control: no-cache"
	);

	$referer = 'http://www.google.com/search';

	ob_start();
	$out = fopen('php://output', 'w');
	$get = curl_init($url);
	curl_setopt($get, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept-Language: en_US')); 


	ob_start();
	$out = fopen('php://output', 'w');

	$get = curl_init($url);
	curl_setopt($get, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept-Language: en_US')); 


	curl_setopt($get, CURLOPT_HTTPHEADER, $headers); // this pretends this scraper to be browser client IE6 on Windows XP, of course you can pretend to be other browsers just you have to know the correct headers
	curl_setopt($get, CURLOPT_REFERER, $referer);

	curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($get, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($get, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($get, CURLOPT_HEADER,1); 
	curl_setopt($get, CURLOPT_VERBOSE,true); 

	$exec = curl_exec($get);
	var_dump($exec);
	$fp = fopen("test2.php", "w");
	  fwrite($fp, $exec);

	echo $exec;

	curl_close($get);
	fclose($out);
	$debug = ob_get_clean();
	$pattern1 = "/\"productGTMJson\":\"\{(?:[^{}]|(?R))*\}\"/";
	$pattern2 = "/\{(?:[^{}]|(?R))*\}/x";
	preg_match_all($pattern1, $exec, $matches1);
	  echo "lslas";
	echo $matches1[0][0];
	echo "</br>";
	echo "</br>";
	preg_match_all($pattern2, $matches1[0][0], $jsonArr);
	print_r($jsonArr[0][0]);
	$json = $jsonArr[0][0];
	//echo $json;
	//echo "</br>";
	$patternTitle =  "/name.*:.*,/";
	preg_match_all($patternTitle, $json, $matches);
	echo $matches[0][0];
	$split = explode(",", $matches[0][0])[0];
	$split = explode(":", $split)[1];
	//echo $split;
	//echo "</br>";
	$split1 = str_replace('\"', "", $split);
	$split2 = str_replace(',', "", $split1);
	//echo $split2;
	echo "<br/>Title: " . $split2;

	$patternPrice = "/price.*:.*,/";
	preg_match_all($patternPrice, $json, $matches);
	$splitPrice = explode(",", $matches[0][0])[0];
	$splitPrice = explode(":", $splitPrice)[1];
	$splitPrice1 = str_replace('"', "", $splitPrice);
	$splitPrice2 = str_replace(',', "", $splitPrice1);
	echo "</br>Price: " . $splitPrice2;


	$patternBrand = "/brand.*:.*,/";
	preg_match_all($patternBrand, $json, $matches);
	$splitBrand = explode(",", $matches[0][0])[0];
	$splitBrand = explode(":", $splitBrand)[1];
	$splitBrand1 = str_replace('\"', "", $splitBrand);
	$splitBrand2 = str_replace(',', "", $splitBrand1);
	echo "</br>Brand: " . $splitBrand2;
	echo "<br></br>";

	$patternImg = "/\"images\".*:.*,/";
	preg_match_all($patternImg, $exec, $matches);
	//echo $matches[0][0];
	$patternImg1 = "/\"mediumImageUrl\".*:.*,/";
	preg_match_all($patternImg1, $matches[0][0], $matches);
	$splitImg = explode(",", $matches[0][0])[0];
	$splitImg = explode(":", $splitImg)[1];
	$splitImg = str_replace('"', "", $splitImg);
	$img = "https://www.cora.ro" . $splitImg;
	echo $img;
	//echo "</br>ImgUrl: " . "https://www.cora.ro".$splitImg;

?>

</body>
</html></body>
</html>