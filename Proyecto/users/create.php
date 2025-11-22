<?php
require "../config/db.php";

$sql = "INSERT INTO usuarios(nombre,apellidos,correo,telefono) VALUES(:n,:a,:c,:t)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
  "n"=>$_POST["nombre"],
  "a"=>$_POST["apellidos"],
  "c"=>$_POST["correo"],
  "t"=>$_POST["telefono"]
]);

header("Location: list.php");
exit;
