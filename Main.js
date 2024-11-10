let count = 0;

function likePost() {
    count++; // Aumenta el contador
    document.getElementById('likecount').innerText = count;
}
function openNav(){
  document.getElementById("mobile-menu").style.width="100%";
}
function closeNav(){
  document.getElementById("mobile-menu").style.width="0%";
}
function cargarPublicaciones() {
  fetch('guardarPublicacion.php')
      .then(response => response.json())
      .then(data => {
          const contenedorPublicaciones = document.getElementById('publicaciones');

          // Limpiar el contenedor
          contenedorPublicaciones.innerHTML = '';

          // Iterar sobre los datos recibidos y crear los elementos
          data.forEach(publicacion => {
              const nuevaPublicacion = document.createElement('div');
              nuevaPublicacion.classList.add('post');
              nuevaPublicacion.innerHTML = `
                  <div class="post-header">
                      <img src="${publicacion.imagen}" alt="Foto de usuario">
                      <div class="post-info">
                          <p><strong>${publicacion.nombre} ${publicacion.apellido}</strong></p>
                          <span>${publicacion.fecha}</span>
                      </div>
                  </div>
                  <div class="post-content">
                      <p>${publicacion.contenido}</p>
                       <div class="post-content-img">
                      <img src="${publicacion.imagensubida}" alt="">
                      </div>
                  </div>
              `;
              // Agregar la nueva publicación al contenedor al inicio
              contenedorPublicaciones.insertBefore(nuevaPublicacion, contenedorPublicaciones.firstChild);
          });
      })
      .catch(error => console.error('Error al cargar publicaciones:', error));
}

// Llama a la función para cargar publicaciones al cargar la página
cargarPublicaciones();