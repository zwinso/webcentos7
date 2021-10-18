<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
	<?php
		$no = $_GET["no"];
	?>
	<form action="/delete_action.php" method="post">
		<table class="table table-bordered" style="width:10%">	
			<tr>	
				<td>
					<input type="hidden" name="board_no" value="<?php echo $no ?>">
				</td>
			</tr>
			<tr>
				<td><button class="btn btn-primary" type="submit">Delete</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src=/js/bootstrap.js"></script>
</body>
</html>
