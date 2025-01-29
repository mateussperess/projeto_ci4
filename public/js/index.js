document.addEventListener('DOMContentLoaded', () => {
  function toggleMenu() {
    const menu = document.getElementById('navbar-cta');
    menu.classList.toggle('hidden');
  }

  function toggleDropdown() {
    const dropdown = document.getElementById('user-dropdown');
    dropdown.classList.toggle('hidden');
  }
  
  window.scrollTo({ top: 0, behavior: 'smooth' });

  // back-to-top button
  const backToTopButton = document.getElementById('backToTop');
  const nav = document.getElementById('nav');

  if (!backToTopButton) {
    console.error("Elemento <button> com ID 'backToTop' não encontrado.");
    return;
  }

  if (!nav) {
    console.error("Elemento <nav> com ID 'nav' não encontrado.");
    return;
  }

  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
      backToTopButton.classList.add('show');
    } else {
      backToTopButton.classList.remove('show');
    }
  });

  backToTopButton.addEventListener('click', () => {
    nav.scrollIntoView({ behavior: 'smooth' });
  });
});