<?php
$index = (int)$_GET['index'];

$data = file_get_contents('users.json');
$data_array = json_decode($data, true);

$row = $data_array[$index];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        div{
            height: 150px;
            width: 300px;
            margin: 0;
            padding: 10px;
            border: 1px #CCC solid;
        }
    </style>
</head>
<body>
<button><a href="index.php">Back</a></button>
<div>
    <form method="POST">
        <table>
            <tr>
            <td>User name: </td>
            <td><input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"></td>
            </tr>

            <tr>
            <td>Email: </td>
            <td><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>

            <tr>
                <td>Tel: </td>
                <td><input type="text" id="tel" name="tel" value="<?php echo $row['tel']; ?>"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="save" value="Save"></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (isset($_POST['save'])) {

    $input = array(
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel'],
    );

    $data_array[$index] = $input;

    $data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('users.json', $data);

    header('location: index.php');
}
?>
</body>
</html>