function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle('dark-body');

    var cards = document.querySelectorAll(".card, .bloc-7, .cours, bloc-2, .graphique");
    cards.forEach(function(card) {
        card.classList.toggle('dark-mode');
    })

    var menu = document.querySelector(".menu");
    menu.classList.toggle('dark-mode');

    var textes = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a");
    textes.forEach(function(texte) {
        texte.classList.toggle('white-text');
    })

    var autres = document.querySelectorAll(".input");
    autres.forEach(function(autre) {
        autre.classList.toggle('dark-body');
    })

         // Stocker l'état du mode sombre dans le stockage local
    localStorage.setItem('dark-body', body.classList.contains('dark-body'));
}

// Restaurer l'état du mode sombre au chargement de la page
if (localStorage.getItem('dark-body') === 'true') {
    
    var body = document.body;
    body.classList.toggle('dark-body');

    var cards = document.querySelectorAll(".card, .bloc-7, .cours, bloc-2, .graphique");
    cards.forEach(function(card) {
        card.classList.toggle('dark-mode');
    })

    var menu = document.querySelector(".menu");
    menu.classList.toggle('dark-mode');

    var textes = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a");
    textes.forEach(function(texte) {
        texte.classList.toggle('white-text');
    })

    var autres = document.querySelectorAll(".input");
    autres.forEach(function(autre) {
        autre.classList.toggle('dark-body');
    })
}
