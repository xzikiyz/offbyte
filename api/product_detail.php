<?php
header("Content-Type: application/json");
include "db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    echo json_encode(["error" => "ID tidak valid"]);
    exit;
}

$sql = "SELECT * FROM product WHERE id = $id";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => $conn->error]);
    exit;
}

$product = $result->fetch_assoc();

if (!$product) {
    echo json_encode(["error" => "Produk tidak ditemukan"]);
    exit;
}

$product['Gambar'] = base64_encode($product['Gambar']);

echo json_encode($product);
?>
