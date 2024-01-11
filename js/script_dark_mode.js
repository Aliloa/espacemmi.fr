
function toggleDarkMode() {

    let body = document.body;
    body.classList.toggle('dark-body');

    let cards = document.querySelectorAll(".card, .bloc-7, .cours, .bloc-2, .graphique, .burger, .etude-1, .bloc-1a, .bloc-2a, .bloc-3a, .bloc-4a, hr, .ajouter");
    cards.forEach(function(card) {
        card.classList.toggle('dark-mode');
    })

    let menu = document.querySelector(".menu");
    menu.classList.toggle('dark-mode');

    let textes = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a, button");
    textes.forEach(function(texte) {
        texte.classList.toggle('white-text');
    })

    let autres = document.querySelectorAll(".input, input, select");
    autres.forEach(function(autre) {
        autre.classList.toggle('dark-body');
    })

    var logo = document.querySelector(".logo");
    var boutons = document.querySelectorAll(".dark_mode");
    var burger_menu = document.querySelector(".img_menu");
    var lettres = document.querySelectorAll(".lettre");
    var logouts = document.querySelectorAll(".logout");
    var param = document.querySelector(".param");
    if (body.classList.contains('dark-body')) {
        logo.src = './img/logo-blanc.svg';
        boutons.forEach(function(bouton){
            bouton.src = './img/soleil.svg';
        })
        burger_menu.src = './img/menu_white.png';

        lettres.forEach(function(lettre){
            lettre.src = './img/lettre_white.png';
        })
        logouts.forEach(function(logout){
            logout.src = 'img/logout_white.png';
        })
        param.src = 'img/param_white.png';
        
    } else {
        logo.src = './img/logo.svg';
        boutons.forEach(function(bouton){
        bouton.src = './img/1-moon.svg';
    })
    burger_menu.src = './img/menu.svg';

    lettres.forEach(function(lettre){
        lettre.src = './img/1-lettre.svg';
    })
    logouts.forEach(function(logout){
        logout.src = 'img/1-logout.svg';
    })
    param.src = 'img/1-param.png';
    }
    

         // Stocker l'état du mode sombre dans le stockage local
    localStorage.setItem('dark-body', body.classList.contains('dark-body'));
    console.log(localStorage)
}

// Restaurer l'état du mode sombre au chargement de la page
if (localStorage.getItem('dark-body') === 'true') {
    
    toggleDarkMode();
}
