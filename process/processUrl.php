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
      $insertUrl = "INSERT INTO  url (url, user) VALUES ('$url', '$id');";
      if ($conn->query($insertUrl) === TRUE) {
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

        $insertTitle = "INSERT INTO  product (name, brand, price, iduser, imageUrl) 
              VALUES ('$title4', '$brand4', '$price4', '$id', '$image4');";
        $result2 = $conn->query($insertTitle);
        if ($result2 === TRUE){
          echo "success";
        }
        else{
          echo "Error: " . $insertTitle . "<br>" . $conn->error;
        }
      } else {
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