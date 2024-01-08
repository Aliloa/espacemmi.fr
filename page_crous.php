<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style_crous.css" />
    <link rel='stylesheet' href='css/style_navigation.css'>
    <title>Espace MMI | Menu</title>
    <link rel="icon" href="img/favicon.png">

</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>
    <header>
        <div class='menu'>

            <!-- Logo Accueil -->
            <a href='accueil.php'><img src='./img/logo.svg' alt="page d'accueil" aria-current="currentpage"></a>

            <!-- Navigation desktop -->
            <nav class='navigation'>
                <ul class='choix'>
                    <li><a href=''>Mes cours</a></li>
                    <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
                    <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
                    <li><a href='page_crous.php'>Crous</a></li>
                </ul>

                <!-- Barre de recherche -->
                <div class='group'>
                    <svg viewBox='0 0 24 24' aria-hidden='true' class='icon'>
                        <g>
                            <path
                                d='M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z'>
                            </path>
                        </g>
                    </svg>
                    <input class='input' type='search' placeholder='Search' />
                </div>

                <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
                <div class='icon-photo'>
                    <img class='logo' src='./img/1-lettre.svg' alt="page d' accueil">
                    <img class='logo' src='./img/1-notif.svg' alt="page d' accueil">
                    <img class='logo' src='./img/1-moon.svg' alt="page d' accueil">

                    <!-- PHP - AJOUTEZ LE LIEN POUR LA D2CONEXION ET LE LIEN VERS LA PAGE PARAMETRES.PHP POUR MODIF LA PDP-->
                    <div class='photo-2'>

                        <?php
                        include('connexion.php');

                        if (isset($_SESSION["login"])) {
                            $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                            $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                            $stmt->execute();

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($result) {
                                echo "<a href='parametres.php'> <img src='upload/{$result['photoprofil']}' alt='' class='photo-2'></a>";
                            } else {
                                header('Location:index.php?erreur=access_denied');
                            }
                        }
                        ?>

                    </div>
                    <!-- FIN PHP-->
                </div>
            </nav>

            <!-- Navigation mobile & tablette -->
            <div class='menu-burger'>
                <span id='burger-menu'> <img src='./img/menu.svg' alt='menu'></span>
                <nav class='burger'>
                    <!-- PHP/ STRUCTURE POUR ADAPTER A L UTILISATEUR   -->
                    <?php
                    include('connexion.php');

                    if (isset($_SESSION["login"])) {
                        $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                        $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "
                    <div class='kelis'>
                        <div class='profil-1'>
                            <a href='parametres.php'>
                                <div class='photo-1'>
                                <img src='upload/{$result['photoprofil']}' class='photo-1' alt=''>
                                </div>
                            </a>
                            <div class='profil-2'>";


                        echo "<h1> {$result['prenom']} {$result['nom']}</h1>";
                        echo "<p>{$result['promotion']}</p>";

                        echo "       </div>
                        </div>
                        <div class='profil-3'>
                        <h2>À propos</h2>";
                        echo "<p>{$result['bio']}</p>";

                    }
                    ?>


            </div>
        </div>
        <!-- FIN PHP   -->
        <ul class='choix-2'>
            <li><a href=''>Mes cours</a></li>
            <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
            <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
            <li><a href='page_crous.php'>Crous</a></li>
            <li><a href=''>Déconnexion</a></li>
        </ul>
        <div class='tools'>
            <div class='tool'>
                <img src='img/1-notif.svg' alt=''>
                <p>Notifications</p>
            </div>
            <div class='tool'>
                <img src='img/1-param.png' alt=''>
                <p>Paramètres</p>
            </div>
            <div class='tool'>
                <img src='img/1-lettre.svg' alt=''>
                <p>Messagerie</p>
            </div>
            <div class='tool'>
                <img src='img/1-moon.svg' alt=''>
                <p>Mode sombre</p>
            </div>
        </div>
        </nav>
        <div class='overlay'></div>
        </div>
        </div>
    </header>





    <div class="flex_tout">

        <div class="header_main">

            <div class="container presentation">
                <p>Bienvenue sur la page officielle du Centre Régional des Œuvres Universitaires et
                    Scolaires (CROUS) dédiée aux Restaurants Universitaires à Créteil.</p>
            </div>

            <main class="container">

                <section class="menu_hebdomadaire">
                    <h1 class="fs-4 fw-bold ms-3">Menu hebdomadaire</h1>
                    <div class="card rounded-4 shadow">
                        <div class="infos">
                            <h2>Restaurant universitaire EISEE:</h2>
                            <div class="flex">
                                <p>PAIEMENT POSSIBLE: <br>
                                    Carte bancaire <br>
                                    IZLY</p>
                                <button class="btn"><a href="menu_du_jour.php">Voir le menu</a></button>
                            </div>
                        </div>
                        <hr class="border border-3 m-1">
                        <div class="infos">
                            <h2>Restaurant universitaire Copernic:</h2>
                            <div class="flex">
                                <p>PAIEMENT POSSIBLE: <br>
                                    Carte bancaire <br>
                                    IZLY</p>
                                <button class="btn"><a href="menu_du_jour.php">Voir le menu</a></button>
                            </div>
                        </div>
                        <hr class="border border-3 m-1">
                        <div class="infos">
                            <h2>Menu de la caféteria</h2>
                            <div class="flex">
                                <p>PAIEMENT POSSIBLE: <br>
                                    Carte bancaire <br>
                                    IZLY</p>
                                <button class="btn"><a href="documents/menu.pdf">Voir le menu</a></button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- La carte -->
                <section class="decouvrez_resto">
                    <h1 class="fs-4 fw-bold">Découvrez nos Restaurants Universitaires</h1>
                    <div>
                        Ajouter une map
                        <img src="img/carte.png" alt="" style="width:100%;">
                    </div>
                </section>

            </main>


        </div>

        <aside class="container horaires">
            <div class="card shadow rounded-4">

                <h1 class="p-3 fs-4 fw-bold">Horaires des Restaurants :</h1>

                <div class="flex">
                    <p>Lundi:</p>
                    <p>11h30 - 14h</p>
                </div>
                <hr class="border m-1">
                <div class="flex">
                    <p>Mardi:</p>
                    <p>11h30 - 14h</p>
                </div>
                <hr class="border m-1">
                <div class="flex">
                    <p>Mercredi:</p>
                    <p>11h30 - 14h</p>
                </div>
                <hr class="border m-1">
                <div class="flex">
                    <p>Jeudi:</p>
                    <p>11h30 - 14h</p>
                </div>
                <hr class="border m-1">
                <div class="flex">
                    <p>Vendredi:</p>
                    <p>11h30 - 14h</p>
                </div>
                <hr class="border m-1">
                <div class="flex">
                    <p>Samedi:</p>
                    <p>Fermé</p>
                </div>
                <hr class="border m-1">
                <div class="flex">
                    <p>Dimanche:</p>
                    <p>Fermé</p>
                </div>

            </div>
        </aside>

    </div>

    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>



</body>
<script src="js/script_accueil.js"></script>

</html>