document.addEventListener('DOMContentLoaded', () => {

  const $listComponents = Array.prototype.slice.call(document.querySelectorAll('.memory-set-header'), 0);

  if ($listComponents.length > 0) {
    $listComponents.forEach(component => {
      const $closedcomponent = component.parentElement.querySelector(".dropdown");
      var clickable = [component.querySelector(".chevron"), component.querySelector(".name"), component.querySelector(".kategorie"), component.querySelector(".jahrgang")];
      var chevron = component.querySelector("span.icon");
      var isOpen = false;
      clickable.forEach(clickable =>
        clickable.addEventListener('click', () => {

          $closedcomponent.classList.toggle('is-hidden');
          if (!isOpen) {
            chevron.innerHTML = "<i class='fas fa-chevron-up'></i>";
          } else {
            chevron.innerHTML = "<i class='fas fa-chevron-down'></i>";
          }
          isOpen = !isOpen;
        })
      );
    });
  }

  document.querySelector(".memorySetSuche").addEventListener("input", filterMemorySets);
  document.querySelector(".kategorieFilter").addEventListener("change", filterMemorySets);
  document.querySelector(".jahrgangFilter").addEventListener("change", filterMemorySets);

  filterMemorySets();
});

function filterMemorySets(){
  let queryInput = document.querySelector(".memorySetSuche").value.trim().toLowerCase();
  let kategorieInput = document.querySelector(".kategorieFilter").value.toLowerCase();
  let jahrgangInput = document.querySelector(".jahrgangFilter").value.toLowerCase();

  let memorySets = document.querySelectorAll(".memorySet");

  memorySets.forEach((memorySet) => {
    let matches = true;

    let name = memorySet.querySelector(".memory-set-name").textContent.trim().toLowerCase();
    let beschreibung = memorySet.querySelector(".memory-set-beschreibung").textContent.trim().toLowerCase();
    let autor = memorySet.querySelector(".memory-set-autor").textContent.trim().toLowerCase();
    let jahrgang = memorySet.querySelector(".memory-set-jahrgang").textContent.trim().toLowerCase();
    let kategorie = memorySet.querySelector(".memory-set-kategorie").textContent.trim().toLowerCase();
    let tags = memorySet.querySelector(".memory-set-tags").textContent.trim().toLowerCase();

    if(kategorieInput != "leer"){
      if(kategorieInput != kategorie){
        matches = false;
      }
    }
    if(jahrgangInput != "leer"){
      if(jahrgangInput != jahrgang){
        matches = false;
      }
    }

    if(queryInput != ""){
      if(name.indexOf(queryInput) == -1){
        matches = false;
      }
    }
    
    if(!matches){
      hideMemorySet(memorySet);
    }else{
      showMemorySet(memorySet);
    }

  });
}

function hideMemorySet(memorySet){
  memorySet.style.display = "none";
}

function showMemorySet(memorySet){
  memorySet.style.display = "";
}