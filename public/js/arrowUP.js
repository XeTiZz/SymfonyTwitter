document.addEventListener('DOMContentLoaded', function() {
    const arrowUpButton = document.querySelector('.arrowUP');
  
    arrowUpButton.addEventListener('click', function(event) {
      event.preventDefault();
  
      // Défilement fluide (smooth scrolling) vers le haut de la page
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  });
  