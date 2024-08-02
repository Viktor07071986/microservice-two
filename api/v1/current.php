<?php

require_once "db.php";

if(!empty($_GET["id"])) {
    $result = mysqli_query($mysqli, "SELECT * FROM categories WHERE id = " . $_GET['id']);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (!empty($rows)) {
        http_response_code(200);
        echo json_encode($rows);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Товар не найден! Несуществующий id или отсутствуют данные в БД!"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Товар не найден! Отсутствует id в адресной строке браузера!"), JSON_UNESCAPED_UNICODE);
}