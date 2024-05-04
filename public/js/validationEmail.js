document
    .getElementById("enviar-btn")
    .addEventListener("click", function (event) {
        const email = document.getElementById("email").value.trim();
        const documentoInput = document.getElementById("dropzone-file");
        const documento = documentoInput.files[0];
        var emailInput = document.getElementById("email");
        var alertaGmail = document.getElementById("alerta-gmail");

        if (!email || !documento) {
            event.preventDefault();
            document.getElementById("alerta-bouth").classList.remove("hidden");
        } else {
            document.getElementById("alerta-bouth").classList.add("hidden");
        }

        var correo = emailInput.value;

        // Expresión regular para validar el formato del correo electrónico
        var regex =
            /^[a-zA-Z0-9._%+-]+@(gmail|hotmail|outlook|yahoo)\.(com|mx|es|edu|org)$/;

        // Verificar si el correo electrónico coincide con la expresión regular
        if (!regex.test(correo)) {
            // Si no coincide, mostrar el mensaje de alerta
            event.preventDefault();
            alertaGmail.classList.remove("hidden");
        } else {
            // Si coincide, ocultar el mensaje de alerta
            alertaGmail.classList.add("hidden");
        }
    });


    setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            errorAlert.classList.add('hidden');
        }
    }, 7000);

    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            errorAlert.classList.add('hidden');
        }
    }, 5000);
