
document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $listComponents = Array.prototype.slice.call(document.querySelectorAll('.memory-set-header'), 0);
  
    // Check if there are any navbar burgers
    if ($listComponents.length > 0) {
  
      // Add a click event on each of them
      $listComponents.forEach( component => {
        const $closedcomponent = component.parentElement.querySelector(".dropdown");
        var clickable = [component.querySelector(".chevron"), component.querySelector(".name"), component.querySelector(".kategorie"), component.querySelector(".jahrgang")];
        var chevron = component.querySelector("span.icon");
        var isOpen = false;
        clickable.forEach( clickable =>
          clickable.addEventListener('click', () => {
  
  
            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            $closedcomponent.classList.toggle('is-hidden');
            if(!isOpen){
              chevron.innerHTML = "<i class='fas fa-chevron-up'></i>";
            }
            else{
              chevron.innerHTML = "<i class='fas fa-chevron-down'></i>";
            }
            isOpen = !isOpen;
          
            
    
          })
        );
        
      });
    }
  
  });