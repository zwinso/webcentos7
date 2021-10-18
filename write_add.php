<html>
<head>
</head>
<body>
	<?php
		$board_title = $_POST["boardTitle"];
		$board_content = $_POST["boardContent"];
		$board_user = $_POST["boardUser"];
		
		echo $board_title."<br>";
		echo $board_content."<br>";
		echo $board_user."<br>";
		echo date("Y-m-d H:i:s");
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "webadmin";
		$dbname = "webDB";
		
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if($conn)
			echo "<br>db connect";
		else
			die("db is not connect".mysqli_error($conn));
		
		$time = date("Y-m-d H:i:s");
		$findBid = "select BID from webDB order by BID desc limit 1";
		
		$Bid = mysqli_query($conn, $findBid);
		if($Bid)
			echo "<br>bid<br>";
		else
			echo "<br>bid fail<br>";
		$board_BID = $Bid->fetch_assoc();
		echo $board_BID['BID'];

		$sql = "INSERT INTO webDB(BID, BTitle, userID, BDate, BContent) VALUES ('".($board_BID['BID']+1)."', '".$board_title."', '".$board_user."','".$time."', '".$board_content."')";

		$result = mysqli_query($conn, $sql);

		if($result)
			echo "<br>success<br>";
		else
			echo "<br>Fail<br>".mysqli_error($conn);

		mysqli_close($conn);

		header("Location: http://192.168.1.126/board.php?currentPage=1");
	?>

</body>
</html>
