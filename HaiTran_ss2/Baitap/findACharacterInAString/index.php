<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $character = $_POST["character"];
    }
    $string = 'adjlkfjsldjfldscm';
    $count = 0;
    for($i = 0; $i < strlen($string); $i++)
        if($string[$i] == $character)
            $count++;
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
<form method="post">
    <p>Enter a character need to find: </p>
    <input type="text" name="character">
    <input type="submit" value="Find">
</form>
<?php
if (!empty($_POST['character'])):
?>
<div>
    Character <?php echo $character  ?> appear <?php echo $count?> times in the string: "<?php echo $string ?>".
</div>
<?php
endif;
?>
</body>
</html>