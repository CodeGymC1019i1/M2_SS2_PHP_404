<?php
$index = (int) $_GET['index'];

$data = file_get_contents('users.json');
$data = json_decode($data, true);
var_dump($index);
array_splice($data, $index,1);

$data = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('users.json', $data);

header('location: index.php');