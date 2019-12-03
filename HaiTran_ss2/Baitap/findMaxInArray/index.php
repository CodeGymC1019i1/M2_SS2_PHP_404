<?php
if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $row = $_POST["row"];
    $column = $_POST["column"];
    $xa = $row.''.$column;
    $matrix=[];
    if(!empty($_POST["00"])) {
        $max = $_POST['00'];
        for ($i = 0; $i < $row; $i++) {
            $matrix[$i] = [];
            for ($j = 0; $j < $column; $j++) {
                $matrix[$i][$j] = $_POST[$i.''.$j];
                if ($max < $matrix[$i][$j])
                    $max = $matrix[$i][$j];
            }
        }
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
        <fieldset>
            <legend>Find Max In Matrix</legend>
            Number of Row: <input type="text" name="row" value=" <?php echo $_POST["row"] ?>">
            Number of Collumn: <input type="text" name="column" value=" <?php echo $_POST["column"] ?> ">
            <input type="submit" name="next" value="Next">
        </fieldset>
        <table border="0">
            <caption><h2>Matrix</h2></caption>
            <?php if(!empty($row) && !empty($column)):?>
                <tr>
                    <td class="message">No elemental in matrix</td>
                </tr>
            <?php endif ?>
            <?php for($indexRow = 0; $indexRow < $row; $indexRow++ ): ?>
            <tr>
                <?php for ($indexColumn = 0; $indexColumn < $column; $indexColumn++): ?>
                <td><input type="number" name="<?php echo $indexRow.''.$indexColumn;?>"></td>
                <?php endfor; ?>
            </tr>
        </table>
        <?php endfor; ?>
        <h2>Max in matrix: </h2>
        <?php echo $max; ?>
    </form>
</div>
</body>
</html>