document.addEventListener('DOMContentLoaded', (event) => {
  const themeLink = document.getElementById('theme-link');
  const toggleButton = document.getElementById('toggle-theme');

  // Verificar el tema guardado en localStorage
  const savedTheme = localStorage.getItem('theme') || 'light';
  if (savedTheme === 'dark') {
    themeLink.href = '/assets/css/bsthemes/dark.css';
  }

  // Función para cambiar el tema
  toggleButton.addEventListener('click', () => {
    if (themeLink.href.includes('bootstrap.min.css')) {
      themeLink.href = '/assets/css/bsthemes/dark.css';
      localStorage.setItem('theme', 'dark');
    } else {
      themeLink.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
      localStorage.setItem('theme', 'light');
    }
  });
});