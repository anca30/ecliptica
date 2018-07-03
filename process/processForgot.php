<?php
	session_start();
	if (isset($_POST['reset'])) {
		$resetInfo = explode(" ", $_POST['reset']);
        $email = $resetInfo[0];
        $passwd = $resetInfo[1];
        $passwd2 = $resetInfo[2];

		$host="127.0.0.1";
		$port=3306;
		$socket="";
		$user="root";
		$password="root";
		$dbname="shop";

		$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		$err = "";

		$verifyUser = "SELECT email, password FROM users WHERE email = '$email'";
		$result = $conn->query($verifyUser);

		if($result->num_rows == 0) {
			$userErr = "This email does not exist! Try again!";
			$err = TRUE;
		} 

		if($passwd != $passwd2) {
			$passErr = "The passwords do not match!";
			$err = TRUE;
		}

		if($user == "") {
			$userErr = "Required field";
			$err = TRUE;
		}

		if($passwd == "") {
			$passErr = "Required field";
			$err = TRUE;
		}
		
		if($err !== TRUE) {
			$changePasswd = "UPDATE users SET password='$passwd' WHERE email='$email';";
			$result = $conn->query($changePasswd);

			if($result !== TRUE) {
				$userErr = "DB Error! Please, contact the admin!";
			}

			$_SESSION['email'] = $email;

			echo "success";
		} else {
			echo "fail";
		}
	}
?>