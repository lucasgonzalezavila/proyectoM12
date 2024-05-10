document.addEventListener('DOMContentLoaded', function() {
  // Obtener referencia al input de búsqueda
  var searchInput = document.querySelector('.topnav-bar-input');

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

  // Función para realizar la búsqueda de usuarios y mostrar los resultados
  function searchUsers(query) {
      fetch(`/search/${query}`)
          .then(response => response.json())
          .then(data => {
              const searchResults = document.getElementById('searchResults');
              searchResults.innerHTML = '';

              // Verificar si se encontraron usuarios
              if (data.length > 0) {
                  data.forEach(user => {
                      const listItem = document.createElement('li');
                      listItem.textContent = user.name;
                      listItem.addEventListener('click', () => showUser(user.name));
                      searchResults.appendChild(listItem);
                  });
              } else {
                  // Si no se encontraron usuarios, mostrar un mensaje
                  const noResultsItem = document.createElement('li');
                  noResultsItem.textContent = 'No se encontraron resultados';
                  searchResults.appendChild(noResultsItem);
              }
          });
  }

  // Función para mostrar los datos del usuario seleccionado
  function showUser(name) {
      fetch(`/search/${name}`)
          .then(response => response.json())
          .then(user => {
              const userData = document.getElementById('userData');
              userData.innerHTML = `
                  <h2>${user.name}</h2>
                  <p>Email: ${user.email}</p>
                  <!-- Agrega más detalles del usuario según sea necesario -->
              `;
          });
  }

  // Agregar evento de escucha al presionar "Enter" en el input de búsqueda
  searchInput.addEventListener('keypress', function(event) {
      // Verificar si la tecla presionada es "Enter" (código 13)
      if (event.key === 'Enter') {
          performSearch();
      }
  });

  // Agregar evento de escucha al campo de búsqueda para manejar el autocompletado
  searchInput.addEventListener('input', function() {
      // Obtener el valor del input de búsqueda
      var searchTerm = searchInput.value.trim();

      // Realizar la búsqueda de usuarios solo si el término de búsqueda no está vacío
      if (searchTerm !== '') {
          searchUsers(searchTerm);
      }
  });
});
