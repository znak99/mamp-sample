<!DOCTYPE html>
<html lang="ja">
  <head>
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
        <a href="/login.php" class="btn btn-outline-primary">ログイン</a>
      </nav>

      <div class="d-flex flex-column align-items-center justify-content-center">
      <?php for ($i = 0; $i < 20; $i++): ?>
          <div class="card m-3">
            <div class="card-header">
              Quote
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
              </blockquote>
            </div>
          </div>
        <?php endfor ?>
        </div>
    </div>
  </body>
</html>
