<?php 

session_start();
// session_regenerate_id(); /* every refresh make a new session id */
session_regenerate_id(true); /* every refresh delete old session id and make a new session id */

if(isset($_SESSION['active'])){
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre><br>';

    echo 'hello '.$_SESSION['firstName'].' '.$_SESSION['lastName'].'<br>';
    echo 'شما با عنوان '.$_SESSION['userName'].' وارد شده اید';
    exit;
}

if(isset($_REQUEST['username']) && $_REQUEST['username'] !== '' &&
isset($_REQUEST['password']) && $_REQUEST['password'] !== ''){
    $username = 'pedramek';
    $password = '1234';
    $firstName = 'pedram';
    $lastName= 'enayati';

    if($_REQUEST['username'] == $username && $_REQUEST['password'] == $password){
        $_SESSION['userName'] = $username;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['active'] = true;

        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre><br>';

        echo 'hello '.$_SESSION['firstName'].' '.$_SESSION['lastName'].'<br>';
        echo 'شما با عنوان '.$_SESSION['userName'].' وارد شده اید';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="row mt-4" action="login.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Example textarea</label>
            <input type="text" name='username' id="username" placeholder="ali">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Example textarea</label>
            <input type="password" name='password' id="password" placeholder="******">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">login</button>
        </div>
    </form>
</body>
</html>