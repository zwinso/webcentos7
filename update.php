<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
	<?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "webadmin";
		$dbname = "webDB";
	
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
		if($conn)
			echo "db is connect";
		else
			die("db failed".mysqli_error($conn));
	
		$no = $_GET["no"];
	
		$sql = "SELECT BID, BTitle, userID, BDate, BContent FROM webDB WHERE BID = '".$no."'";
	
		$result = mysqli_query($conn, $sql);
		if($row = mysqli_fetch_array($result)){
	?>
	<br>
	<form action="/update_action.php" method="post">
		<table class="table table-bordered" style="width:30%">
			<tr>
				<td style="width:10%">글번호</td>
				<td style="width:20%"><input type="text" name="board_no" value="<?php echo $row["BID"]?>" readonly></td>
			</tr>
			<tr>
				<td style="width:10%">작성자</td>
				<td style="width:20%"><input type="text" name="board_user" value="<?php echo $row["userID"]?>" readonly></td>
			</tr>
			<tr>
				<td style="width:10%">제목</td>
				<td style="width:20%"><input type="text" name="board_title" value="<?php echo $row["BTitle"]?>"></td>
			</tr>
			<tr>
				<td style="width:10%">내용</td>
				<td style="width:20%"><input type="text" name="board_content" value="<?php echo $row["BContent"]?>"></td>
			</tr>
		</table>
	<br>
	<?php
		}
		mysqli_close($conn);
	?>
		&nbsp;&nbsp;&nbsp;
		<button class="btn btn-primary" type="submit">edit</button>
		
		<a class="btn btn-primary" href="/board.php?currentPage=1">Prev</a>
	</form>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
</bdoy>
</html>
