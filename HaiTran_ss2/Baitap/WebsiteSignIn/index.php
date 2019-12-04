<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["tel"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
        }
    };
};

function deleteUser($index) {
    $arr = getDataJson();
    array_splice($arr,$index,1);
    saveDataJson();
}

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


function saveDataJson()
{
    //set the updated values
    $input = array(
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel']
    );
    $data = getDataJson();

    //update the selected index
    array_push($data, $input);

    //encode back to json
    $data2 = json_encode($data);

    file_put_contents('users.json', $data2);

    //   header('location: index.php');
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

</style>
<body>
<form method="post">
    <div class="login">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="username"/>
        <input type="email" name="email" placeholder="email"/>
        <input type="tel" name="tel" placeholder="tel"/>
        <input type="submit" value="Submit"/>
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
            saveDataJson();
            foreach($arr as $key => $values):
            ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $values['username'] ?></td>
                <td><?php echo $values['email'] ?></td>
                <td><?php echo $values['tel'] ?></td>
                <td><a href=''>Edit</a> <a href='' onclick='deleteUser(<?php echo $key ?>)'>Delete</a></td>
            </tr>
            <?php endforeach; ?>
            <?php endif;?>

        </table>
    </div>
</form>
</body>
</html>