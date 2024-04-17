// Variables
const nEmpleado = document.querySelector("#nEmpleado");
const alerta = document.querySelector(".alerta");
const bEmpleado = document.querySelector("#bEmpleado");
// Listeners
nEmpleado.addEventListener("input", validaNempleado);
nEmpleado.addEventListener("blur", ocultarAlerta);

// Funciones
function validaNempleado() {
    const valor = this.value.trim(); // Obtenemos el valor del campo de entrada y eliminamos los espacios en blanco al inicio y al final

    if (valor.length === 7) {
        // Verificamos si la longitud del valor es 7
        // El valor tiene exactamente 7 caracteres
        ocultarAlerta();
    } else {
        // El valor no tiene 7 caracteres
        mostrarAlerta();
    }
}

function mostrarAlerta() {
    alerta.classList.remove("hidden");
}

function ocultarAlerta() {
    alerta.classList.add("hidden");
}


