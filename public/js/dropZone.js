
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('[id^="authentication-modal-"]');
    let btnEnviar = document.querySelector("#env-correo");
    const alertaDoc = document.querySelector("#alerta-archivo");
    modals.forEach(modal => {
        const dropzone = modal.querySelector('.flex.items-center.justify-center');
        const inputFile = modal.querySelector('input[type="file"]');

        function validarArchivo(file) {
            // Obtener el número de empleado del nombre del archivo subido
            const numeroEmpleadoArchivo =  dropzone.querySelector('p').textContent = file.name;
            let numeroDocumento =  numeroEmpleadoArchivo.split(".");

            // Obtener el número de empleado del campo oculto
            const numeroEmpleadoCampo = document.getElementById('numEmpleadoArch').value;

            // Comparar los números de empleado
            if (numeroDocumento[0] !== numeroEmpleadoCampo) {
                alertaDoc.classList.remove("hidden")
                btnEnviar.disabled = true
            } else {
                alertaDoc.classList.add("hidden")
                btnEnviar.disabled = false
            }
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
            validarArchivo(file)
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
            validarArchivo(file)

        });
    });
});
