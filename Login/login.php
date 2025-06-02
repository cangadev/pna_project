<?php
session_start();

$host = "localhost";
$db = "pna";
$user = "root"; 
$pass = "";     

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM administrador WHERE username = ? AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['user'] = $username;
    header("Location: ../dashboard/index.php");
} else { 
    echo "Usuário ou senha incorretos.";
}

$conn->close();
?>
