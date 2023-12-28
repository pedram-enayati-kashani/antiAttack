<?php 
session_set_cookie_params(0 , '/' , 'localhost' , true , true);
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_SESSION['user']) && $_SESSION['user']){

    echo 'hi panel';
    
    }
    else{
    echo 'please login';
    }   
?>

<script>
    let myCookue = document.cookie;
    alert(myCookue);
</script>
</body>
</html>
