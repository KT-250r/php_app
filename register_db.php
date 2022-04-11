<?php
    $name = (string)$_POST["name"];
    $pass = (string)$_POST["pass"];

    $dsn = "sqlite:/var/www/html/php_app/login.db";

    try {
        $dbh = new PDO($dsn);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO people (name, password) VALUES(:name, :password)';
        $stmt = $dbh -> prepare($sql);
        //エラー確認のif文
        $stmt -> bindParam(":name", $name);
        $stmt -> bindParam(":password", $pass);
        $check = $stmt -> execute();

        if ($check){
            echo "True";
        }else{
            echo "False";
        }

        // $res = $stmt -> fetchAll();
    } catch(PDOException $e){
        exit(mb_convert_encoding($e -> getMessage(), 'UTF-8', 'SJIS-win'));
        die();
    }

?>

<html lang="ja">
    <head>
        <title>登録完了</title>
    </head>
    <body>
        <h1>登録が完了しました</h1>
        <a href="./index.html">ログインはこちら</a>
        <?php //foreach ($res as list($name_item, $pass_item)): ?>
	    	<?php //echo $name_item . "<br>" . $pass_item; ?>
		<?php //endforeach; ?>
    </body>
</html>
