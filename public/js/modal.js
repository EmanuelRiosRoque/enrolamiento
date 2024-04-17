
// Agregar un evento de clic al botón para abrir el modal
document.addEventListener("DOMContentLoaded", function() {
    const openModalButton = document.getElementById('openModalButton');
    const myModal = document.getElementById('myModal');
    openModalButton.addEventListener('click', function() {
      // Mostrar el modal cambiando la clase de ocultar a mostrar
      myModal.classList.remove('hidden');
    });
});


console.log("Hola");
