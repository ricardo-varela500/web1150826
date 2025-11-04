<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];

  $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
  if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
    exit();
  } else {
    echo "Error: " . $conn->error;
}
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Agregar Usuario</title>
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
      <h3 class="center orange-text">Agregar Usuario</h3>

      <form method="POST" class="col s12">
        <div class="input-field">
          <input id="nombre" name="nombre" type="text" required>
          <label for="nombre">Nombre</label>
        </div>

        <div class="input-field">
          <input id="email" name="email" type="email" required>
          <label for="email">Correo Electrónico</label>
        </div>

        <div class="input-field">
          <input id="telefono" name="telefono" type="text" required>
          <label for="telefono">Teléfono</label>
        </div>

        <div class="center">
          <button type="submit" class="btn waves-effect orange">Guardar
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

