<?php
session_start();
if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
  // Si no está autenticado, redirigir al login
  header('Location: login.php');
  exit();
}
$idUsuario = $_SESSION['id'];
$NombreUsuario = $_SESSION['Nombre'];
$ApellidoUsuario = $_SESSION['Apellido'];
$CedulaUsuario = $_SESSION['Cedula'];
$FechaUsuario = $_SESSION['Fecha'];
$GeneroUsuario = $_SESSION['Genero'];
$EmailUsuario = $_SESSION['Email'];
$ClaveUsuario = $_SESSION['Clave'];
$imagenUsuario = $_SESSION['imagen'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/perfil.css">
  <link rel="stylesheet" href="css\fontawesome-free-6.6.0-web\css\all.css">
  <title>Unex</title>
</head>

<body>
  <div id="my-popover" popover>
    <img src="<?php echo $imagenUsuario; ?>" alt="perfil">
    <div class="file-upload">
      <form action="imagenupload.php" method="POST" enctype="multipart/form-data">
      <label for="file-input" class="custom-file-label">Subir foto</label>
      <input type="file" class="file-input" id="file-input" name="imagen" accept="image/*">
      <button type="submit" value="enviar">Cambiar</button>
      </form>
    </div>
  </div>
  <header class="header">
    <div class="logo">
      <a href="PaginaPrincipal.php">Unex</a>
    </div>
    <nav>
      <ul class="nav-links">
        <li><a href="PaginaPrincipal.php">Inicio</a></li>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="#">Mensajes</a></li>
        <li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
      </ul>
    </nav>
    <input type="search" class="search-bar" placeholder="Buscar....">
    <a onclick="openNav()" class="menu"><button>Menu</button></a>
    <div class="overlay" id="mobile-menu">
      <a href="#" onclick="closeNav()" class="close">&times</a>
      <div class="overlay-content">
        <a href="PaginaPrincipal.php">Inicio</a>
        <a href="perfil.php">Perfil</a>
        <a href="#">Mensajes</a>
        <a href="#">Cerrar sesion</a>
      </div>
    </div>
  </header>
  <main class="container">
    <div class="left-column">
      <div class="perfil">
        <button popovertarget="my-popover" class="cambiarfoto"><img src="<?php echo $imagenUsuario; ?>"
            alt="perfil"></button>
        <p><?php echo "$NombreUsuario $ApellidoUsuario"; ?></p>
      </div>
      <div class="info-usuario">
      <h2>Informacion de <?php echo "$NombreUsuario $ApellidoUsuario"; ?></h2>
        <label for="Nombre"><strong>Nombre del usuario:</strong></label>
        <p> <?php echo "$NombreUsuario"; ?></p>
        <label for="Apellido"><strong>Apellido del usuario:</strong></label>
        <p> <?php echo "$ApellidoUsuario"; ?></p>
        <label for="Cedula"><strong>Cedula del usuario:</strong></label>
        <p> <?php echo "$CedulaUsuario"; ?></p>
        <label for="Correo"><strong>Correo del usuario:</strong></label>
        <p> <?php echo "$EmailUsuario"; ?></p>
        <label for="Genero"><strong>Genero del usuario:</strong></label>
        <p> <?php echo "$GeneroUsuario"; ?></p>
        <label for="Fecha-de-nacimiento"><strong>Fecha de nacimiento del usuario:</strong></label>
        <p> <?php echo "$FechaUsuario"; ?></p>
      </div>
    </div>
    <div class="main-content" id="main-content">
    <div class="publicaciones" id="publicaciones"> 

    </div>
    </div>
    <div class="right-column">Amigos/Contactos</div>

  </main>
  <script src="perfil.js"></script>
</body>

</html>