<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php
      session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板 - 投稿</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">

        <nav class="navbar navbar-light bg-light">
            <p class="h2">掲示板</p>
            <a href="/index.php" class="btn btn-outline-danger">戻る</a>
        </nav>

        <form action="/detail.php" method="POST">
			<div class="form-group">
				<label for="exampleFormControlInput1">Title</label>
				<input required name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="タイトル">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Content</label>
				<textarea required name="content" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">投稿</button>
		</form>
    </div>

  </body>
</html>
