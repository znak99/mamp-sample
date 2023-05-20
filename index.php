<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php
      session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板 - PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">

      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">
          <p class="h2">掲示板</p>
        </a>
        <div class="btn-group" role="group" aria-label="Basic example">
          <?php
            if (isset($_SESSION['user'])) {
              echo "<a href='/create-post.php' class='btn btn-outline-primary'>投稿</a>";
              echo "<a href='/login.php' class='btn btn-outline-primary'>マイページ</a>";
              echo "<a href='/logout.php' class='btn btn-outline-primary'>ログアウト</a>";
            } else {
              echo "<a href='/login.php' class='btn btn-outline-primary'>ログイン</a>";
            }
            ?>
        </div>
        
      </nav>

      <div class="d-flex flex-column align-items-center justify-content-center">
        <?php
          $servername = "localhost";
          $username = "bulletin";
          $password = "bulletin";
          $dbname = "php_bulletin_board";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("MySQL接続失敗: " . $conn->connect_error);
          }

          $sql = "SELECT p.*, m.name FROM Posts p INNER JOIN members m ON p.member_id = m.member_id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $title = $row["title"];
              $content = $row["content"];
              $author = $row["name"];

              $maxContentLength = 100;
              $trimmedContent = mb_strimwidth($content, 0, $maxContentLength, '...');

              echo '<div class="card m-3 w-70 h-50">';
              echo '<div class="card-header">' . $title . '</div>';
              echo '<div class="card-body">';
              echo '<blockquote class="blockquote mb-0">';
              echo '<p>' . $trimmedContent . '</p>';
              echo '<footer class="blockquote-footer">' . $author . '</footer>';
              echo '</blockquote>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo "まだ投稿していません。";
          }

          $conn->close();
        ?>
      </div>
    </div>
  </body>
</html>
