<?php
	if (isset($_POST['login'])) {
		$loginInfo = explode(" ", $_POST['login']);
        $email = $loginInfo[0];
        $passwd = $loginInfo[1];

		$host="127.0.0.1";
		$port=3306;
		$socket="";
		$user="root";
		$password="root";
		$dbname="shop";

		$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		$err = "";

		$verifyUser = "SELECT firstname, lastname, email, password 
						FROM Users
						WHERE email = '$email' AND password = '$passwd';";
		$result = $conn->query($verifyUser);

		if($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			session_start();
			$_SESSION["email"] = $row["email"];
			echo "success";
		} else {
			echo "fail";
		}
	}
	
?>