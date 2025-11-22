<?php
session_start();
if (!isset($_SESSION["user"])) exit("No autorizado");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo usuario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: linear-gradient(135deg, #1f1c2c, #928dab);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: Arial;
  color: white;
}

/* TARJETA CRISTAL */
.card-form {
  width: 480px;
  background: rgba(255,255,255,0.12);
  padding: 35px;
  border-radius: 18px;
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.25);
  box-shadow: 0 0 25px rgba(0,0,0,.6);
  animation: fadeIn .4s ease-in-out;
}

/* TÍTULO */
.card-form h2 {
  font-weight: 700;
  margin-bottom: 25px;
  text-align: center;
}

/* ✏ INPUTS */
.card-form input {
  background: rgba(255,255,255,0.18) !important;
  border: 1px solid rgba(255,255,255,.4) !important;
  color: white !important;
  font-size: 15px;
}

.card-form input::placeholder {
  color: rgba(255,255,255,.75);
}

/* BOTONES */
.btn-save {
  background: #00c853;
  border: none;
  font-weight: bold;
  font-size: 17px;
  padding: 10px;
  border-radius: 10px;
  transition: .25s;
}

.btn-save:hover {
  background: #009d40;
  transform: scale(1.05);
}

.btn-cancel {
  font-weight: bold;
  padding: 10px;
  border-radius: 10px;
  transition: .25s;
}

.btn-cancel:hover {
  transform: scale(1.05);
}

/* ANIMACIÓN */
@keyframes fadeIn {
  from { opacity:0; transform: scale(.95); }
  to   { opacity:1; transform: scale(1); }
}
</style>
</head>

<body>

<div class="card-form">

<h2>➕ Registrar usuario</h2>

<form action="create.php" method="POST">

  <input class="form-control mb-3" name="nombre" placeholder="Nombre" required>
  <input class="form-control mb-3" name="apellidos" placeholder="Apellidos">
  <input class="form-control mb-3" name="correo" placeholder="Correo">
  <input class="form-control mb-4" name="telefono" placeholder="Teléfono">

  <button class="btn btn-save w-100 mb-2">💾 Guardar</button>
  <a href="list.php" class="btn btn-secondary w-100 btn-cancel">⟵ Cancelar</a>

</form>

</div>

</body>
</html>
