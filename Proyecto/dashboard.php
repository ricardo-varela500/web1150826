<?php
session_start();
if (!isset($_SESSION["user"])) exit("No autorizado");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel de Control</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: linear-gradient(135deg, #1f1c2c, #928dab);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
}

.panel {
  width: 480px;
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(10px);
  border-radius: 18px;
  padding: 35px;
  text-align: center;
  box-shadow: 0 0 25px rgba(0,0,0,0.4);
}

.panel h1 {
  font-weight: 700;
  margin-bottom: 10px;
}

.usuario-tag {
  font-size: 17px;
  background: rgba(0,0,0,0.3);
  padding: 8px 14px;
  border-radius: 10px;
  display: inline-block;
  margin-bottom: 25px;
}

.btn-custom {
  width: 100%;
  font-size: 18px;
  font-weight: bold;
  padding: 14px;
  border-radius: 12px;
  margin-bottom: 15px;
  transition: .2s;
}

.btn-custom:hover {
  transform: scale(1.04);
}

.btn-users {
  background: #00c6ff;
  border: 0;
}

.btn-logout {
  background: #ff4141;
  border: 0;
}

.footer {
  margin-top: 10px;
  font-size: 13px;
  opacity: 0.7;
}
</style>
</head>

<body>

<div class="panel">

  <h1> Panel de Control</h1>

  <div class="usuario-tag">
     <?= $_SESSION["user"]["usuario"] ?>
  </div>

  <button class="btn btn-custom btn-users"
          onclick="location='users/list.php'">
     Administrar Usuarios
  </button>

  <button class="btn btn-custom btn-logout"
          onclick="location='auth/logout.php'">
     Cerrar Sesión
  </button>

  <div class="footer">Sistema de Administración v1.0</div>

</div>

</body>
</html>
