
function toggleDarkMode() {

    let body = document.body;
    body.classList.toggle('dark-body');

    let cards = document.querySelectorAll(".card, .bloc-7, .cours, .bloc-2, .graphique, .burger, .etude-1, .bloc-1a, .bloc-2a, .bloc-3a, .bloc-4a");
    cards.forEach(function(card) {
        card.classList.toggle('dark-mode');
    })

    let menu = document.querySelector(".menu");
    menu.classList.toggle('dark-mode');

    let textes = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a");
    textes.forEach(function(texte) {
        texte.classList.toggle('white-text');
    })

    let autres = document.querySelectorAll(".input");
    autres.forEach(function(autre) {
        autre.classList.toggle('dark-body');
    })

    var logo = document.querySelector(".logo");
    var boutons = document.querySelectorAll(".dark_mode");
    var burger_menu = document.querySelector(".img_menu");
    if (body.classList.contains('dark-body')) {
        logo.src = './img/logo-blanc.svg';
        boutons.forEach(function(bouton){
            bouton.src = './img/soleil.svg';
        })
        burger_menu.src = './img/menu_white.png';
        
    } else {
        logo.src = './img/logo.svg';
        boutons.forEach(function(bouton){
        bouton.src = './img/1-moon.svg';
    })
    burger_menu.src = './img/menu.svg';
    }
    

         // Stocker l'état du mode sombre dans le stockage local
    localStorage.setItem('dark-body', body.classList.contains('dark-body'));
    console.log(localStorage)
}

// Restaurer l'état du mode sombre au chargement de la page
if (localStorage.getItem('dark-body') === 'true') {
    
    toggleDarkMode();
}
