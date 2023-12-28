<?php
    $servername = "localhost";
    $dbname= "xss";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die;
    }

    if(isset($_POST['comment']) && $_POST['comment'] !== ''){
        $query = "INSERT INTO comments (comment) VALUES (?)";
        $stmt= $conn->prepare($query);
        $stmt->execute([$_POST['comment']]);
        echo 'نظر شما با موفقیت ثبت شد !';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
    <form class="row mt-4" action="index.php" method="post">
        <div class="mb-3">
            <label for="comment" class="form-label">Example textarea</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">submit</button>
        </div>
    </form>
    <div class="row">
        <ul>
            <?php
                $query= "SELECT * FROM comments;";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $comments= $stmt->fetchAll();
                foreach($comments as $comment){
            ?>
            <li><?= $comment['comment'] ?></li>
            <?php } ?>
        </ul>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>