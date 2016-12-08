<?php
require 'config.php';
$id = $_REQUEST['id'];

$data = Product::find($id);
if (!empty($data)) {
    http_response_code(200);
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'not found']);
}
