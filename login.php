<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>掲示板 - ログイン</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid">

			<nav class="navbar navbar-light bg-light">
				<p class="h2">掲示板</p>
				<a href="/" class="btn btn-outline-danger">戻る</a>
			</nav>

			<form>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="メールアドレス">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード">
				</div>
				<div class="d-flex justify-content-between">
					<button type="submit" class="btn btn-primary">ログイン</button>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="" class="btn btn-outline-info mx-2">会員登録</a>
						<a href="" class="btn btn-outline-info mx-2">パスワードを忘れた</a>
					</div>
				</div>
			</form>

		</div>
	</body>
</html>
