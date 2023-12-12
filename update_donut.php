<?php
header('Content-Type: application/json');
include 'database.php';

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';

try {
    $stmt = $conn->prepare("UPDATE Donuts SET Name = :name, Description = :description, Price = :price WHERE ID = :id");
    $stmt->execute([':id' => $id, ':name' => $name, ':description' => $description, ':price' => $price]);

    echo json_encode(["message" => "Donut updated successfully."]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Server error while updating donut."]);
}
