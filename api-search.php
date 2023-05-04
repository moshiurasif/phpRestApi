<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
include "config.php";
$data = json_decode(file_get_contents("php://input"), true);
$search_student = $data["search"];

$sql = "SELECT * FROM students WHERE student_name LIKE '%{$search_student}%'";
$result = $conn->query($sql) or die("query failed");
$output = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
    // $output = $result->fetch_assoc();
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No search record found", "status" => false]);
}
