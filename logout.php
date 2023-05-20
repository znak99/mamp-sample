<?php
session_start();

// 세션을 파기하여 로그아웃 처리
session_destroy();

// 로그아웃 후 리다이렉트할 페이지로 이동
header('Location: index.php');
exit();
?>
