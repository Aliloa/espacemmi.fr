const voir_plus = document.querySelectorAll(".voir_plus");
const pop_ups = document.querySelectorAll(".pop_up");

//OUVRIR POP UP
//Quand on clique sur le bouton voir plus ça récupère son id et ça trouve la section qui porte le même id pour l'afficher
voir_plus.forEach(function(element) {
    element.addEventListener('click', function() {
        let clicked = this.id;
        console.log(clicked);
        
        let bon_pop_up = document.querySelector('.bon_pop_up');

if (!bon_pop_up) {
    pop_ups.forEach(function(pop_up) {
        if (pop_up.id === clicked) {
            bon_pop_up = pop_up;
        }
    });
}
console.log(bon_pop_up);

bon_pop_up.style.display = "flex";

    });
});

//FERMER POP UP
pop_ups.forEach(function(element) {
    element.addEventListener('click', function() {
        pop_ups.forEach(function(pop_ups){
            pop_ups.style.display = "none";
        })
    })
})

//CAROUSEL POUR MOBILE

const bouton_droite = document.querySelector(".carousel_droite");
const bouton_gauche = document.querySelector(".carousel_gauche");
const carousel = document.querySelector(".carousel");
//Calculer le nombre d'élements dans le carousel
const nombre_slide = document.querySelectorAll(".carousel-item").length;
var position = 0;

function decaleDroite () {
    carousel.style.left = position-100+"%";
    position = position - 100
    if (position <= nombre_slide* (-100)){
      carousel.style.left = "0%"
      position = 0
    }
    console.log(position)
}
function decaleGauche () {
    carousel.style.left = position+100+"%";
    position = position + 100
    if (position > 0){
      carousel.style.left = nombre_slide*(-100)+100 + "%";
      position = nombre_slide*(-100)+100;
    }
    console.log(position)
}

bouton_droite.addEventListener('click', decaleDroite);
bouton_gauche.addEventListener('click', decaleGauche);