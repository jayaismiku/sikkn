<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sikkn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data)) {
    foreach ($data as $row) {
        $kelompok = $row['kelompok'];
        $nim = $row['nim'];

        $stmt = $conn->prepare("INSERT INTO pengelompokan (nim, kelompok_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $nim, $kelompok);
        $stmt->execute();
    }
    $stmt->close();
}

$conn->close();
?>
