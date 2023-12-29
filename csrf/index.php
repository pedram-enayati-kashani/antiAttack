<?php
    session_start();
    if(empty($_SESSION['token'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    $token= $_SESSION['token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="article/delete" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        <input type="hidden" name="id" value="1">
        <button type="submit">delete</button>
    </form>
</body>
</html>