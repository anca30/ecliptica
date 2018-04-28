<?php
	if (isset($_POST['signup'])) {
		$signUpInfo = explode("|", $_POST['signup']);
        $email = $signUpInfo[0];
        $firstname = $signUpInfo[1];
        $lastname = $signUpInfo[2];
        $passwd = $signUpInfo[3];
        $passwd2 = $signUpInfo[4];
        $address = $signUpInfo[5];
        $phone = $signUpInfo[6];

        $err = FALSE;

		$host="127.0.0.1";
		$port=3306;
		$socket="";
		$user="root";
		$password="root";
		$dbname="shop";

		$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
      
        $verifyUser = "SELECT email, password FROM users WHERE email = '$email'";
        $result = $conn->query($verifyUser);
        if($result->num_rows == 1) {
            $userErr = "This username exists! Please, choose another one!";
			$err = TRUE;
        } 

		if($passwd != $passwd2) {
			$passErr = "The passwords do not match!";
			$err = TRUE;
		}

		if($err !== TRUE) {
			$insertUser = "INSERT INTO Users (email, firstname, lastname, password, address, phone) 
							VALUES ('$email', '$firstname', '$lastname', '$passwd', '$address', '$phone');";
			$result = $conn->query($insertUser);

			if($result !== TRUE) {
				$userErr = "DB Error! Please, contact the admin!";
				echo $_POST['signup'];
			} else {
				session_start();
	            $_SESSION["email"] = $email;
				$_SESSION["firstname"] = $firstname;
				echo "success";
	            // header('Location: home.php');
			}
		} else {
			echo $userErr;
		}
    

	}
?>