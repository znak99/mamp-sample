<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板 - 会員登録</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">

        <nav class="navbar navbar-light bg-light">
            <p class="h2">掲示板</p>
            <a href="/login.php" class="btn btn-outline-danger">戻る</a>
        </nav>

        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputName">Username</label>
                <input required name="name" type="text" class="form-control" id="exampleInputName"
                    placeholder="ユーザーネーム">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input required name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="メールアドレス">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input required name="password" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="パスワード">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword">Password check</label>
                <input required name="confirm_password" type="password" class="form-control"
                    id="exampleInputConfirmPassword" placeholder="パスワード再入力">
            </div>

            <button type="submit" class="btn btn-primary">会員登録</button>
        </form>

        <?php
        session_start();

        $servername = "localhost";
        $username = "bulletin";
        $password = "bulletin";
        $dbname = "php_bulletin_board";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("MySQL接続失敗: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                echo 'パスワードが一致していません。';
            } else {
                $query = "SELECT * FROM members WHERE email = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "すでに登録されているメールアドレスです。";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $insertQuery = "INSERT INTO members (name, email, password) VALUES (?, ?, ?)";
                    $insertStmt = $conn->prepare($insertQuery);
                    $insertStmt->bind_param("sss", $name, $email, $hashedPassword);

                    if ($insertStmt->execute()) {
                        header('Location: login.php');
                        exit();
                    } else {
                        echo "会員登録エラー";
                    }
                }
            }
        }
        ?>
    </div>
</body>
</html>
