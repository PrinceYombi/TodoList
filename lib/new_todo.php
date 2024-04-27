<?php

$todo_name = isset($_POST['todo_name']) ? $_POST['todo_name'] : '';
$todo_name = trim($todo_name);

if ($todo_name) {

    if (file_exists("../data_base/todo_data.json")) {
        $json = file_get_contents("../data_base/todo_data.json");
        $jsonArray = json_decode($json, true);
        
    }else{
        $jsonArray = [];
    }
    $jsonArray[$todo_name] = ["completed"=>false];

    file_put_contents("../data_base/todo_data.json", json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: ../');