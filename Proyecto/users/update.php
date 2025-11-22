<?php
require "../config/db.php";

$sql = "UPDATE usuarios SET nombre=:n, apellidos=:a, correo=:c, telefono=:t WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
  "id"=>$_POST["id"],
  "n"=>$_POST["nombre"],
  "a"=>$_POST["apellidos"],
  "c"=>$_POST["correo"],
  "t"=>$_POST["telefono"],
]);

header("Location: list.php");
exit;
