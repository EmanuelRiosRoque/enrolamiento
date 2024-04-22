document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const empleadosRows = document.querySelectorAll('tr[id^="empleado_"]');

    searchInput.addEventListener('input', function(event) {
        const searchTerm = event.target.value.trim().toLowerCase();

        empleadosRows.forEach(function(empleadoRow) {
            const empleadoData = empleadoRow.textContent.toLowerCase();

            if (empleadoData.includes(searchTerm)) {
                empleadoRow.removeAttribute('hidden');
            } else {
                empleadoRow.setAttribute('hidden', 'true');
            }
        });
    });
});

