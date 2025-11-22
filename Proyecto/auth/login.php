<?php
session_start();
if (isset($_SESSION['user'])) { header("Location: ../dashboard.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: linear-gradient(135deg, #232526, #414345);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: Arial, sans-serif;
  overflow: hidden;
}

/* Fondo animado */
body::before {
  content: "";
  position: absolute;
  width: 300px;
  height: 300px;
  background: #00c6ff;
  filter: blur(120px);
  top: 10%;
  left: 60%;
  opacity: .35;
}
body::after {
  content: "";
  position: absolute;
  width: 300px;
  height: 300px;
  background: #d63384;
  filter: blur(120px);
  top: 60%;
  left: 10%;
  opacity: .35;
}

/* Tarjeta cristal */
.card-login {
  width: 380px;
  padding: 35px;
  border-radius: 18px;
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.25);
  box-shadow: 0 0 25px rgba(0,0,0,.6);
  color: white;
  animation: fadeIn .5s ease-in-out;
}

.card-login h3 {
  font-weight: bold;
  text-align: center;
  margin-bottom: 25px;
}

/* Inputs */
.card-login input {
  background: rgba(255,255,255,0.2) !important;
  border: 1px solid rgba(255,255,255,.35) !important;
  color: white !important;
}

.card-login input::placeholder {
  color: rgba(255,255,255,.65);
}

/* Botón */
.btn-login {
  font-size: 18px;
  padding: 12px;
  border-radius: 10px;
  background: #00c6ff;
  font-weight: 600;
  border: none;
  transition: .25s;
}

.btn-login:hover {
  transform: scale(1.05);
  background: #009ad1;
}

/* ✨ Animación */
@keyframes fadeIn {
  from { opacity: 0; transform: scale(.95); }
  to { opacity: 1; transform: scale(1); }
}
</style>
</head>

<body>

<div class="card-login">

  <h3> Iniciar Sesión</h3>

  <form action="validate.php" method="POST">

    <input class="form-control mb-3" name="usuario" placeholder="Usuario" required>

    <input class="form-control mb-4" name="password" type="password" placeholder="Contraseña" required>

    <button class="btn btn-login w-100">Entrar</button>

  </form>

</div>

</body>
</html>
