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

        
    

	<?php
		session_start();

		$host = 'localhost';
		$username = 'bulletin';
		$password = 'bulletin';
		$dbname = 'php_bulletin_board';

		$conn = new mysqli($host, $username, $password, $dbname);

		if ($conn->connect_error) {
            die("MySQL接続失敗: " . $conn->connect_error);
        }

		$title = $_POST['title'];
		$content = $_POST['content'];
		$created_at = date('Y-m-d H:i:s');
		$member_id = $_SESSION['user'];

		$sql = "INSERT INTO Posts (member_id, title, content, created_at) VALUES ('$member_id', '$title', '$content', '$created_at')";

		if ($conn->query($sql) === TRUE) {
			echo '<div class="form-group">';
			echo '<label for="exampleFormControlInput1">Title</label>';
			echo '<input disabled name="title" type="text" class="form-control" id="exampleFormControlInput1" value="'.$title.'">';
			echo '</div>';
			echo '<div class="form-group">';
			echo '<label for="exampleFormControlTextarea1">Content</label>';
			echo '<textarea disabled name="content" class="form-control" id="exampleFormControlTextarea1" rows="5">'.$content.'</textarea>';
			echo '</div>';
			echo "投稿成功";
		} else {
			echo "投稿失敗: " . $conn->error;
		}

		$conn->close();
		?>
	</div>

  </body>
</html>
