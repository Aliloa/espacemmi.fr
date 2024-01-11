<?php
session_start();
include("connexion.php");
?>

<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Espace MMI | Accueil</title>
    <link rel='icon' href='img/favicon.png'>
    <link rel='stylesheet' href='css/style_navigation.css'>
    <link rel='stylesheet' href='css/style_ajout_menu.css'>
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
   
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Étudiant.e') {
        header('Location: accueil.php?access_denied');
    }

    ?>
    <header>
        <div class='menu'>

            <!-- Logo Accueil -->
            <a href='accueil.php'><img src='./img/logo.svg' alt='page d' accueil'></a>

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

                    <!-- PHP - AJOUTEZ LE LIEN POUR LA D2CONEXION ET LE LIEN VERS LA PAGE profil.php POUR MODIF LA PDP-->
                    <div class='photo-2'>

                        <?php
                        include('connexion.php');

                        $stmt = $db->query('SELECT * FROM utilisateurs');
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        // if (isset($_SESSION['login'])) {
                            // echo " <a href='profil.php'> <img src='upload/{$result['photoprofil']}' alt=''></a>";
                        // }
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
                    <div class='kelis'>
                        <div class='profil-1'>
                            <a href='profil.php'>
                                <div class='photo-1'></div>
                            </a>
                            <div class='profil-2'>
                                <h1>Loana Chalach</h1>
                                <p>MMI 2</p>
                            </div>
                        </div>
                        <div class='profil-3'>
                            <h2>À propos</h2>
                            <p>Moi dans la vie, j'aime bien la nourriture</p>
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

    <main>

    <?php
    $lieu = isset($_GET['lieu']) ? $_GET['lieu'] : '';
    ?>

        <h1>Ajouter le menu du jour à: <?php echo $lieu; ?></h1>

        <form action="traite_ajout_menu.php" method="POST">
            <div class="flex">
            <fieldset>
            <label for="entree_un">Entrée:</label>
            <input type="text" name="entree[]" id="entree_un"> <br>

            <label for="entree_deux">Entrée:</label>
            <input type="text" name="entree[]" id="entree_deux"> <br>

            <label for="entree_trois">Entrée:</label>
            <input type="text" name="entree[]" id="entree_trois"> <br>
            </fieldset>

            <fieldset>
            <label for="plat_un">Plat:</label>
            <input type="text" name="plat[]" id="plat_un" required> <br>

            <label for="plat_deux">Plat:</label>
            <input type="text" name="plat[]" id="plat_deux"> <br>

            <label for="plat_trois">Plat:</label>
            <input type="text" name="plat[]" id="plat_trois"> <br>
            </fieldset>

            <fieldset>
            <label for="dessert_un">Dessert:</label>
            <input type="text" name="dessert[]" id="dessert_un"> <br>

            <label for="dessert_deux">Dessert:</label>
            <input type="text" name="dessert[]" id="dessert_deux"> <br>

            <label for="dessert_trois">Dessert:</label>
            <input type="text" name="dessert[]" id="dessert_trois"> <br>
            </fieldset>
            </div>

            <fieldset class="image_date">
                <label for="image">Image: (mettre un lien)</label>
                <input type="text" name="image" id="image" required>

                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>

                <input type="hidden" name="lieu" value="<?php echo $lieu; ?>">
            </fieldset>

            <?php if (isset($_GET['dateerr'])) {
    echo "<p class='red'>Cette date existe déjà pour ce lieu. Veuillez choisir une autre date.</p>";
}
?>

            <input type="submit" name="soumettre">
        </form>
        <a href="menu_du_jour.php"><button>Annuler</button></a>
    </main>

    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>

</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>

</html>