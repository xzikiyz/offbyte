<?php
header("Content-Type: application/json");
include "db.php";

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

$products = [];

while ($row = $result->fetch_assoc()) {

    // otomatis deteksi tipe MIME dari BLOB
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_buffer($finfo, $row['Gambar']);
    finfo_close($finfo);

    // tambahkan prefix supaya <img> bisa membaca
    $row['Gambar'] = "data:$mime;base64," . base64_encode($row['Gambar']);

    $products[] = $row;
}

echo json_encode($products);
?>
