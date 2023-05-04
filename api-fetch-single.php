<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
include "config.php";
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data["sid"];

$sql = "SELECT * FROM students WHERE id = {$student_id}";
$result = $conn->query($sql) or die("query failed");
// $output = [];
if ($result->num_rows) {
    // while ($row = $result->fetch_assoc()) {
    //     $output[] = $row;
    // }
    $output = $result->fetch_assoc();
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No information found", "status" => false]);
}
