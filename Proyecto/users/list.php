<?php
session_start();
if (!isset($_SESSION["user"])) die("Acceso denegado");
require "../config/db.php";

$users = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Usuarios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    background: linear-gradient(135deg, #1e1e2f, #2c2c3e);
    color: white;
    min-height: 100vh;
}

.container-box {
    background: #ffffff10;
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 25px;
    border: 1px solid #ffffff30;
}

h2 {
    font-weight: 700;
    letter-spacing: 1px;
}

.table {
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

th {
    background: #9F2241 !important;
    color: white !important;
}

.btn-custom {
    font-weight: bold;
    border-radius: 10px;
    padding: 8px 18px;
}

.icon {
    width: 28px;
    cursor: pointer;
    transition: .25s;
    filter: brightness(0.9);
}

.icon:hover {
    transform: scale(1.2);
    filter: brightness(2) drop-shadow(0px 0px 6px white);
}

footer {
    margin-top: 30px;
    text-align: center;
    opacity: .6;
}
</style>
</head>

<body class="p-4">

<div class="container container-box">

    <h2 class="mb-4 text-center">👥 Usuarios Registrados</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="form_new.php" class="btn btn-success btn-custom">➕ Nuevo usuario</a>
        <a href="../dashboard.php" class="btn btn-outline-light btn-custom">⬅ Volver al panel</a>
    </div>

    <table class="table table-striped table-hover text-dark">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th class="text-center">Acciones</th>
        </tr>

        <?php foreach($users as $u): ?>
        <tr>
            <td><b><?= $u["nombre"]." ".$u["apellidos"] ?></b></td>
            <td><?= $u["correo"] ?></td>
            <td><?= $u["telefono"] ?></td>
            <td class="text-center">

                <!-- EDITAR CON MODAL -->
                <img class="icon"
                     title="Editar usuario"
                     src="../assents/edit.svg"
                     onclick="editarUsuario(
                        <?= $u['id'] ?>,
                        '<?= $u['nombre'] ?>',
                        '<?= $u['apellidos'] ?>',
                        '<?= $u['correo'] ?>',
                        '<?= $u['telefono'] ?>'
                     )">

                <!-- ELIMINAR -->
                <img class="icon"
                     title="Eliminar usuario"
                     src="../assents/trash.svg"
                     onclick="eliminar(<?= $u['id']?>)">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>


<!-- ====================================================== -->
<!-- ================   MODAL EDITAR   ==================== -->
<!-- ====================================================== -->

<div class="modal fade" id="modalEditar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content text-dark">

      <div class="modal-header">
        <h5 class="modal-title">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form id="formEditar" method="POST" action="update.php">

        <div class="modal-body">

          <input type="hidden" name="id" id="edit-id">

          <label>Nombre</label>
          <input class="form-control mb-2" name="nombre" id="edit-nombre">

          <label>Apellidos</label>
          <input class="form-control mb-2" name="apellidos" id="edit-apellidos">

          <label>Correo</label>
          <input class="form-control mb-2" name="correo" id="edit-correo">

          <label>Teléfono</label>
          <input class="form-control mb-2" name="telefono" id="edit-telefono">

        </div>

        <div class="modal-footer">
          <button class="btn btn-primary">Guardar cambios</button>
        </div>

      </form>

    </div>
  </div>
</div>


<script>
// ==================== ELIMINAR ======================
function eliminar(id){
  Swal.fire({
    icon: "warning",
    title: "¿Eliminar usuario?",
    text: "Esta acción no se puede deshacer",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Sí, eliminar"
  }).then(r=>{
      if(r.isConfirmed) location="delete.php?id=" + id;
  });
}


// ==================== EDITAR: ABRIR MODAL ======================
function editarUsuario(id, nombre, apellidos, correo, telefono) {
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-nombre").value = nombre;
    document.getElementById("edit-apellidos").value = apellidos;
    document.getElementById("edit-correo").value = correo;
    document.getElementById("edit-telefono").value = telefono;

    let modal = new bootstrap.Modal(document.getElementById('modalEditar'));
    modal.show();
}
</script>

</body>
</html>
