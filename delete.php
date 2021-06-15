<?php
require "db.php";
$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id=:id";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([':id' => $id])) {
    header('location: home.php');
}

?>
