<?php 
include 'conexion.php';

$sql = "SELECT p.titulo, p.contenido, p.fecha, p.imagensubida, u.nombre, u.apellido, u.imagen
        FROM publicaciones p 
        JOIN usuarios u ON p.usuario_id = u.id 
        ORDER BY p.fecha ASC ";
$resultado = $conex->query($sql);
if ($resultado->num_rows > 0) {
    $publicaciones = [];
    while ($row = $resultado->fetch_assoc()) {
        $publicaciones[] = $row;
    }

    // Devuelve los datos en formato JSON
    header("Content-Type: application/json");
    echo json_encode($publicaciones);
} else {
    // Manejo de errores: No se encontraron publicaciones
    echo json_encode(['error' => 'No se encontraron publicaciones']);
}
?>