<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$age = $data['age'];
$city = $data['city'];

$sql = "INSERT INTO students(student_name, age, city) VALUES ('{$name}', '{$age}', '{$city}')";
// if ($conn->query($sql)) {
//     echo json_encode(["message" => "data inserted successfully", "status" => true]);
// } else {
//     echo json_encode(["message" => "data not inserted", "status" => false]);
// }
$conn->query($sql);
if ($conn->affected_rows) {
    echo json_encode(["message" => "data inserted", "status" => true]);
} else {
    echo json_encode(["message" => "data not inserted", "status" => false]);
}
