<?php
include('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $eail = $_POST['email'];
    $telefono = $_POST['telefono'];

$update = "UPDATE usuarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id='$id'";
    if ($conn->query($update) === TRUE) {
        header("Location: ../index.php");
    exit();
    } else {
    echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Editar Usuario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
    <nav class="light-blue lighten-1">
        <div class="nav-wrapper container">
            <a href="../index.php" class="brand-logo">UNAM</a>
        </div>
    </nav>

    <div class="container">
        <h3 class="center orange-text">Editar Usuario</h3>

        <form method="POST" class="col s12">
            <div class="input-field">
                <input id="nombre" name="nombre" type="text" value="<?= $row['nombre']; ?>" required>
                    <label for="nombre" class="active">Nombre</label>
            </div>

        <div class="input-field">
        <input id="email" name="email" type="email" value="<?= $row['email']; ?>" required>
        <label for="email" class="active">Correo Electrónico</label>
        </div>

        <div class="input-field">
        <input id="telefono" name="telefono" type="text" value="<?= $row['telefono']; ?>" required>
        <label for="telefono" class="active">Teléfono</label>
        </div>

    <div class="center">
        <button type="submit" class="btn waves-effect orange">Actualizar
            <i class="material-icons right">save</i>
        </button>
            <a href="../index.php" class="btn grey">Cancelar</a>
    </div>
        </form>
    </div>

    <footer class="page-footer orange">
        <div class="container center">
            <p>Hecho en México — UNAM FES Aragón © 2025</p>
        </div>
    </footer>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../js/materialize.js"></script>
    </body>
</html>
