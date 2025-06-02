<?php
$conn = new mysqli("localhost", "root", "", "pna");
$id = $_GET['id'];
$conn->query("DELETE FROM registo WHERE id=$id");
header("Location: ../index.php");
?>
