document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('[id^="authentication-modal-"]');

    modals.forEach(function(modal) {
        const enviarBtn = modal.querySelector('.enviar-btn');
        const emailInput = modal.querySelector('input[name="email"]');
        const documentoInput = modal.querySelector('input[name="file"]');
        const alertaBouth = modal.querySelector('.alert');

        enviarBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const email = emailInput.value.trim();
            const documento = documentoInput.files[0];

            if (!email || !documento) {
                alertaBouth.classList.remove('hidden');
            } else {
                alertaBouth.classList.add('hidden');
                modal.querySelector('form').submit();
            }
        });
    });
});
