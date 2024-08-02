<?php

require_once "db.php";

$result = mysqli_query($mysqli, "SELECT * FROM categories ORDER BY id DESC");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (!empty($rows)) {
    http_response_code(200);
    echo json_encode($rows);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Товары не найдены!"), JSON_UNESCAPED_UNICODE);
}