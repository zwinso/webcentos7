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
			echo "db is connect<br>\n";
		else
			die("db is not connect<br>\n".mysqli_error());

		$no = $_GET["no"];
		
		$sql = "select BID, BTitle, userID, BContent, BDate FROM webDB where BID = '".$no."'";
		$result = mysqli_query($conn, $sql);
	?>
		<table class="table table-bordered">
			<?php
				if($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td>작성자</td>
				<td>
					<?php
						echo $row["userID"];
					?>
				</td>
			</tr>
			<tr>
				<td>제목</td>
				<td>
					<?php
						echo $row["BTitle"];
					?>
				</td>
				<td>글번호</td>
				<td>
					<?php
						echo $row["BID"];
					?>
				</td>
				<td>작성일</td>
				<td>
					<?php
						echo $row["BDate"];
					?>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $row["BContent"];
					?>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		<br>
		<div style="display:flex">
		<a class="btn btn-primary" href="/board.php?currentPage=1" style="height:38px">Prev</a>
		<form action="/delete_action.php" method="post" style="margin-left:10px">
			<button class="btn btn-primary" name="no" value="<?php echo $no ?>" type="submit">Delete
		</form>
		</div>
		<script type="text/javascript" src="js/bootstrap.js"></script>

</bdoy>
</html>
