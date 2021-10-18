<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="/jquery/jquery.placeholder.js"></script>
	<link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
	<form class="form-horizontal" action="/write_add.php" method="post">
		<div class="form-group">
			<label for="inputTitle" class="col-sm-2 control-label">제목 : </label>
			<div class="col-sm-10">
				<input class="form-control" name="boardTitle" id="Title" type="text" placeholder="Title"/>
			</div>
		</div>
		<div class="form-group">
			<label for="inputContent" class="col-sm-2 control-label">내용 : </label>
			<div class="col-sm-10">
				<textarea class="form-control" name="boardContent" id="Content" row="5" cols="50" placeholder="Content"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">작성자명 : </label>
			<div class="col-sm-10">
				<input class="form-control" name="boardUser" id="name" type="text" placeholder="name"/>
			</div>
		</div>
		<div>
			<button class="btn btn-primary" type="submit" value="글쓰기">글쓰기</button>
			<button class="btn btn-primary" type="reset" value="초기화">초기화</button>
			<a class="btn btn-primary" href="/borad.php?currentPage=1">Prev</a>
		</div>
	</form>
	<script type="text/javascript">
		$("#Title").change(function(){
			checkTitle($('#Title').val());
		});
		$("#Content").change(function(){
			checkContent($('#Content').val());
		});
		$("#name").change(function(){
			checkName($('#name').val());
		});

		function checkTitle(Title){
			if(Title.length < 2){
				alert('write more title');
				$('#Title').val('').focus();
				return false;
			} else {
				return true;
			}
		}
		function checkContent(Content){
			if(Content.length < 2){
				alert('write more content');
				$('#Content').val('').focus();
				return false;
			} else {
				return true;
			}
		}
		function checkName(name){
			if(name.length < 2){
				echo "write more name";
				$('#name').val('').focus();
				return false;
			} else {
				return ture;
			}
		}
	</script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>
