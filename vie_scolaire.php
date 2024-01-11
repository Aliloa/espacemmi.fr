<?php
session_start();
include('connexion.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Vie scolaire</title>
    <link rel='stylesheet' href='css/style_vie_scolaire.css'>
    <link rel='stylesheet' href='css/style_navigation.css'>
    <link rel='stylesheet' href='css/dark_mode.css'>
    <link rel="icon" href="img/favicon.png">
</head>

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
                            <a href='profil.php'>
                                <p>Profil</p>
                            </a>
                        </div>
                        <div class='tool'>
                            <img class="lettre" src='img/1-lettre.svg' alt=''>
                            <a href='messagerie.php'>
                                <p>Messagerie</p>
                            </a>
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




    <?php
    include("connexion.php");
    $requete = "SELECT * FROM travail_a_faire ORDER BY date DESC";
    $stmt = $db->query($requete);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class='container'>


        <div class='bloc-1a'>
            <h1>Travail à faire</h1>
            <?php foreach ($results as $result) {
                echo "<div class='matiere-date'>
                        <div>
                            <h2>{$result['travail']}</h2>
                            <p>{$result['enseignant']}</p>
                        </div>
                        <p class='small-date'>Rendu: {$result['date']}</p>
                    </div><br> ";
            }
            ?>

        </div>

        <?php
        $requete = "SELECT * FROM controle ORDER BY date DESC ";
        $stmt = $db->query($requete);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class='bloc-2a'>
            <h1>Contrôle à venir</h1>
            <?php foreach ($results as $result) { echo"
                <div class='matiere-date'>
                    <div>
                        <h2>{$result['controle']}</h2>
                        <p>{$result['enseignant']}</p>
                    </div>
                    <p class='small-date'> {$result['date']}
                    </p>
                </div>";
            }
          ?>

        </div>

        <?php
        $requete = "SELECT abscence_retard.id_abs, abscence_retard.titre, abscence_retard.date, abscence_retard.debut, abscence_retard.fin, grossematiere.nom_mat
                    FROM abscence_retard
                    INNER JOIN grossematiere ON abscence_retard.matiere_ext = grossematiere.id_matiere
                    ORDER BY abscence_retard.id_abs DESC";
        $stmt = $db->query($requete);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class='bloc-3a'>
            <div class="bouton">
                <h1>Absences et retards</h1>
                <?php foreach ($results as $result) { ?>
                    <div class='matiere-date'>
                        <div>
                            <h2>
                                <?php echo $result['titre']; ?>
                            </h2>
                            <p>
                                <?php echo $result['nom_mat']; ?>
                            </p>
                            <p>
                                <?php echo "Le " . $result['date']; ?>
                            </p>
                        </div>
                        <p class='small-date'>
                            <!-- montrer le temps d'absence en calculant la différence entre le début et la fin -->
                            <?php echo (new DateTime($result['debut']))->diff(new DateTime($result['fin']))->format('%Hh %imin'); ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>


        <?php

        $requete = "SELECT * FROM notes ORDER BY id_note DESC";
        $stmt = $db->query($requete);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class='bloc-4a'>
            <div class="bouton">
                <h1>Les moyennes</h1>
                <?php foreach ($results as $result) { echo"
                    <div class='matiere-date'>
                        <h2>
                            {$result['nom_note']}
                        </h2>
                        <p class='small-date'>
                           {$result['notes']} /20
                        </p>
                    </div>";
                }
                ?>

            </div>
        </div>

    </div>



    </div>



    </div>


    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>





</body>

<script src='js/script_accueil.js'></script>

<script src='js/script_dark_mode.js'></script>

</html>