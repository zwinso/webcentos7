<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
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


	$dataCount = "SELECT * FROM webDB;";
	$resultCount = mysqli_query($conn, $dataCount);
	$count = mysqli_num_rows($resultCount);
	if($count)
		echo '$count : '.$count.'<br>';
	else
		echo "count error : ".mysqli_error($conn);

	$currentPage = 1;
	echo $currentPage."<br>\n";
	$currentPage = $_GET["currentPage"];
	echo $currentPage."<br>\n";
	if(isset($currentPage)){
		$currentPage = $_GET["currentPage"];
	} else {
		echo "currentPage isset func error<br>\n";
	}
	
	$rowPerPage = 10;
	$begin = ($currentPage -1) * $rowPerPage;
	$sql = "SELECT BID, BTitle, userID, BDate, BContent FROM webDB order by BID desc limit ".$begin.",".$rowPerPage."";
	$result = mysqli_query($conn, $sql);
	
?>

	<table class=table table-bordered">
		<tr>
			<td>번호</td>
			<td>제목</td>
			<td>글쓴이</td>
			<td>작성일</td>
		</tr>
		
		<?php
			while($row = mysqli_fetch_array($result)){
		?>

		<tr>
			<td>
				<?php
					echo $row["BID"];
				?>
			</td>
			<td>
				<?php
					echo "<a href='/board_detail.php?no=".$row["BID"]."'>";	
					echo $row["BTitle"];
					echo "</a>";
				?>
			</td>
			<td>
				<?php
					echo $row["userID"];
				?>
			</td>
			<td>
				<?php
					echo $row["BDate"];
				?>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<?php
		if($currentPage > 1) {
			echo "<a class='btn btn-primary' href='/board.php?currentPage=".($currentPage-1)."'>이전</a>";
		}
		$lastPage = ($count-1) / $rowPerPage;

		if(($count-1) % $rowPerPage != 0){
			$lastPage += 1;
		}

		if($currentPage < floor($lastPage)) {
			echo "<a class='btn btn-primary' style='margin-left:60px' href='/board.php?currentPage=".($currentPage+1)."'>다음</a>";
		}
		mysqli_close($conn);
	?>
	<a class="btn btn-primary" href="/write.php" style="float:right;">글쓰기</a>
	<br><br><br><br><br>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
