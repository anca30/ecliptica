<? php

	if (isset($_POST['currentTabUrl'])) {

		$url = $_POST['currentTabUrl'];

		$host="127.0.0.1";
		$port=3306;
		$socket="";
		$user="root";
		$password="root";
		$dbname="shop";

		$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());

		$insertQuery = "INSERT INTO url VALUES (" . $url . ");";

		if ($conn->query($insertQuery) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $insertQuery . "<br>" . $conn->error;
		}

		$conn->close();

	}
?>