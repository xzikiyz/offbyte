<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "offbyte";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}
?>
