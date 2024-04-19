// Función para mostrar el modal
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', 'false');
}

// Función para ocultar el modal
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.add('hidden');
    modal.setAttribute('aria-hidden', 'true');
}

// Función para manejar los clics en los botones
function toggleModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal.classList.contains('hidden')) {
        openModal(modalId);
    } else {
        closeModal(modalId);
    }
}

// Agregar event listener para el botón que abre y cierra el modal
document.addEventListener('DOMContentLoaded', function () {
    var toggleButtons = document.querySelectorAll('[data-modal-toggle]');
    toggleButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var targetModalId = this.getAttribute('data-modal-target');
            toggleModal(targetModalId);
        });
    });

    // Agregar event listener para los botones que cierran el modal
    var closeButton = document.querySelectorAll('[data-modal-hide]');
    closeButton.forEach(function (button) {
        button.addEventListener('click', function () {
            var modalId = this.getAttribute('data-modal-hide');
            closeModal(modalId);
        });
    });
});
