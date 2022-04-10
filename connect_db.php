<?php
	$dsn = "sqlite:/var/www/html/php_app/login.db"; //データベースの場所指定
	$id = 1;

	try {
		$dbh = new PDO($dsn); //オブジェクト作成
		$sql = "select * from people where member_id = :id"; //prepareメソッドの場合、SQLの一部を引数で変更することができる
		$stmt = $dbh -> prepare($sql); //SQL文の準備
		$stmt -> bindParam(":id", $id); //パラメータを固定
		$stmt -> execute(); //SQL文実行、stmtに結果を格納
		$rec = $stmt -> fetchAll();  //結果の処理
	} catch(PDOException $e){ //データベースと接続失敗した場合、PDOExceptionという例外を投げる
		exit(mb_convert_encoding($e->getMessage(), "UTF-8", "SJIS-win"));
		die(); //必要か分からん
	}

	// function printItem($str){
	// 	return htmlspecialchars($str, ENT_QUOTES, "utf-8");
	// }
?>

<hmtl lang="ja">
	<head>
		<title>test</title>
	</head>
	<body>
		<?php foreach ($rec as list($id_item, $name_item, $pass_item)): ?>
			<?php echo $id_item . "<br>" . $name_item . "<br>" . $pass_item; ?>
		<?php endforeach; ?>
	</body>
</html>