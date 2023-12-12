<?php
include 'database.php';

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

try {
    $stmt = $conn->query("SELECT * FROM Donuts");
    $donuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($donuts);
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo json_encode(["message" => "Server error while fetching donuts."]);
}
