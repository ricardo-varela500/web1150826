<?php
include('./logica/db.php');
$consulta = "SELECT * FROM usuarios";
$result = $conn->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Página ICO</title>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>

  <body>
    <!-- NAV -->
    <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="https://www.unam.mx" class="brand-logo">UNAM</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="https://www.aragon.unam.mx">FES Aragón</a></li>
        </ul>
        <ul id="nav-mobile" class="sidenav">
          <li><a href="https://www.aragon.unam.mx">FES Aragón</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
    </nav>

    <!-- HEADER -->
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <h1 class="header center orange-text">Registro del Sistema</h1>
      </div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col s12 m12">
            <!-- Botón -->
            <a href="./logica/create.php" class="btn waves-effect waves-light orange">
              <i class="material-icons left">add</i>Agregar Usuario
            </a>

            <!-- Tabla de usuarios -->
            <table class="striped centered highlight responsive-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td><?= htmlspecialchars($row['id']); ?></td>
                      <td><?= htmlspecialchars($row['nombre']); ?></td>
                      <td><?= htmlspecialchars($row['email']); ?></td>
                      <td><?= htmlspecialchars($row['telefono']); ?></td>
                      <td>
                        <a href="./logica/update.php?id=<?= urlencode($row['id']); ?>" class="blue-text text-darken-2">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="./logica/delete.php?id=<?= urlencode($row['id']); ?>" class="red-text text-darken-2" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                          <i class="material-icons">delete</i>
                        </a>
                      </td>
                    </tr>
                <?php }
                } else { ?>
                  <tr>
                    <td colspan="5">No hay usuarios registrados.</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br><br>
    </div>

    <!-- FOOTER -->
    <footer class="page-footer orange">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">FES Aragón</h5>
            <p class="grey-text text-lighten-4">
              Hecho en México, Universidad Nacional Autónoma de México (UNAM),
              todos los derechos reservados 2025. Esta página puede ser
              reproducida con fines no lucrativos, siempre y cuando no se
              mutile, se cite la fuente completa y su dirección electrónica. De
              otra forma, requiere permiso previo por escrito de la institución.
            </p>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          Créditos:
          <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
      </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </body>
</html>
