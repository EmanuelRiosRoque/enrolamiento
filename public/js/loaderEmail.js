document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader");
    const form = document.getElementById("myForm");

    // Mostrar loader al enviar el formulario
    form.addEventListener("submit", function () {
        loader.classList.remove("hidden");
    });

    // Ocultar loader cuando la página se recargue
    window.addEventListener("load", function () {
        loader.classList.add("hidden");
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader");
    const deleteM = document.getElementById("delete");
    // Mostrar loader al enviar el formulario
    deleteM.addEventListener("click", function () {
        loader.classList.remove("hidden");
    });

    // Ocultar loader cuando la página se recargue
    window.addEventListener("load", function () {
        loader.classList.add("hidden");
    });
});
