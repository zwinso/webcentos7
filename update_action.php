<html>
<head>
</head>
<body>
	<?php
		$no = $_POST["board_no"];
		$user = $_POST["board_user"];
		$title = $_POST["board_title"];
		$content = $_POST["board_content"];
		$time = date("Y-m-d H:i:s");

		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "webadmin";
		$dbname = "webDB";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if($conn)
			echo "db is connect<br>";
		else
			die("db failed".mysqli_error($conn));

		$sql = "UPDATE webDB SET BTitle='".$title."', BContent='".$content."', BDate='".$time."' WHERE BID=".$no."";
		$result = mysqli_query($conn, $sql);

		if($result)
			echo "Success";
		else
			echo "FAILED".mysqli_error($conn);

		mysqli_close($conn);
		header("Location: http://192.168.1.130/board.php?currentPage=1");
	?>
</body>
</html>
