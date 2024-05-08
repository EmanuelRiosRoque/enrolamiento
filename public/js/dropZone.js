
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('[id^="authentication-modal-"]');
    const aletaDocumento = document.querySelector("#alerta-archivo");
    const btnSubmit = document.querySelector("#env-correo");
    modals.forEach(modal => {
        const dropzone = modal.querySelector('.flex.items-center.justify-center');
        const inputFile = modal.querySelector('input[type="file"]');

        function validarArchivo(file) {
            // Obtener el número de empleado del nombre del archivo subido
            const numeroEmpleadoArchivo = obtenerNumeroEmpleado(file.name);

            // Obtener el número de empleado del campo oculto
            const numeroEmpleadoCampo = document.getElementById('numEmpleadoArch').value;

            // Comparar los números de empleado
            if (numeroEmpleadoArchivo !== numeroEmpleadoCampo) {
                aletaDocumento.classList.remove('hidden');
                btnSubmit.disabled = true; // Deshabilitar el botón
            } else {
                aletaDocumento.classList.add('hidden');
                btnSubmit.disabled = false; // Habilitar el botón
            }
        }


        function obtenerNumeroEmpleado(nombreArchivo) {
            // Definir la expresión regular para buscar un número de empleado antes de cualquier paréntesis abierto
            const regex = /(\d+)(?=\s*\()/;

            // Ejecutar la expresión regular en el nombre del archivo
            const match = nombreArchivo.match(regex);

            // Si se encontró un número de empleado en el nombre del archivo, devolverlo
            if (match) {
                return match[1]; // El primer grupo capturado (\d+) contiene el número de empleado
            }

            // Si no se encontró ningún número de empleado en el nombre del archivo, devolver null
            return null;
        }

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
            // validarArchivo(file)
            // Asignar el archivo al input type file
            const files = new DataTransfer();
            files.items.add(file);
            inputFile.files = files.files;
        });

        // Escuchar el evento de cambio de archivo al seleccionar de forma tradicional
        inputFile.addEventListener('change', function(event) {
            // Obtener el archivo seleccionado
            const file = event.target.files[0];

            // Mostrar el nombre del archivo
            mostrarNombreArchivo(file);
            // validarArchivo(file)

        });
    });
});
