<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "pna");
    $tipodoc = $_POST['tipodoc'];
$nome = $_POST['nome'];
$datnasc = $_POST['datnasc'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$local = $_POST['local'];
$dat = $_POST['dat'];
$detalhe = $_POST['detalhe'];
    // Upload da imagem
    $image = $_FILES['image']['name'];
    $path = "../uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $path);

    $stmt = $conn->prepare("INSERT INTO registo (tipodoc, nome, datnasc, email, telefone, localperda, dat, detalhe, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissss", $tipodoc, $nome, $datnasc, $email, $telefone, $local, $dat, $detalhe, $image);
    $stmt->execute();
    echo "Produto cadastrado!";
    
header("Location: ../done/index.html");
}
?>