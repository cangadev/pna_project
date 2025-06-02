<?php
$conn = new mysqli("localhost", "root", "", "pna");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE registo SET tipodoc=?, nome=?, datnasc=?, email=?, telefone=?, localperda=?, dat=?, statuss=? WHERE id=?");

    $stmt->bind_param("ssssisssi", $_POST['tipodoc'], $_POST['nome'], $_POST['datnasc'],$_POST['email'],$_POST['telefone'],$_POST['localperda'],$_POST['dat'],$_POST['statuss'], $_POST['id']);
    $stmt->execute();
    echo "Produto atualizado!";
    
header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM registo WHERE id=$id")->fetch_assoc();
?>

<form method="post">
    <input type="hidden" name="id" value="<?= $res['id'] ?>">
    <input type="text" name="tipodoc" value="<?= $res['tipodoc'] ?>"><br>
    <input type="text" name="nome" value="<?= $res['nome'] ?>"><br>
    <input type="text" name="datnasc" value="<?= $res['datnasc'] ?>"><br>
    <input type="text" name="telefone" value="<?= $res['telefone'] ?>"><br>
    <input type="text" name="localperda" value="<?= $res['localperda'] ?>"><br>
    <input type="text" name="dat" value="<?= $res['dat'] ?>"><br>
    <input type="text" name="statuss" value="<?= $res['statuss'] ?>"><br>
    <button type="submit">Salvar</button>
</form>
