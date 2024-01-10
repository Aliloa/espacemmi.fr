document.addEventListener("DOMContentLoaded", function () {
    (function () {
        var burgerMenu = document.getElementById('burger-menu');
        var nav = document.querySelector('.burger');
        var overlay = document.querySelector('.overlay');

        burgerMenu.addEventListener('click', function () {
            if (nav.style.display === 'block') {
                nav.style.display = 'none';
                overlay.style.display = 'none';
            } else {
                nav.style.display = 'block';
                overlay.style.display = 'block';
            }
        });

        // Pour fermer la nav en cliquant à l'extérieur
        document.addEventListener('click', function (event) {
            var clickDehors = nav.contains(event.target);
            var clickMenu = burgerMenu.contains(event.target);

            if (!clickDehors && !clickMenu) {
                nav.style.display = 'none';
                overlay.style.display = 'none';
            }
        });
    })();



});