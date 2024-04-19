document.getElementById('enviar-btn').addEventListener('click', function(event) {
    const email = document.getElementById('email').value.trim();
    const documentoInput = document.getElementById('dropzone-file');
    const documento = documentoInput.files[0];

    if (!email || !documento) {
        event.preventDefault();
        document.getElementById('alerta-bouth').classList.remove('hidden');
    } else {
        document.getElementById('alerta-bouth').classList.add('hidden');
    }
});
