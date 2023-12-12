<?php
header('Content-Type: application/json');
include 'database.php';

$id = $_POST['id'] ?? '';

try {
    $stmt = $conn->prepare("DELETE FROM Donuts WHERE ID = :id");
    $stmt->execute([':id' => $id]);

    echo json_encode(["message" => "Donut deleted successfully."]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Server error while deleting donut."]);
}
