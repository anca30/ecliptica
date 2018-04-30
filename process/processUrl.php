<?php

# Use the Curl extension to query Google and get back a page of results
$url = "http://www.elefant.ro/carti/carte/biografii-si-memorii/calatorii-prin-europa-250120.html";
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);

# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
@$dom->loadHTML($html);

# Iterate over all the <a> tags
foreach($dom->getElementsByTagName('h1') as $link) {
        # Show the <a href>
  $classy = $link->getAttribute("class");
               if (strpos($classy, "title") !== false)
               {
                       echo $link->nodeValue;
                       echo '<br>';
               }
        // echo $link->getAttribute('href');
        // echo "<br />";
}
foreach($dom->getElementsByTagName('div') as $link) {
        # Show the <a href>
  $classy = $link->getAttribute("class");
               if (strpos($classy, "brand") !== false)
               {
                       echo $link->nodeValue;
                       echo '<br>';
               }
        // echo $link->getAttribute('href');
        // echo "<br />";
}
?>