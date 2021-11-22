let cerrar = document.querySelectorAll(".close")[0];

let abrir = document.querySelectorAll('.cta')[0];

let modal = document.querySelectorAll(".modals1")[0];

let modalC = document.querySelectorAll(".modal-container")[0];

  abrir.addEventListener("click", function(e){
    e.preventDefault();
    modalC.style.opacity = "1";
    modalC.style.visibility = "visible";
    modal.classList.toggle("modal-close");
  });
  
  cerrar.addEventListener("click", function(){

    modal.classList.toggle("modal-close");
    
    setTimeout(function(){
      modalC.style.opacity = "0";
      modalC.style.visibility = "hidden";
    },800)

  })

  window.addEventListener("click", function(e){

    
    if(e.target == modalC){

    modal.classList.toggle("modal-close");
    
    setTimeout(function(){
      modalC.style.opacity = "0";
      modalC.style.visibility = "hidden";
    },800)
    }
  })

