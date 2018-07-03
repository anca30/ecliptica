<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require '../vendor/phpmailer/phpmailer/src/Exception.php';
	require '../vendor/phpmailer/phpmailer/src/SMTP.php';

	session_start();

	$GUSER = "emailforshop1066@gmail.com";
	$GPASS = "ShopShop123";

	function smtpmailer($to, $from, $from_name, $subject, $body) { 
		global $GUSER;
		global $GPASS;

		global $error;
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; 
		$mail->Username = $GUSER;  
		$mail->Password = $GPASS;           
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->IsHTML(true);

		$receivers = explode(" ", $to);

		for($i = 0; $i < count($receivers); $i++) {
			$mail->AddAddress($receivers[$i]);
		}

		if(!$mail->Send()) {
			$error = 'Mail error: '.$mail->ErrorInfo; 
			return $error;
		} else {
			$error = 'Message sent!';
			return "success";
		}
	}

	if (isset($_POST['emailList'])) {
    	$emailList = $_POST['emailList'];
    	$msg = "";    		

    	$db = include('C:\Apache24\htdocs\Shop\common\db.php');
		$total = 0;

		$conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket']) or die ('Could not connect to the database server' . mysqli_connect_error());
		$id = -1;
		$idQuery = "SELECT id, firstname, lastname FROM users WHERE email = '" . $_SESSION["email"] . "';";
		$result = $conn->query($idQuery);
		if($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$id = $row["id"];
			$firstname = $row["firstname"];
			$lastname = $row["lastname"];
			$msg = $msg . "Hi,<br><br> These are the products " . $firstname . " " . $lastname . " has ordered on Shop:<br><br>";
			$idProduct = -1;
			$idProductQuery = "SELECT idproduct, name, brand, price, imageUrl, url FROM product WHERE iduser = $id;";
			$result1 = $conn->query($idProductQuery);
			$idSum = "SELECT sum(price), price FROM product WHERE iduser = $id;";
			$res = $conn->query($idSum);
			$row2 = mysqli_fetch_array($res);
			$suma = $row2[0];
			$urlQuery = "SELECT url FROM url WHERE user = $id;";
			$resUrl = $conn->query($urlQuery);

			while($row3 = mysqli_fetch_assoc($resUrl)){
			  $url = $row3['url'];
			}

			$msg = $msg . "<table>
			<tr>
			<th>Name</th>
			<th>Brand</th>
			<th>Price</th>
			<th>Image</th>
			<th></th>
			</tr>";

			while($row = mysqli_fetch_assoc($result1)){
			  $msg = $msg .  "<tr>";
			  $msg = $msg .  "<td> <a href = '".$row['url']."'' target='_blank'>".$row['name']."</a> </td>";
			  $msg = $msg .  "<td>" . $row['brand'] . "</td>";
			  $msg = $msg .  "<td>" . $row['price'] . "</td>";
			  $msg = $msg .  "<td><img src='" . $row['imageUrl'] . "' width='56' height='56'></td>";
			  $msg = $msg .  "</tr>";
			}

			$msg = $msg .  '<tr>';
			$msg = $msg .  '<td>Total</td>';
			$msg = $msg .  '<td></td>';
			$msg = $msg .  '<td>' . round($suma, 2) . '</td>';
			$msg = $msg .  '<td></td>';
			$msg = $msg .  '</tr>';
			$msg = $msg .  "</table>";
			$msg = $msg . "<br><br> Your friends at<br>Shop";

			echo smtpmailer($emailList, $GUSER, "Shop", "Your friend's Shopping List", $msg);
	    }
    }
?>