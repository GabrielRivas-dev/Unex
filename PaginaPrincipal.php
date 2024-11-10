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

include 'conexion.php';

$sql = "SELECT p.titulo, p.contenido, p.fecha, p.imagensubida, u.nombre, u.apellido, u.imagen
        FROM publicaciones p 
        JOIN usuarios u ON p.usuario_id = u.id 
        ORDER BY p.fecha ASC ";
$resultado = $conex->query($sql);

$publicacion = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css\fontawesome-free-6.6.0-web\css\all.css">
  <title>Unex</title>
</head>

<body>
  <!--ENCABEZADO -->
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
  <!--CONTENIDO -->
  <main class="container">
    <div class="left-column">
      <div class="perfil">
        <a href="perfil.php"><img src="<?php echo $imagenUsuario; ?>" alt="perfil"></a>
        <p><?php echo "$NombreUsuario $ApellidoUsuario"; ?></p>
      </div>
    </div>
    <!--CONTENIDO DEL MEDIO -->
    <div class="main-content" id="main-content">
      <!--CREAR PUBLICACION-->
      <div class="post-create">
        <form action="publicar.php" method="POST" enctype="multipart/form-data">
          <div class="input-create-post">
          <a href="perfil.php"><img src="<?php echo $imagenUsuario; ?>" alt="perfil"></a>
          <input type="text" class="description" name="description" placeholder="¿Que publicaras hoy <?php echo "$NombreUsuario"?>?">
          </div>
          <div class="buttons-create-post">
          <label for="file-input" class="upload-file-label">Subir foto</label>
          <input type="file" class="file-input" id="file-input" name="imagen" accept="image/*">
          <button class="post-create-btn" type="submit" value="enviar">Publicar</button>
          </div>
        </form>
      </div>
      <div class="publicaciones" id="publicaciones"> </div>
      <!--PUBLICACIONES -->
      <div class="post">
        <div class="post-header">
          <img src="<?php echo htmlspecialchars($publicacion['imagen']) ?>" alt="Foto de usuario">
          <div class="post-info">
            <p><strong><?php echo htmlspecialchars($publicacion['nombre'])," ", htmlspecialchars($publicacion['apellido']) ?></strong></p>
            <span><?php echo htmlspecialchars($publicacion['fecha'])?></span>
          </div>
        </div>
        <div class="post-content">
        <p><?php echo  htmlspecialchars($publicacion['contenido'])?></p>
        <div class="post-content-img">
          <img src="<?php echo  htmlspecialchars($publicacion['imagensubida'])?>" alt="">
          </div>
          </form>
        </div>
        <div class="post-btns">
          <ul>
          <li class="like-btn-container">
            <button class="like-btn"  onclick="likePost()">
                <i class="fa-regular fa-heart"></i>
            </button>
            <span id="likecount">0</span>
        </li>

            <li><button class="comment-btn"><i class="fa-regular fa-comment"><span>0</span></button></i></li>
            <li><button class="share-btn"><i class="fa-regular fa-share-from-square"><span>0</span></i></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!--CONTENIDO DE LA DERECHA -->
    <div class="right-column">Amigos/Contactos
    <button class="like-button" onclick="likePost()">Me Gusta</button>
    <p id="likeCount">Me gusta: <span id="count">0</span></p>
    </div>
  </main>
  <script src="Main.js"> </script>
</body>

</html>