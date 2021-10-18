<html>
<head>
</head>
<body>
	<?php
		$no = $_POST["no"];
		echo $no;
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "webadmin";
		$dbname = "webDB";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if($conn)
			echo "db is connect<br>";
		else
			die("db Failed".mysqli_connect_error());

		$sql = "DELETE FROM webDB WHERE BID='".$no."'";

		if(mysqli_query($conn, $sql))
			echo "Success";
		else
			echo "Delete Fail".mysqli_error($conn);

		mysqli_close($conn);

		//header("Location: http://192.168.1.126/board.php?currentPage=1");
	?>
</body>
</html>
