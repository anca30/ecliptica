  <?php
      session_start();
      $db = include('C:\Apache24\htdocs\Shop\common\db.php');
      function getPrice($url) {
        global $db;
        $conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket'])
        or die ('Could not connect to the database server' . mysqli_connect_error());

        $id = -1;
        $idQuery = "SELECT id FROM users WHERE email = '" . $_SESSION["email"] . "';";
        $result = $conn->query($idQuery);
        if($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $id = $row["id"];
          if(strpos($url, 'elefant') !== false){
              $headers = array(
              "Accept-Language: en-us",
              "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
              "Connection: Keep-Alive",
              "Cache-Control: no-cache"
              );

              $referer = 'http://www.google.com/search';

              $get = curl_init($url);

              curl_setopt($get, CURLOPT_HTTPHEADER, $headers); 
              curl_setopt($get, CURLOPT_REFERER, $referer);
              curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);

              $html = curl_exec($get);

              curl_close($get);

              if(strpos($html, 'Redirecting')) {
                preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $html, $matches);
                $newUrl = "http://www.elefant.ro" . $matches[2][0];

                $get = curl_init($newUrl);
                curl_setopt($get, CURLOPT_HTTPHEADER, $headers); 
                curl_setopt($get, CURLOPT_REFERER, $referer);
                curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);
                $html = curl_exec($get);
              }

              $patternPrice = "/\'price\':\s.*,/";
              preg_match_all($patternPrice, $html, $matches);
              $splitPrice = explode(" ", $matches[0][0]);
              $price = $splitPrice[1];
              $price1 = str_replace('\x20', " ", $price);
              $price2 = str_replace('\x2D', "-", $price1);
              $price3 = str_replace("'", " ", $price);
              $price4 = substr_replace($price3, "", -1);

              return $price4;
          } else if(strpos($url, 'cora') !== false){
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

            $get = curl_init($url);
            curl_setopt($get, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept-Language: en_US')); 

            curl_setopt($get, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt($get, CURLOPT_REFERER, $referer);

            curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($get, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($get, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($get, CURLOPT_HEADER,1); 
            curl_setopt($get, CURLOPT_VERBOSE,true); 

            $exec = curl_exec($get);
            
            curl_close($get);
            
            $patternPrice = "/price.*:.*,/";
            preg_match_all($patternPrice, $exec, $matches);
            $splitPrice = explode(",", $matches[0][0])[0];
            $splitPrice = explode(":", $splitPrice)[1];
            $splitPrice1 = str_replace('"', "", $splitPrice);
            $splitPrice2 = str_replace(',', "", $splitPrice1);

            return $splitPrice2;

        }  else if(strpos($url, 'emag') !== false){
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

            $get = curl_init($url);
            curl_setopt($get, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept-Language: en_US')); 

            curl_setopt($get, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt($get, CURLOPT_REFERER, $referer);

            curl_setopt($get, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($get, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($get, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($get, CURLOPT_HEADER,1); 
            curl_setopt($get, CURLOPT_VERBOSE,true); 

            $exec = curl_exec($get);
            curl_close($get);
          
            $patternPrice = "/\"price\":\s.*,/";
            preg_match_all($patternPrice, $exec, $matches);
            $splitPrice = explode(":", $matches[0][0])[1];
            $splitPrice1 = str_replace('"', "", $splitPrice);
            $splitPrice2 = str_replace(',', "", $splitPrice1);

            return $splitPrice2; 
        }
    }}

      if (isset($_POST['getProducts'])) {
        $total = 0;

        $conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket']) or die ('Could not connect to the database server' . mysqli_connect_error());
        $id = -1;
        $idQuery = "SELECT id FROM users WHERE email = '" . $_SESSION["email"] . "';";
        $result = $conn->query($idQuery);
       if($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $id = $row["id"];
          
          $idProduct = -1;
          $idProductQuery = "SELECT idproduct, name, brand, price, imageUrl, url FROM product WHERE iduser = $id;";
          $result1 = $conn->query($idProductQuery);
          $urlQuery = "SELECT url FROM url WHERE user = $id;";
          
          $resUrl = $conn->query($urlQuery);

          while($row3 = mysqli_fetch_assoc($resUrl)){
            $url = $row3['url'];
          }

          $productsTable = "";
          $productsTable = $productsTable . "<table id=\"productsTable\">
          <tr>
          <th>Name</th>
          <th>Brand</th>
          <th>Price</th>
          <th>Image</th>
          <th></th>
          </tr>";

          while($row = mysqli_fetch_assoc($result1)){
            $productsTable = $productsTable .  "<tr>";
            $productsTable = $productsTable .  "<td> <a href = '".$row['url']."'' target='_blank'>".$row['name']."</a> </td>";
            $productsTable = $productsTable .  "<td>" . $row['brand'] . "</td>";

            $newPrice = round(doubleval(getPrice($row['url'])), 2);
            $oldPrice = round(doubleval($row['price']), 2);

            $arrowImg = '';
            if ($newPrice > $oldPrice) {
              $arrowImg = '<img src="images/arrowup.png" width="16" height="10">';

              $updatePriceQuery =  "UPDATE product SET price = " . $newPrice . " WHERE idproduct = " . $row['idproduct'] . ";";
              if ($conn->query($updatePriceQuery) !== TRUE) {
                  echo "fail";
              }
            } else if ($newPrice < $oldPrice) {
              $arrowImg = '<img src="images/arrowdown.png" width="16" height="10">';

              $updatePriceQuery =  "UPDATE product SET price = " . $newPrice . " WHERE idproduct = " . $row['idproduct'] . ";";
              if ($conn->query($updatePriceQuery) !== TRUE) {
                  echo "fail";
              }
            } else {
              $arrowImg = '<img src="images/arrowright.png" width="16" height="10">';
            }

            $productsTable = $productsTable .  "<td style=\"text-align: right; width: 130px;\">" . $newPrice . " " . $arrowImg ."</td>";

            
            $productsTable = $productsTable .  "<td><img src='" . $row['imageUrl'] . "' width='56' height='56'></td>";
            $productsTable = $productsTable .  '<td><label class="checkboxContainer">
            <input type="checkbox" name="bifat" id ="' . $row['idproduct'] . '">
            <span class="checkmark"></span>
            </label></td>';
            $productsTable = $productsTable .  "</tr>";
          }
        
          $idSum = "SELECT sum(price) FROM product WHERE iduser = $id;";
          $res = $conn->query($idSum);
          $row2 = mysqli_fetch_array($res);
          $suma = $row2[0];
        
          $productsTable = $productsTable .  '<tr>';
          $productsTable = $productsTable .  '<td>Total</td>';
          $productsTable = $productsTable .  '<td></td>';
          $productsTable = $productsTable .  '<td style="text-align: right; width: 130px;">' . round($suma, 2) . '<img src="images/noop.jpg" width="16" height="10">' . '</td>';
          $productsTable = $productsTable .  '<td></td>';
          $productsTable = $productsTable .  '<td></td>';
          $productsTable = $productsTable .  '</tr>';
          $productsTable = $productsTable .  "</table>";

          echo $productsTable;
      }
    }

?>