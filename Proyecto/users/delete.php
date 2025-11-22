<?php
require "../config/db.php";

$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id=:id");
$stmt->execute(["id"=>$_GET["id"]]);

header("Location: list.php");
exit;
