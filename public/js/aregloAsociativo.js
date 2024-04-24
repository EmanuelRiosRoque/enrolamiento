var descripciones = {};
inmuebles.forEach(function(inmueble) {
    descripciones[inmueble.id_locacion] = inmueble.id_locacion;
});

// Función para actualizar el valor del segundo input
function actualizarArea(id) {
    var descripcion = descripciones[id] || "";
    document.getElementById('floating_area').value = descripcion;
}

// Evento change del primer select para actualizar el valor del segundo input
document.getElementById('floating_areaAdscrito').addEventListener('change', function() {
    var selectedId = this.value;
    actualizarArea(selectedId);
});
