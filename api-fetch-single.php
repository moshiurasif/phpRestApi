<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
include 'config.php';
$sql = "SELECT * FROM students";
$result = $conn->query($sql) or die("Query failed");
if ($result->num_rows > 0) {
    $output = $result->fetch_assoc();
    echo json_encode($output);
} else {
    echo json_encode(array("message" => "No Record Found", "status" => false));
}
