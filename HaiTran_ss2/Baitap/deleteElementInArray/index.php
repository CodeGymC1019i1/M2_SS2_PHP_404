<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $numberCheck = $_POST["number"];
    }

    $arr = [1, 3, 4, 5, 7, 9, 3, 11, 26];
    $numberCheck = (int) $numberCheck;

    for($i = 0; $i < count($arr); $i++)
        if($arr[$i] == $numberCheck) {
            echo 'a';
            array_splice($arr, $i, 1);
        }
        var_dump($arr);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <form method="post">
        <input type="number" name="number">
        <input type="submit" value="Delete">
    </form>
</div>
</body>
</html>