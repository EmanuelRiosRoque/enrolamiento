const dropzone = document.getElementById('dropzone-label');

// Función para mostrar el nombre del archivo
function mostrarNombreArchivo(file) {
    dropzone.querySelector('p').textContent = file.name;
}

// Escuchar eventos de arrastre y soltar
dropzone.addEventListener('dragover', function(event) {
    event.preventDefault();
    this.classList.add('border-blue-500');
});

dropzone.addEventListener('dragleave', function(event) {
    this.classList.remove('border-blue-500');
});

dropzone.addEventListener('drop', function(event) {
    event.preventDefault();
    this.classList.remove('border-blue-500');

    // Obtener el archivo que se ha soltado
    const file = event.dataTransfer.files[0];

    // Mostrar el nombre del archivo
    mostrarNombreArchivo(file);
});

// Escuchar el evento de cambio de archivo al seleccionar de forma tradicional
dropzone.querySelector('input[type="file"]').addEventListener('change', function(event) {
    // Obtener el archivo seleccionado
    const file = event.target.files[0];

    // Mostrar el nombre del archivo
    mostrarNombreArchivo(file);
});
