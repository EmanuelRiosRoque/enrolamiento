document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader");

    // Mostrar loader al enviar cada formulario
    const forms = document.querySelectorAll('#env-correo');
    forms.forEach(function (form) {
        form.addEventListener("click", function () {
            loader.classList.remove("hidden");
        });
    });

    // Mostrar loader al hacer clic en cada botón de eliminación
    const deleteButtons = document.querySelectorAll('#delete');
    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            loader.classList.remove("hidden");
        });
    });

});
