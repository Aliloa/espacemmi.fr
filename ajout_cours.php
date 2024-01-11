<?php
session_start();
include("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_navigation.css'>
    <link rel='stylesheet' href='css/style_backoffice.css'>
    <link rel='stylesheet' href='css/dark_mode.css'>
    <title>Espace MMI | Backoffice</title>
</head>

<body>
<?php
    
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
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
            <a href='backofficeprof.php'><img class="logo" src='./img/logo.svg' alt="page d'accueil"
                    aria-current="currentpage"></a>

            <!-- Navigation desktop -->
            <nav class='navigation'>

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

    <main>

        <div class='contain-back'>

            <nav class="fda" aria-label="Breadcrumb">
                <ul class="ul">
                    <li><a href="backofficeprof.php">Accueil</a></li><span> 〉 </span>
                </ul>
            </nav>

            <h1 class="h1">Ajouter un cours</h1>

            <form class="ajouter" action="traitecours.php" method="POST" enctype="multipart/form-data">


                <label for="module">Nom du cours</label><br>
                <input type="text" id="module" name="cours" required><br>


                <label for="co">Coefficient</label><br>
                <input type="number" id="co" name="coef" min="0" max="20"><br>

                <h1>Choisissez la matière pour votre prochain cours :</h1>
                <label for="matiere">Matière :</label>
                <select name="matierechoisi" id="matiere" required>


                    <?php
                    include("connexion.php");

                    if (isset($_SESSION["login"])) {
                        $requete = 'SELECT * FROM grossematiere WHERE prof_ext = :idProfesseur';
                        $stmt = $db->prepare($requete);
                        $stmt->bindValue(':idProfesseur', $_SESSION["id"], PDO::PARAM_INT);
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $matiere) {
                            echo "<option value='{$matiere['id_matiere']}'>{$matiere['nom_mat']}</option>";
                        }
                    }
                    ?>


                </select>

                <p>Votre document</p>
                <input type="file" name="document" accept=".pdf, .odt, .pptx, .docx, .xlsx" required> <br>


                <button type="submit" name='ajoutercours'>Ajouter</button>


            </form>


            <?php
            include("connexion.php");
            if (isset($_SESSION["login"])) {

                // Requete qui sélectionne tout de cours, mais nom de la matire pour grossematiere puis fait les liens avec les clés externes et récupère login pour afficher les modules du prof connecté
                $requete = "SELECT cours.*, grossematiere.nom_mat FROM cours INNER JOIN grossematiere ON cours.ext_matiere = grossematiere.id_matiere INNER JOIN utilisateurs ON grossematiere.prof_ext = utilisateurs.id_utilisateurs WHERE utilisateurs.login = :login AND utilisateurs.role = 'Enseignant.e'";

                $stmt = $db->prepare($requete);
                $stmt->bindValue(":login", $_SESSION["login"], PDO::PARAM_STR);
                $stmt->execute();
                $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);


                foreach ($resultat as $cours) {
                    $chemindoc = "documents/" . $cours["document"];

                    echo "<p>{$cours['cours']} - Matière : {$cours['nom_mat']}</p>
            <a href='{$chemindoc}'>{$cours["document"]} </a> </br></br>";
                }

            }
            ?>


        </div>
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