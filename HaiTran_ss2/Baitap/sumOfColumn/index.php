<?php
$arr = [];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $columnNeeded = (int)$_POST["columnNeeded"];
    $column = (int)$_POST["column"];
    $row = (int)$_POST["row"];
}
$sum = 0;
for($i = 0; $i < $row; $i++) {
    $arr[$i] = [];
    for ($j = 0; $j < $column; $j++) {
        $arr[$i][$j] = (float)$_POST[$i . '' . $j];
        if ($j == $columnNeeded)
            $sum += $arr[$i][$j];
    }
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
        <p>Enter number of row in array: </p>
        <input type="number" name="row" value="<?php echo $row ?>">
        <p>Enter number of column in array: </p>
        <input type="number" name="column" value="<?php echo $column ?>">
        <p>Enter column to caculate sum: </p>
        <input type="number" name="columnNeeded" value="<?php echo $columnNeeded ?>">
        <input type="submit" value="Submit"><br>
        <?php
        if (!empty($_POST["row"]) && !empty($_POST["column"])):
            ?>
            <?php
            for ($i = 0; $i < $row; $i++):
                for ($j = 0; $j < $column; $j++):
                    ?>
                    <input type="text" name="<?php echo $i.''.$j ?>" value="<?php echo $arr[$i][$j] ?>">
                <?php endfor;?>
                <br>
            <?php
            endfor;
            ?>
        <?php
        endif;
        ?>
    </form>
    <?php if (!empty($arr)) :?>
        <p>Sum of column <?php echo $columnNeeded?> : </p>
        <?php echo $sum?>
    <?php endif; ?>
</div>
</body>
</html>