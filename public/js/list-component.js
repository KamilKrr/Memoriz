
document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $listComponents = Array.prototype.slice.call(document.querySelectorAll('.memory-set-header'), 0);
  
    // Check if there are any navbar burgers
    if ($listComponents.length > 0) {
  
      // Add a click event on each of them
      $listComponents.forEach( el => {
        el.addEventListener('click', () => {
  
          // Get the target from the "data-target" attribute
          const $target = el.parentElement.querySelector(".dropdown")
  
          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          $target.classList.toggle('is-hidden');
  
        });
      });
    }
  
  });