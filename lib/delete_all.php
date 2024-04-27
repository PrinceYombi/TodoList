<?php

$json = file_get_contents("../data_base/todo_data.json");
$jsonArray = json_decode($json, true);

unset($jsonArray);

file_put_contents("../data_base/todo_data.json", json_encode($jsonArray, JSON_PRETTY_PRINT));

header('Location: ../');