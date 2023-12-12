<?php
header('Content-Type: application/json');
include 'database.php';

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';

try {
    $stmt = $conn->prepare("INSERT INTO Donuts (Name, Description, Price) VALUES (:name, :description, :price)");
    $stmt->execute([':name' => $name, ':description' => $description, ':price' => $price]);

    echo json_encode(["message" => "Donut created successfully."]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Server error while creating donut."]);
}
