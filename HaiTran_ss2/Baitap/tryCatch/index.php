<?php
function tryCatch($checkNumber)
{
    if ($checkNumber == 0)
        return false;
    return true;
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
    <style>
        div {
            border: 1px black solid;
        }

        table {
            border: 1px black solid;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $operator = $_POST["operator"];
}
if (tryCatch($number2)) {
    $number1 = (float)$number1;
    $number2 = (float)$number2;

    switch ($operator) {
        case 'Addition':
            $operation = ' + ';
            $result = $number1 + $number2;
            break;
        case 'Subtraction':
            $operation = ' - ';
            $result = $number1 - $number2;
            break;
        case 'Multiplication':
            $operation = ' x ';
            $result = $number1 * $number2;
            break;
        case 'Division':
            $operation = ' / ';
            $result = $number1 / $number2;
    };
} else
    echo "Ban hay nhap phan tu thu 2 khac 0!";
?>

<div>
    <form action="" method="post">
        <table>
            <h1>Simple Calculator</h1>
            <caption>Calculator</caption>
            <tr>
                <td>First operand</td>
                <td><input type="number" name="number1"></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td>
                    <select name="operator" id="">
                        <option name="addition" id="">Addition</option>
                        <option name="subtraction" id="">Subtraction</option>
                        <option name="multiplication" id="">Multiplication</option>
                        <option name="division" id="">Division</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Second operand</td>
                <td><input type="number" name="number2"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Calculate"></td>
            </tr>
        </table>
    </form>
    <h2>Result:</h2>
    <?php
    echo $result;
    ?>
</div>
</body>
</html>