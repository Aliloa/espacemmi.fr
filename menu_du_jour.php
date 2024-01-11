<?php
session_start();
include("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style_menu.css" />
    <link rel="stylesheet" type="text/css" href="./css/style_navigation.css" />
    <link rel='stylesheet' href='css/dark_mode.css'>
    <title>Espace mmi menu</title>

</head>


<body>


<?php

    
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
        header('Location: backofficeprof.php?access_denied');
    }
    

    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
        header('Location: backofficeprof.php?access_denied');
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

        <?php
        // Récupérer la date d'aujourd'hui au format SQL
        $dateAujourdhui = date("Y-m-d");
        $lieu = isset($_GET['lieu']) ? $_GET['lieu'] : '';
        // Sélectionner les menus après aujourd'hui, exclure le premier, et limiter à 4 résultats
        $requete = "SELECT * FROM crous WHERE date >= :aujourdhui AND lieu = :lieu ORDER BY date ASC LIMIT 1, 4";
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':aujourdhui', $dateAujourdhui, PDO::PARAM_STR);
        $stmt->bindParam(':lieu', $lieu, PDO::PARAM_STR);
        $stmt->execute();
        $tableauResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // seconde requete pour avoir seulement l'élement de la bdd de la date qui se rapproche de ajoudhui
        $requeteDernier = "SELECT * FROM crous WHERE date >= :aujourdhui AND lieu = :lieu ORDER BY date ASC LIMIT 1";
        $stmtDernier = $db->prepare($requeteDernier);
        $stmtDernier->bindParam(':aujourdhui', $dateAujourdhui, PDO::PARAM_STR);
        $stmtDernier->bindParam(':lieu', $lieu, PDO::PARAM_STR);
        $stmtDernier->execute();
        $dernierElement = $stmtDernier->fetch(PDO::FETCH_ASSOC);

        //LES DATES AVEC LES NOMS DES JOURS
        
        // Traduire les jours de la semaine
        $dayNames = [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche',
        ];

        $date_dernier = new DateTime($dernierElement['date'], new DateTimeZone('Europe/Paris'));
        $jour_anglais_d = $date_dernier->format('l');
        $nom_jour_dernier = $dayNames[$jour_anglais_d];
        ?>


        <nav class="fda" aria-label="Breadcrumb">
            <ul class="ul">
                <li><a href="page_crous.php">CROUS</a></li><span> 〉 </span>
                <li>Menu de la semaine CROUS <?php echo $lieu; ?></li>
            </ul>
        </nav>

        <div class="main">
            <!-- Carousel version mobile, avec Bootstrap -->
            <section class="today mobile">



                <div class="carousel_wrap shadow">
                    <!-- Date avec les boutons -->
                    <button class="carousel_gauche" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-left carousel-control-prev-icon" viewBox="0 0 16 16"
                            style="color:black">
                            <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>
                    <!-- afficher la date au format jj-mm (chatGPT) -->
                    <button class="carousel_droite" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-right carousel-control-next-icon" viewBox="0 0 16 16"
                            style="color:black">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    <div class="carousel">
                        <!-- première slide -->
                        <div class="carousel-item">
                            <h2 class="m-0 date">
                                <?php
                                echo $nom_jour_dernier . " ";
                                echo date('d/m', strtotime($dernierElement['date']));
                                ?>

                            </h2>
                            <div class="card">
                                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
                                    echo "<a href='supprimer_menu.php?id=" . $dernierElement['id'] . "' '<button class='btn delete' id='" . $dernierElement['id'] . "'>supprimer</button></a>";
                                } ?>
                                <div>
                                    <img src=" <?php
                                    echo $dernierElement['image_plat'];
                                    ?>" alt="" class="card-img-top">
                                    <h3 class="fw-bold entre">Entrée</h3>
                                    <p>
                                        <?php
                                        $dernierElement['entre'] = str_replace(', ', '<br>', $dernierElement['entre']);
                                        echo $dernierElement['entre'];
                                        ?>
                                    </p>
                                </div>
                                <hr class="border border-3">
                                <div>
                                    <h3 class="fw-bold">Plat</h3>
                                    <p>
                                        <?php
                                        $dernierElement['plat'] = str_replace(', ', '<br>', $dernierElement['plat']);
                                        echo $dernierElement['plat'];
                                        ?>
                                    </p>
                                </div>
                                <hr class="border border-3">
                                <div>
                                    <h3 class="fw-bold">Dessert</h3>
                                    <p>
                                        <?php
                                        $dernierElement['dessert'] = str_replace(', ', '<br>', $dernierElement['dessert']);
                                        echo $dernierElement['dessert'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Toutes les autres slides -->
                        <?php
                        foreach ($tableauResult as $result) {

                            $date = new DateTime($result['date'], new DateTimeZone('Europe/Paris'));
                            $jour_anglais = $date->format('l');
                            $nom_jour = $dayNames[$jour_anglais];

                            $result['entre'] = str_replace(', ', '<br>', $result['entre']);
                            $result['plat'] = str_replace(', ', '<br>', $result['plat']);
                            $result['dessert'] = str_replace(', ', '<br>', $result['dessert']);
                            echo "<div class='carousel-item'>";
                            echo "<h2 class='m-0 date'>" . $nom_jour . " " . date('d/m', strtotime($result['date'])) . "</h2>";
                            echo "<div class='card'>";
                            if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
                                echo "<a href='supprimer_menu.php?id=" . $result['id'] . "' '<button class='btn delete' id='" . $result['id'] . "'>supprimer</button></a>";
                            }
                            echo "<div>
                            <img src='" . $result['image_plat'] . "' alt='' class='card-img-top'>
                            <h3 class='fw-bold entre'>Entrée</h3>
                            <p>" . $result['entre'] . "</p>
                        </div>";
                            echo "<hr class='border border-3'>";
                            echo " <div>
                        <h3 class='fw-bold'>Plat</h3>
                        <p>" . $result['plat'] . "</p>
                    </div>";
                            echo "<hr class='border border-3'>";
                            echo "<div>
                    <h3 class='fw-bold'>Dessert</h3>
                    <p>" . $result['dessert'] . "</p>
                    </div>";
                            echo "</div>
                    </div>";
                        }
                        ?>
                    </div>
                </div>





            </section>

            <!-- VERSION DESKTOP -->
            <section class="container today desktop">
                <div class="menu_ajd">
                    <div>
                        <h2 class="fs-5">
                            <?php
                            echo $nom_jour_dernier . " ";
                            echo date('d/m', strtotime($dernierElement['date'])); ?>
                        </h2>
                    </div>
                    <div class="card shadow violet">
                        <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
                            echo "<a href='supprimer_menu.php?id=" . $dernierElement['id'] . "' '<button class='btn delete' id='" . $dernierElement['id'] . "'>supprimer</button></a>";
                        } ?>
                        <div>
                            <img src="<?php echo $dernierElement['image_plat']; ?>" alt="" class="card-img-top">
                            <h3 class="fw-bold entre">Entrée</h3>
                            <p>
                                <?php
                                $dernierElement['entre'] = str_replace(', ', '<br>', $dernierElement['entre']);
                                echo $dernierElement['entre'];
                                ?>
                            </p>
                        </div>
                        <hr class="border border-3">
                        <div>
                            <h3 class="fw-bold">Plat</h3>
                            <p>
                                <?php
                                $dernierElement['plat'] = str_replace(', ', '<br>', $dernierElement['plat']);
                                echo $dernierElement['plat'];
                                ?>
                            </p>
                        </div>
                        <hr class="border border-3">
                        <div>
                            <h3 class="fw-bold">Dessert</h3>
                            <p>
                                <?php
                                $dernierElement['dessert'] = str_replace(', ', '<br>', $dernierElement['dessert']);
                                echo $dernierElement['dessert'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid tous_les_menu">

                    <?php
                    foreach ($tableauResult as $result) {
                        $date = new DateTime($result['date'], new DateTimeZone('Europe/Paris'));
                        $jour_anglais = $date->format('l');
                        $nom_jour = $dayNames[$jour_anglais];
                        $result['plat'] = str_replace(', ', '<br>', $result['plat']);
                        echo "<div class='menu_autre'>";
                        echo "<div>
                            <h2 class='fs-5'>" . $nom_jour . " " . date("d/m", strtotime($result['date'])) . "</h2>
                        </div>";
                        echo "<div class='card shadow'>";
                        echo "<div>
                        <img src=" . $result['image_plat'] . " alt='' class='card-img-top'>
                        <h3 class='fw-bold entre'>Plat</h3>
                        <p>" . $result['plat'] . "<br>
                        ...
                        </p>
                        <button class='btn voir_plus' id='" . $result['id'] . "'>voir plus</button>";
                        if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
                            echo "<a href='supprimer_menu.php?id=" . $result['id'] . "' '<button class='btn delete' id='" . $result['id'] . "'>supprimer</button></a>";
                        }
                        echo "</div>";
                        echo "</div>
                    </div>";
                    }
                    ?>
                </div>
            </section>

        </div>

    </main>

    <?php
    foreach ($tableauResult as $result) {
        $result['entre'] = str_replace(', ', '<br>', $result['entre']);
        $result['plat'] = str_replace(', ', '<br>', $result['plat']);
        $result['dessert'] = str_replace(', ', '<br>', $result['dessert']);

        echo "<section class='pop_up today' id='" . $result['id'] . "'>
                        <h2 class='m-0 date'>" . date('d/m', strtotime($result['date'])) . "</h2>
                        <div class='card'>
                            <div>
                                <img src='" . $result['image_plat'] . "
                                ' alt='' class='card-img-top'>
                                <h3 class='fw-bold entre'>Entrée</h3>
                                <p> " .
            $result['entre'] . "</p>
                            </div>
                            <hr class='border border-3'>
                            <div>
                                <h3 class='fw-bold'>Plat</h3>
                                <p>" . $result['plat'] . "</p>
                            </div>
                            <hr class='border border-3'>
                            <div>
                                <h3 class='fw-bold'>Dessert</h3>
                                <p>" . $result['dessert'] . "</p>
                            </div>
                        </div>
                    </section>";
    }
    ?>


    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>


</body>

<script src="js/script_accueil.js"></script>
<script src="js/script_crous.js"></script>
<script src='js/script_dark_mode.js'></script>

<html>