const postsTable = document.getElementById('postsTable');
if (postsTable) {
  new simpleDatatables.DataTable(postsTable, {
    columns: [
      {
        select: [4],
        sortable: false
      }
    ],
    labels: {
      placeholder: "Buscar...", // Placeholder del campo de búsqueda
      perPage: "entradas por página", // Texto para el selector de entradas por página
      noRows: "No se encontraron registros", // Mensaje cuando no hay registros
      info: "Mostrando {start} a {end} de {rows} entradas", // Información de paginación
    }
  });
}

const categoriesTable = document.getElementById('categoriesTable');
if (categoriesTable) {
  new simpleDatatables.DataTable(categoriesTable, {
    columns: [
      {
        select: [1],
        sortable: false
      }
    ],
    labels: {
      placeholder: "Buscar...", // Placeholder del campo de búsqueda
      perPage: "entradas por página", // Texto para el selector de entradas por página
      noRows: "No se encontraron registros", // Mensaje cuando no hay registros
      info: "Mostrando {start} a {end} de {rows} entradas", // Información de paginación
    }
  });
}