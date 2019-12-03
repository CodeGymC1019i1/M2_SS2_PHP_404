<?php
$matrix = [];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $size = (int)$_POST["size"];
}
$sum = 0;
for($i = 0; $i < $size; $i++) {
    $matrix[$i] = [];
    for ($j = 0; $j < $size; $j++) {
        $matrix[$i][$j] = (float)$_POST[$i . '' . $j];
        if ($i == $j)
            $sum += $matrix[$i][$j];
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
        <p>Enter size of matrix: </p>
        <input type="number" name="size" value="<?php echo $size ?>">
        <input type="submit" value="Submit"><br>
        <?php
        if (!empty($_POST["size"])):
        ?>
        <?php
        for ($i = 0; $i < $size; $i++):
            for ($j = 0; $j < $size; $j++):
        ?>
        <input type="text" name="<?php echo $i.''.$j ?>" value="<?php echo $matrix[$i][$j] ?>">
        <?php endfor;?>
        <br>
        <?php
            endfor;
        ?>
        <?php
        endif;
        ?>
    </form>
    <?php if (!empty($matrix)) :?>
    <p>Sum of main diagonal: <?php echo $sum?></p>
    <?php endif; ?>
</div>
</body>
</html>