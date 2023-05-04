<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include "config.php";
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data["id"];

$sql = "DELETE FROM students WHERE id = {$student_id}";

if ($conn->query($sql)) {
    echo json_encode(["message" => "data deleted successfully", "status" => true]);
} else {
    echo json_encode(["message" => "data not deleted", "status" => false]);
}
