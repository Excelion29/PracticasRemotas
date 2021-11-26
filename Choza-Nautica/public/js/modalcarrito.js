let cerrarM = document.querySelectorAll(".closeC")[0];
let abrirM = document.querySelectorAll(".cta-mod")[0];
let modalS = document.querySelectorAll(".container-carrito")[0];
let modalCl = document.querySelectorAll(".modal-container-cart")[0];

  abrirM.addEventListener("click", function(e){
    e.preventDefault();
    modalCl.style.opacity = "1";
    modalCl.style.visibility = "visible";
    modalS.classList.toggle("modal-closeC");
  });
  
  cerrarM.addEventListener("click", function(){

    modalS.classList.toggle("modal-closeC");
    
    setTimeout(function(){
      modalCl.style.opacity = "0";
      modalCl.style.visibility = "hidden";
    },800)

  })

  window.addEventListener("click", function(e){

    if(e.target == modalCl){

    modalS.classList.toggle("modal-closeC");
    
    setTimeout(function(){
      modalCl.style.opacity = "0";
      modalCl.style.visibility = "hidden";
    },800)
    }
  })