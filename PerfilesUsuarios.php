<?php
require 'conexion.php';  // Conectar a la base de datos

$userId = $_GET['id'];

$sql = $conex->prepare("SELECT Nombre, Apellido, Cedula, Fecha, Genero, Email, Clave, imagen FROM usuarios WHERE id = ?");
$sql->bind_param("i", $userId);
$sql->execute();
$result = $sql->get_result();
$perfil = $result->fetch_assoc();

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
        <a href="cerrar_sesion.php">Cerrar sesion</a>
        </div>
      </div>
  </header>
  <main class="container">
    <div class="left-column">
      <div class="perfil">
        <img src="<?php echo $perfil['imagen'] ?>" alt="perfil">
        <p><?php echo $perfil['Nombre'].' '. $perfil['Apellido']; ?></p>
      </div>
    </div>
    <div class="main-content"><h2>Perfil de <?php echo $perfil['Nombre'].' '. $perfil['Apellido']; ?></h2>
      <div class="post">
        <label for="Nombre">Nombre del usuario: <?php echo $perfil['Nombre'] ?></label>
        <label for="Apellido">Apellido del usuario: <?php echo $perfil['Apellido']; ?></label></label>
        <label for="Cedula">Cedula del usuario: <?php echo $perfil['Cedula']; ?></label></label>
        <label for="Correo">Correo del usuario: <?php echo $perfil['Email']; ?></label></label>
        <label for="Genero">Genero del usuario: <?php echo $perfil['Genero']; ?></label></label>
        <label for="Fecha-de-nacimiento">Fecha de nacimiento del usuario: <?php echo $perfil['Fecha']; ?></label></label>
      </div>
    </div>
    <div class="right-column">Amigos/Contactos</div>

  </main>
  <script src="Main.js"></script>
</body>

</html>