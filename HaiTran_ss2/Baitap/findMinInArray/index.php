<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $lengthArray = $_POST["lengthArray"];
}
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
        <p>Enter length of array:</p>
        <input type="number" name="lengthArray" value="<?php echo $lengthArray ?>">
        <?php
        for ($i = 0; $i < $lengthArray; $i++):
            ?>
            <p>Enter element <?php echo $i ?> :</p>
            <input type="number" name="<?php echo $i ?>" value="">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $arr[$i] = $_POST['' . $i];
            }
            ?>
        <?php endfor; ?>
        <input type="submit" value="Next">
    </form>
    <div>
        <?php
        $min = $arr[0];
        for ($i = 0; $i < $lengthArray; $i++)
            if ($min > $arr[$i])
                $min = $arr[$i];
        echo 'Min of array: '.$min;
        ?>
    </div>
</div>
</body>
</html>