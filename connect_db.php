<?php
	$dsn = "sqlite:/var/www/html/php_app/login.db"; //データベースの場所指定

	$name = $_POST["name"];
	$password = $_POST["pass"];

	try {
		$dbh = new PDO($dsn); //オブジェクト作成
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM people WHERE name = :name AND password = :password' ; //prepareメソッドの場合、SQLの一部を引数で変更することができる
		$stmt = $dbh -> prepare($sql); //SQL文の準備
		$stmt -> bindParam(":name", $name); //パラメータを固定
		$stmt -> bindParam(":password", $password);
		$check = $stmt -> execute(); //SQL文実行、stmtに結果を格納
		$res = $stmt -> fetchAll();  //結果の処理
		
		if (!$check) {
			echo "入力に誤りがあります";
		}


	} catch(PDOException $e){ //データベースと接続失敗した場合、PDOExceptionという例外を投げる
		exit(mb_convert_encoding($e->getMessage(), "UTF-8", "SJIS-win"));
		die();
	}
?>

<hmtl lang="ja">
	<head>
		<title>test</title>
	</head>
	<body>
		<?php foreach ($res as list($id_item, $name_item, $pass_item)): ?>
			<?php echo "ID : " . $id_item . "<br>名前 : " . $name_item . "<br>パスワード: " . $pass_item; ?>
		<?php endforeach; ?>
	</body>
</html>