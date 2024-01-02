<<?php

session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Accueil</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_accueil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">

</head>


<body>

    <header>
        <div class="menu">

            <!-- Logo Accueil -->
            <a href="accueil.php"><img src="./img/logo.svg" alt="page d'accueil"></a>


            <!-- Navigation desktop -->
            <nav class="navigation">

                <ul class="choix">
                    <li><a href="">Mes cours</a></li>
                    <li><a href="vie_etudiante.php">Vie étudiante</a></li>
                    <li><a href="">Vie scolaire</a></li>
                    <li><a href="page_crous.php">Crous</a></li>
                </ul>

                <!-- Barre de recherche -->
                <div class="group">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="icon">
                        <g>
                        <path
                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                        ></path>
                        </g>
                    </svg>

                    <input class="input" type="search" placeholder="Search" />
                </div>

                <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
                <div class="icon-photo">

                    <img class="logo" src="./img/1-lettre.svg" alt="page d'accueil">
                    <img class="logo" src="./img/1-notif.svg" alt="page d'accueil">
                    <img class="logo" src="./img/1-moon.svg" alt="page d'accueil">

                    <!-- PHP - AJOUTEZ LE LIEN POUR LA D2CONEXION ET LE LIEN VERS LA PAGE PARAMETRES.PHP POUR MODIF LA PDP-->
                    <div class="photo-2">
                        <img src="" alt="">
                    </div>
                    <!-- FIN PHP-->

                </div>

            </nav>

            
            <!-- Navigation mobile & tablette -->
            <div class="menu-burger">
                <span id="burger-menu"> <img src="./img/menu.svg" alt="menu"></span>

                <nav class="burger">
                    
                    <!-- PHP/ MODIFIEZ LA STRUCTURE POUR ADAPTER A L UTILISATEUR   -->
                    <div class="kelis">
                        <div class="profil-1">
                            <a href="parametres.php"> <div class="photo-1"></div></a>

                            <div class="profil-2">
                                <h1>Loana Chalach</h1>
                                <p>MMI 2</p>
                            </div>
                        </div>

                        <div class="profil-3">
                            <h2>À propos</h2>
                            <p>Moi dans la vie, j'aime bien la nourriture</p>
                        </div>

                    </div>
                    <!-- FIN PHP   -->


                    <ul class="choix-2">
                        <li><a href="">Mes cours</a></li>
                        <li><a href="vie_etudiante.php">Vie étudiante</a></li>
                        <li><a href="">Vie scolaire</a></li>
                        <li><a href="page_crous.php">Crous</a></li>
                        <li><a href="">Déconnexion</a></li>
                    </ul>


                    <div class="tools">

                        <div class="tool">
                            <img src="img/1-notif.svg" alt="">
                            <p>Notifications</p>
                        </div>

                        <div class="tool">
                            <img src="img/1-param.png" alt="">
                            <p>Paramètres</p>
                        </div>

                        <div class="tool">
                            <img src="img/1-lettre.svg" alt="">
                            <p>Messagerie</p>
                        </div>

                        <div class="tool">
                            <img src="img/1-moon.svg" alt="">
                            <p>Mode sombre</p>
                        </div>


                    </div>



                </nav>

                <div class="overlay"></div>
            </div>

        </div>
    </header>

    <main>





















    </main>





</body>

<script src="js/script_accueil.js"></script>

</html>