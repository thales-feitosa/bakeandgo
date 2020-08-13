let addCesta = document.querySelector('#add-cart')
let contador = document.querySelector('.contador')

function animation(){
    contador.classList.add('bounce')
}

if(contador && addCesta){
    addCesta.addEventListener('click', animation)
}