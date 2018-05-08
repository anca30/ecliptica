</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>DEBUG</h1>

<?php
	//echo 'test';

	$url = 'https://www.emag.ro/servetele-umede-pampers-fresh-clean-baby-12-pachete-x-64-768-bucati-4015400622598/pd/D6B68KBBM/?ref=hp_prod_widget_live_asp_3_2&recid=rec_2_rec_2_9a375ce30ab1109ced5b06b88997a79f_1525767883=6';
	
echo $url;
$info = array(
        'grant_type' =>'client_credentials'
);
 $post_field_string = http_build_query($info, '', '&');
echo "</br>";
		$headers = array(
		    "Accept-Language: en-us",
		    "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
		    "Connection: Keep-Alive",
		    "Cache-Control: no-cache"
		    );
		    
		$referer = 'http://www.google.com/search';

		$get = curl_init($url);
		curl_setopt($get, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept-Language: en_US')
); 

		curl_setopt($get, CURLOPT_HTTPHEADER, $headers); // this pretends this scraper to be browser client IE6 on Windows XP, of course you can pretend to be other browsers just you have to know the correct headers

		curl_setopt($get, CURLOPT_REFERER, $referer);

		
	    curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($get, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($get, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($get, CURLOPT_USERPWD,'ATKsMxDPf23rhQTgixcTYxLfuJoBsTiIRyaSQW_4J8_rNoVQsXHQkBjmBN0z:EOvF6RBizzf9qH2eA_s3PYmQk--smR6Xe8kDws228lq5pA0IebXTg902FY7f');
curl_setopt($get, CURLOPT_POSTFIELDS, $post_field_string);
curl_setopt($get,CURLOPT_POST,1);
curl_setopt($get, CURLOPT_HEADER,1); 
$exec = curl_exec($get);
echo '<pre>';
print_r($exec);
curl_close($get);

	    $html = curl_exec($get);
	   	$fp = fopen("test1.php", "w");
	   	echo "lala";
	   	echo $fp;
 	    fwrite($fp, $html);

		

	    $pattern1 = "/(var\sproduct\s=\s)\{(?:[^{}]|(?R))*\}/x";
	    $pattern2 = "/\{(?:[^{}]|(?R))*\}/x";
	    preg_match_all($pattern1, $html, $matches);
	    preg_match_all($pattern2, $matches[0][0], $jsonArr);
		//print_r($jsonArr[0][0]);

		$json = $jsonArr[0][0];

		$patternTitle = "/\'fn\':\s.*,/";
		preg_match_all($patternTitle, $json, $matches);
		$split = explode(" ", $matches[0][0])[1];
		$split1 = str_replace('\x20', " ", $split);
		$split2 = str_replace('\x2D', "-", $split1);
		$splitTitle = str_replace('"', " ", $split2);
		echo "<br/>Title: " . $splitTitle;

		$patternPrice = "/\'price\':\s.*,/";
		preg_match_all($patternPrice, $json, $matches);
		$splitPrice = explode(" ", $matches[0][0])[1];
		echo "<br/>Price: " . str_replace("'", "", $splitPrice);

		$patternBrand = "/\'brand\':\s.*,/";
		preg_match_all($patternBrand, $json, $matches);
		$splitBrand = explode(" ", $matches[0][0])[1];
		$splitBrand1 = str_replace('\x20', " ", $splitBrand);
		echo "<br/>Brand: " . str_replace('"', "", $splitBrand1);

		$patternImage = "/\'photo\':\s.*,/";
		preg_match_all($patternImage, $json, $matches);
		$splitImage = explode(" ", $matches[0][0])[1];
		echo "<br/>Image: " . str_replace("'", "", $splitImage);


?>

</body>
</html>