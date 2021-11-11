let cerrar = document.querySelectorAll(".closeC")[0];
let abrir = document.querySelectorAll(".cta-mod")[0];
let modal = document.querySelectorAll(".container-carrito")[0];
let modalC = document.querySelectorAll(".modal-container-cart")[0];

  abrir.addEventListener("click", function(e){
    e.preventDefault();
    modalC.style.opacity = "1";
    modalC.style.visibility = "visible";
    modal.classList.toggle("modal-closeC");
  });
  
  cerrar.addEventListener("click", function(){

    modal.classList.toggle("modal-closeC");
    
    setTimeout(function(){
      modalC.style.opacity = "0";
      modalC.style.visibility = "hidden";
    },800)

  })

  window.addEventListener("click", function(e){

    if(e.target == modalC){

    modal.classList.toggle("modal-closeC");
    
    setTimeout(function(){
      modalC.style.opacity = "0";
      modalC.style.visibility = "hidden";
    },800)
    }
  })