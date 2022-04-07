<html>
	<head>
		<meta charset="utf-8">
		<title>ログインフォーム</title>
	</head>
	<body>
		こんにちは、<?php echo htmlspecialchars($_POST["name"]); ?>さん。
		<br>
		あなたは、<?php echo (int)$_POST["age"]; ?>歳です。	
	</body>
</html>