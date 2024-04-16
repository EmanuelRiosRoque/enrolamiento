// Variables
const nEmpleado = document.querySelector("#nEmpleado");
const alerta = document.querySelector(".alerta");

// Listeners
nEmpleado.addEventListener("input", validaNempleado);

// Funciones
function validaNempleado() {
    const valor = this.value.trim(); // Obtenemos el valor del campo de entrada y eliminamos los espacios en blanco al inicio y al final

    if (valor.length === 8) { // Verificamos si la longitud del valor es 8
        // El valor tiene exactamente 8 caracteres
        ocultarAlerta();
    } else {
        // El valor no tiene 8 caracteres
        mostrarAlerta();
    }
}

function mostrarAlerta() {
    alerta.classList.remove("hidden");
}

function ocultarAlerta() {
    alerta.classList.add("hidden");
}


function handleKeyUp(event) {
    const input = event.target;
    const valor = input.value.trim();

    if (valor.length > 7 && valor.charAt(6) === '-') {
        input.value = valor.slice(0, 6) + valor.slice(7);
    }
}


