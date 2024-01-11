<?php
session_start();
include('connexion.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Vie étudiante</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_vie_etudiante.css">
    <link rel='stylesheet' href='css/style_navigation.css'>

    <link rel='stylesheet' href='css/dark_mode.css'>


</head>


<body>

<?php
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
        header('Location: backofficeprof.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }

    ?>
 <header>
        <div class='menu'>

            <!-- Logo Accueil -->
            <a href='accueil.php'><img class="logo" src='./img/logo.svg' alt="page d'accueil"
                    aria-current="currentpage"></a>

            <!-- Navigation desktop -->
            <nav class='navigation'>
                <ul class='choix'>
                    <li><a href='cours.php'>Mes cours</a></li>
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
                    <label for="barre de recherche"></label>
                    <input id="barre de recherche" class='input' type='search' placeholder='Search' />
                </div>

                <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
                <div class='icon-photo'>
                    <a href='messagerie.php'><img class='lettre' src='./img/1-lettre.svg' alt="messagerie"></a>
                    <button class="dark_button" onclick="toggleDarkMode()"><img class='dark_mode' src='./img/1-moon.svg'
                            alt="mode sombre"></button>



                    <!-- PHP - LIEN VERS LA PAGE profil.php POUR MODIF LA PDP-->
                    <div class='photo-2'>

                        <?php
                        include('connexion.php');

                        if (isset($_SESSION["login"])) {
                            $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                            $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($result) {
                                echo "
                                <a href='profil.php'> <img src='upload/{$result['photoprofil']}' alt='' class='photo-2'></a>";
                            }
                        }
                        ?>

                    </div>
                    <!-- FIN PHP-->
                    <form action="deconnexion.php" method="GET">
                        <button type="submit" name="deconnect" id="btnDeconnexion">
                            <img class="logout" src="img/1-logout.svg" alt="Déconnexion">
                        </button>
                    </form>

                </div>
            </nav>

            <!-- Navigation mobile & tablette -->
            <div class='menu-burger'>

                <span id='burger-menu'> <img class="img_menu" src='./img/menu.svg' alt='menu'></span>

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
                                    <a href='profil.php'>
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
                        echo "<p>{$result['bio']}</p> 
                                </div>
                            </div>";

                    }
                    ?>
                    <!-- FIN PHP   -->


                    <ul class='choix-2'>
                        <li><a href='cours.php'>Mes cours</a></li>
                        <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
                        <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
                        <li><a href='page_crous.php'>Crous</a></li>
                    </ul>


                    <div class='tools'>
                        <div class='tool'>
                            <img class="param" src='img/1-param.png' alt=''>
                            <a href='profil.php'><p>Profil</p></a>
                        </div>
                        <div class='tool'>
                            <img class="lettre" src='img/1-lettre.svg' alt=''>
                            <a href='messagerie.php'><p>Messagerie</p></a>
                        </div>
                        <div class='tool'>
                            <button class="flex_bouton" onclick="toggleDarkMode()"><img class='dark_mode'
                                    src='./img/1-moon.svg' alt="mode sombre">
                                <p>Mode sombre</p>
                            </button>
                        </div>
                        <div class='tool'>
                            <img class="logout" src='img/1-logout.svg' alt=''>
                            <form action="deconnexion.php" method="GET">
                                <button class="btnDeconnexion" type="submit" name="deconnect" id="btnDeconnexion">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>

                </nav>

                <div class='overlay'></div>

            </div>

        </div>

    </header>


    <main>

        <div class="container-1">

            <div class="etude">
                <p>Bienvenue sur la page dédiée à la Vie Étudiante, l'espace dynamique où se tissent les liens sociaux,
                    culturels et sportifs au sein de notre communauté académique</p>
                <img src="img/2-etud_1.png" alt="">
            </div>



            <div class="div-1">
                <h1>Clubs et Associations</h1>
                <div class="etude-1">
                    <p>Rejoignez nous ! Qu'il s'agisse de
                        musique, de bénévolat ou de sports, vous trouverez certainement un groupe partageant vos
                        intérêts !
                    </p>

                    <a href="">
                        <p class="view">voir plus</p>
                    </a>

                    <img src="img/2-etud_2.png" alt="">


                </div>
            </div>

            <div class="div-2">
                <h1>Aide sociales</h1>
                <div class="etude-1">
                    <p>Consultez nos services d'aide sociale pour obtenir des informations sur les bourses, le logement
                        étudiant, et bien plus encore.</p>

                    <a href="">
                        <p class="view">voir plus</p>
                    </a>

                    <img src="img/2-etud_3.png" alt="">

                </div>
            </div>

            <div class="div-3">
                <h1>Logement Étudiant</h1>
                <div class="etude-1">

                    <p>À la recherche de résidences universitaires ? Nous vous aidons à naviguer dans les choix qui correspondent
                        le
                        mieux à vos besoins.</p>

                    <a href="">
                        <p class="view">voir plus</p>
                    </a>

                    <img src="img/2-etud_4.png" alt="">

                </div>
            </div>

            <div class="div-4">
                <h1>Services de Santé</h1>
                <div class="etude-1">

                    <p>Découvrez nos services de santé sur le campus, y compris les cliniques, les conseils
                        nutritionnels et
                        les ressources pour la santé mentale.</p>

                    <a href="">
                        <p class="view">voir plus</p>
                    </a>

                    <img src="img/2-etud_5.png" alt="">

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
<script src='js/script_dark_mode.js'></script>

</html>