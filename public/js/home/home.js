document.addEventListener('DOMContentLoaded', function() {
    // Obtener referencia al input de búsqueda
    var searchInput = document.getElementById('inputSearch');
  
    // Función para realizar la búsqueda
    function performSearch() {
        // Obtener el valor del input de búsqueda
        var searchTerm = searchInput.value.trim();
  
        // Verificar si el término de búsqueda no está vacío
        if (searchTerm !== '') {
            // Redirigir a la página de búsqueda con el término de búsqueda
            window.location.href = "/search/" + searchTerm;
        }
    }
  
    // Agregar evento de escucha al presionar "Enter" en el input de búsqueda
    searchInput.addEventListener('keypress', function(event) {
        // Verificar si la tecla presionada es "Enter" (código 13)
        if (event.key === 'Enter') {
            performSearch();
        }
    });
  });
  