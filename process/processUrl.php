<!DOCTYPE html>
<html lang="en">
<body>
<?php
  
  $db = include('../common/db.php');
  session_start();
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
    $conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket'])
    or die ('Could not connect to the database server' . mysqli_connect_error());

    // SELECT id FROM users WHERE email = $_SESSION[email]
    $id = -1;
    $idQuery = "SELECT id FROM users WHERE email = '" . $_SESSION["email"] . "';";
    $result = $conn->query($idQuery);
    if($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $id = $row["id"];
     // $insertUrl = "INSERT INTO  url (url, user) VALUES ('$url', '$id');";
      //if ($conn->query($insertUrl) === TRUE) {
        //$getNewUrlIdQuery = "SELECT idurl FROM url WHERE url = '" . $url . "';";
        if(strpos($url, 'elefant') !== false){
            $headers = array(
            "Accept-Language: en-us",
            "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
            "Connection: Keep-Alive",
            "Cache-Control: no-cache"
            );

            $referer = 'http://www.google.com/search';

            $get = curl_init($url);

            curl_setopt($get, CURLOPT_HTTPHEADER, $headers); // this pretends this scraper to be browser client IE6 on Windows XP, of course you can pretend to be other browsers just you have to know the correct headers

            curl_setopt($get, CURLOPT_REFERER, $referer);


            curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);


            $html = curl_exec($get);

            $pattern1 = "/(var\sproduct\s=\s)\{(?:[^{}]|(?R))*\}/x";
            $pattern2 = "/\{(?:[^{}]|(?R))*\}/x";
            preg_match_all($pattern1, $html, $matches);
            preg_match_all($pattern2, $matches[0][0], $jsonArr);
            //print_r($jsonArr[0][0]);

            $json = $jsonArr[0][0];

            $patternTitle = "/\'fn\':\s.*,/";
            preg_match_all($patternTitle, $json, $matches);
            $split = explode(" ", $matches[0][0]);
            $title = $split[1];
            $title1 = str_replace('\x20', " ", $title);
            $title2 = str_replace('\x2D', "-", $title1);
            $title3 = str_replace('"', " ", $title2);
            $title4 = substr_replace($title3, "", -1);

            // echo "<br/>Title: " . $splitTitle;

            $patternPrice = "/\'price\':\s.*,/";
            preg_match_all($patternPrice, $json, $matches);
            $splitPrice = explode(" ", $matches[0][0]);
            $price = $splitPrice[1];
            $price1 = str_replace('\x20', " ", $price);
            $price2 = str_replace('\x2D', "-", $price1);
            $price3 = str_replace("'", " ", $price);
            $price4 = substr_replace($price3, "", -1);



            $patternBrand = "/\'brand\':\s.*,/";
            preg_match_all($patternBrand, $json, $matches);
            $splitBrand = explode(" ", $matches[0][0]);
            $brand = $splitBrand[1];
            $brand1 = str_replace('\x20', " ", $brand);
            $brand2 = str_replace('\x2D', "-", $brand1);
            $brand3 = str_replace('"', " ", $brand2);
            $brand4 = substr_replace($brand3, "", -1);
            // echo "<br/>Brand: " . str_replace('"', "", $splitBrand1);

            $patternImage = "/\'photo\':\s.*,/";
            preg_match_all($patternImage, $json, $matches);
            $splitImage = explode(" ", $matches[0][0]);
            $image = $splitImage[1];
            $image1 = str_replace('\x20', " ", $image);
            $image2 = str_replace('\x2D', "-", $image1);
            $image3 = str_replace("'", " ", $image2);
            $image4 = substr_replace($image3, "", -1);
            // echo "<br/>Image: " . str_replace("'", "", $splitImage);

            echo $title4 . ' | ' . $brand4 . ' | ' . $price4 . ' | ' . $id . ' | ' . $image4;

            $insertTitle = "INSERT INTO  product (name, brand, price, iduser, imageUrl, url) 
              VALUES ('$title4', '$brand4', '$price4', '$id', '$image4', '$url');";
            $result2 = $conn->query($insertTitle);
        
            if ($result2 === TRUE){
            echo "success";
            }
        
            else{
                echo "Error: " . $insertTitle . "<br>" . $conn->error;
            }
        }
        else if(strpos($url, 'cora') !== false){
            $info = array(
            'grant_type' =>'client_credentials');

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
            //echo $exec;

            curl_close($get);
            fclose($out);
            $debug = ob_get_clean();
            $pattern1 = "/\"productGTMJson\":\"\{(?:[^{}]|(?R))*\}\"/";
            $pattern2 = "/\{(?:[^{}]|(?R))*\}/x";
            preg_match_all($pattern1, $exec, $matches1);
           // echo $matches1[0][0];
           // echo "</br>";
            // "</br>";
            preg_match_all($pattern2, $matches1[0][0], $jsonArr);
           // print_r($jsonArr[0][0]);
            $json = $jsonArr[0][0];
           // echo $json;
            //echo "</br>";
            $patternTitle =  "/name.*:.*,/";
            preg_match_all($patternTitle, $json, $matches);
            // $matches[0][0];
            $split = explode(",", $matches[0][0])[0];
            $split = explode(":", $split)[1];
            //echo $split;
            //echo "</br>";
            $split1 = str_replace('\"', "", $split);
            $split2 = str_replace(',', "", $split1);
            //echo $split2;
            //echo "<br/>Title: " . $split2;

            $patternPrice = "/price.*:.*,/";
            preg_match_all($patternPrice, $json, $matches);
            $splitPrice = explode(",", $matches[0][0])[0];
            $splitPrice = explode(":", $splitPrice)[1];
            $splitPrice1 = str_replace('"', "", $splitPrice);
            $splitPrice2 = str_replace(',', "", $splitPrice1);
            //echo "</br>Price: " . $splitPrice2;


            $patternBrand = "/brand.*:.*,/";
            preg_match_all($patternBrand, $json, $matches);
            $splitBrand = explode(",", $matches[0][0])[0];
            $splitBrand = explode(":", $splitBrand)[1];
            $splitBrand1 = str_replace('\"', "", $splitBrand);
            $splitBrand2 = str_replace(',', "", $splitBrand1);
            /*echo "</br>Brand: " . $splitBrand2;
            echo "<br></br>";*/

            $patternImg = "/\"images\".*:.*,/";
            preg_match_all($patternImg, $exec, $matches);
            //echo $matches[0][0];
            $patternImg1 = "/\"mediumImageUrl\".*:.*,/";
            preg_match_all($patternImg1, $matches[0][0], $matches);
            $splitImg = explode(",", $matches[0][0])[0];
            $splitImg = explode(":", $splitImg)[1];
            $splitImg = str_replace('"', "", $splitImg);
            $img = "https://www.cora.ro" . $splitImg;
            //echo "</br>ImgUrl: " . "https://www.cora.ro".$splitImg;
            echo $split2 . ' | ' . $splitBrand2 . ' | ' . $splitPrice2. ' | ' . $id . ' | ' . $splitImg;
            $insertProduct = "INSERT INTO  product (name, brand, price, iduser, imageUrl, url) 
              VALUES ('$split2', '$splitBrand2', '$splitPrice2', '$id', '$img','$url');";
            $result3 = $conn->query($insertProduct);
        
            if ($result3 === TRUE){
            echo "success";
            }
        
            else{
            echo "Error: " . $insertProduct . "<br>" . $conn->error;
            }

        }
        else if(strpos($url, 'emag') !== false){
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
            $fp = fopen("testEmag.php", "w");
            fwrite($fp, $exec);
            //echo $exec;

            curl_close($get);
            fclose($out);
            $debug = ob_get_clean();
            $pattern1 = "/\"products\"\:\[\{(?:[^{}]|(?R))*\}\]/";
            $pattern2 = "/\{(?:[^{}]|(?R))*\}/x";
            preg_match_all($pattern1, $exec, $matches);
            preg_match_all($pattern2, $matches[0][0], $jsonArr);
            //print_r($jsonArr[0][0]);
            $json = $jsonArr[0][0];
            //echo $json;
            //echo "</br>";
            $patternTitle =  "/\"name\":\s.*,/";
            preg_match_all($patternTitle, $json, $matches);
            //echo $matches[0][0];
            $split = explode(":", $matches[0][0])[1];
            //echo $split;
            //echo "</br>";
            $split1 = str_replace('"', "", $split);
            $split2 = str_replace(',', "", $split1);
            //echo $split2;
            //echo "<br/>Title: " . $split2;

            $patternPrice = "/\"price\":\s.*,/";
            preg_match_all($patternPrice, $json, $matches);
            $splitPrice = explode(":", $matches[0][0])[1];
            $splitPrice1 = str_replace('"', "", $splitPrice);
            $splitPrice2 = str_replace(',', "", $splitPrice1);
            //echo "</br>Price: " . $splitPrice2;


            $patternBrand = "/\"brand\":\s.*,/";
            preg_match_all($patternBrand, $json, $matches);
            $splitBrand = explode(":", $matches[0][0])[1];
            $splitBrand1 = str_replace('"', "", $splitBrand);
            $splitBrand2 = str_replace(',', "", $splitBrand1);
            //echo "</br>Brand: " . $splitBrand2;

            $patternImg =  "/\"image\".*:\s.*,/";
            preg_match_all($patternImg, $exec, $matches);
            //echo "</br>" . $matches[0][0];
            $splitImg = explode(": ", $matches[0][0])[1];
            //echo "</br>" . $splitImg;
            $splitImg = str_replace('"', "", $splitImg);
            $splitImg = str_replace(',', "", $splitImg);
            //echo "</br>Img: " . $splitImg;
            echo $split2 . ' | ' . $splitBrand2 . ' | ' . $splitPrice2. ' | ' . $id . ' | ' . $splitImg;
            $insertProduct = "INSERT INTO  product (name, brand, price, iduser, imageUrl, url) 
              VALUES ('$split2', '$splitBrand2', '$splitPrice2', '$id', '$splitImg', '$url');";
            $result3 = $conn->query($insertProduct);
        
            if ($result3 === TRUE){
            echo "success";
            }
        
            else{
            echo "Error: " . $insertProduct . "<br>" . $conn->error;
            }

        }

             else {
            echo "Error: " . $insertUrl . "<br>" . $conn->error;
            }
            } else {
            echo "fail";
            } 
    

    $conn->close();
  }
  
?>
</body>
</html>