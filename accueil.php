<?php
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
                    <li><a href="vie_scolaire.php">Vie scolaire</a></li>
                    <li><a href="page_crous.php">Crous</a></li>
                </ul>

                <!-- Barre de recherche -->
                <div class="group">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="icon">
                        <g>
                            <path
                                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                            </path>
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

                    <!-- PHP/ STRUCTURE POUR ADAPTER A L UTILISATEUR   -->
                    <div class="kelis">
                        <div class="profil-1">
                            <a href="parametres.php">
                                <div class="photo-1"></div>
                            </a>

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
                        <li><a href="vie_scolaire.php">Vie scolaire</a></li>
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


        <div class="container">

            <div class="bloc-1">
                <div>
                    <h1>Bonjour Loana, sympa de vous revoir !</h1>
                    <p>Bienvenue sur l'EntMMi, votre espace dédié au Multimédia et à l'Informatique. Explorez, et
                        découvrez les dernières informations disponibles.</p>
                </div>

                <img src="img/1-perso.png" alt="">
            </div>


            <div class="bloc-2">

                <!-- emploi du temps -->

            </div>


            <div class="bloc-3">

                <h1>Vos derniers cours ajoutés</h1>
                <a href="derniers_cours.php">
                    <p class="vp">voir plus</p>
                </a>

                <?php
                include("connexion.php");
                $requete = "SELECT * FROM cours ORDER BY id_cours DESC LIMIT 2 ";
                $stmt = $db->query($requete);
                $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);


                foreach ($resultat as $cours) {
                    echo "<div class=\"cours\">
                            <img src=\"{$cours["img"]}\" alt=\"\">
            
                            <div>
                                <h2>{$cours["cours"]}</h2>
                                <p> Crée par {$cours["prof"]}</p>
                            </div>
                        </div>
                    ";
                }
                ?>

            </div>


            <div class="bloc-4">

                <h1>Forum</h1>
                <a href="forum.php">
                    <p class="vp">voir plus</p>
                </a>

                <?php
                include("connexion.php");
                $requete = "SELECT * FROM forum ORDER BY id ";
                $stmt = $db->query($requete);
                $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);


                foreach ($resultat as $forum) {
                    echo "<div class=\"cours\">
        
                            <div>
                                <h2>{$forum["login"]}</h2>
                                <p>{$forum["commentaire"]}</p>
                            </div>
                        </div>
                    ";
                }
                ?>

            </div>



            <div class="bloc-5">

                <h1>Vos dernières notes</h1>
                <a href="vie_scolaire.php">
                    <p class="vp">voir plus</p>
                </a>

                <div class="graphique">

                    <!-- graphique -->

                </div>

            </div>



            <div class="bloc-6">

                <h1>Menu du jour</h1>

                <?php
                include("connexion.php");
                $requete = "SELECT * FROM crous ORDER BY date ASC LIMIT 1";
                $stmt = $db->query($requete);
                $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);


                foreach ($resultat as $menu) {
                    echo "<div class='card'>
                        <img src = {$menu['image_plat']} alt=''>
                        <h2>Plat du jour</h2>
                        <p> {$menu['plat']}</p> <br> 
                        <p>...  </p>
                        <a href=\"menu_du_jour.php\"><p class='btn'>voir plus</p></a>
                    </div>";
                }



                ?>

            </div>




            <div class="bloc-7">

                <div class="kelis-2">
                    <img src="img/1-icon.png" alt="">
                    <p>kelis.keren</p>
                    <p class="p">En ligne</p>
                </div>

                <div class="kelis-2">
                    <img src="img/2-icon.png" alt="">
                    <p>anchana</p>
                    <p class="p">En ligne</p>
                </div>

                <div class="kelis-2">

                    <img src="img/3-icon.png" alt="">
                    <p>alina</p>
                    <p class="p">En ligne</p>
                </div>

            </div>

        </div>
















    </main>


    <footer>
        <a href="mentions_legales.html">
            <p> Mentions légales </p>
        </a>
    </footer>


</body>

<script src="js/script_accueil.js"></script>

</html>