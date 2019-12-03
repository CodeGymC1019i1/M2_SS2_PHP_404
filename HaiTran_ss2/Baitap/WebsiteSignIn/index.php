<!DOCTYPE HTML>
<html>
<style type="text/css">
    .login {
        height:250px; width:300px;
        margin:0;
        padding:10px;
        border:1px #CCC solid;
    }
    .login input {
        padding:5px; margin:5px
    }
    input type=[text] , type=[password] {
                                 width: 200px;
                                 border: 1px solid black;
                             }
    input type=[submit]{
                   border-radius: unset;
               }

</style>
<body>
<form method="post">
    <div class="login">
        <h2>Login</h2>
        <input type="text" name="username"  placeholder="username" />
        <input type="email" name="email" placeholder="email" />
        <input type="tel" name="tel" placeholder="tel"/>
        <input type="submit" value="Submit"/>
    </div>

    <?php
//    function flitter_var($email, $FLITER_VALIDATE_EMAIL) {
//
//    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["tel"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
        } else {
            if (empty($_POST["username"]))
                echo "Error! Emty username!";
            if (empty($_POST["email"]))
                echo "Error! Emty email!";
            if (empty($_POST["tel"]))
                echo "Error! Emty tel!";
            }
    };

    ?>

</form>
</body>
</html>