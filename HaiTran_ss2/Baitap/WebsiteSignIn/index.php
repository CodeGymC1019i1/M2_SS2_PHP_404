<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["tel"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
            $input = array(
                'username' => $username,
                'email' => $email,
                'tel' => $tel
            );
            saveDataJson($input);
        }
    };
};

function checkInput()
{
    if (empty($_POST["username"])) {
        echo "Error! Empty username!";
        return false;
    }

    if (empty($_POST["email"])) {
        echo "Error! Empty email!";
        return false;
    }
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error! Format email not true!";
        return false;
    }

    if (empty($_POST["tel"])) {
        echo "Error! Empty tel!";
        return false;
    }

    return true;

}


function saveDataJson($input)
{
    $data = getDataJson();

    array_push($data, $input);

    $data2 = json_encode($data);

    file_put_contents('users.json', $data2);

}

function getDataJson()
{
    $content = file_get_contents('users.json', JSON_PRETTY_PRINT);
    return json_decode($content, true);
}

?>


<!DOCTYPE HTML>
<html>
<style type="text/css">
    .login {
        height: 250px;
        width: 300px;
        margin: 0;
        padding: 10px;
        border: 1px #CCC solid;
    }

    .login input {
        padding: 5px;
        margin: 5px
    }

    input type

    =
    [text], type

    =
    [password] {
        width: 200px;
        border: 1px solid black;
    }

    input type

    =
    [submit] {
        border-radius: unset;
    }

    table {
        border-collapse: collapse;
        border: 1px solid black;
    }

    td, th {
        margin: 0px;
        padding: 5px;
        border: 1px solid black;
    }
</style>
<body>
<form method="post">
    <div class="login">
        <h2>Add user</h2>
        <input type="text" name="username" placeholder="username"/>
        <input type="email" name="email" placeholder="email"/>
        <input type="tel" name="tel" placeholder="tel"/>
        <input type="submit" value="Add"/>
    </div>
    <div>
        <table>
            <tr>
                <th>STT</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>TEL</th>
                <th></th>
            </tr>
            <?php
            checkInput();

            $arr = getDataJson();
            if (!empty($arr)):
                foreach ($arr as $key => $values):
                    ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $values['username'] ?></td>
                        <td><?php echo $values['email'] ?></td>
                        <td><?php echo $values['tel'] ?></td>
                        <td><a href="edit.php?index=<?php echo $key ?>">Edit</a>
                            <a href="delete.php?index=<?php echo $key ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </table>
    </div>
</form>
</body>
</html>