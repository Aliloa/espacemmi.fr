<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_navigation.css'>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }

    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
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
                    <input class='input' type='search' placeholder='Search' />
                </div>

                <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
                <div class='icon-photo'>
                    <img class='logo' src='./img/1-lettre.svg' alt="page d'accueil">
                    <button class="dark_button" onclick="toggleDarkMode()"><img class='dark_mode' src='./img/1-moon.svg'
                            alt="mode sombre"></button>



                    <!-- PHP - LIEN VERS LA PAGE PARAMETRES.PHP POUR MODIF LA PDP-->
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
                            <img src="img/1-logout.svg" alt="Déconnexion">
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
                            <button class="flex_bouton" onclick="toggleDarkMode()"><img class='dark_mode'
                                    src='./img/1-moon.svg' alt="mode sombre">
                                <p>Mode sombre</p>
                            </button>
                        </div>
                    </div>

                </nav>

                <div class='overlay'></div>

            </div>

        </div>

    </header>

    <main>
    <?php
include('connexion.php');

$destinataire = $_SESSION['login'];

$requete = "SELECT messages.*, utilisateurs.nom AS nom_expediteur, utilisateurs.prenom AS prenom_expediteur, utilisateurs.photoprofil AS photoprofil_expediteur
            FROM messages, utilisateurs
            WHERE messages.destinataire = :destinataire
            AND messages.expediteur = utilisateurs.login
            ORDER BY messages.date_mess DESC";

$stmt = $db->prepare($requete);
$stmt->bindValue(':destinataire', $destinataire, PDO::PARAM_STR);
$stmt->execute();

$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($resultat);

foreach ($resultat as $message) {
    echo "<div class='message'>
            <div>
                <h2> {$message["objet"]}</h2>
                <p> Envoyé par : {$message["nom_expediteur"]} {$message["prenom_expediteur"]} </p> 
                <img src='upload/{$message["photoprofil_expediteur"]}'>
                <p> Contenu : {$message["contenu_mss"]} </p> 
                <p> Date : {$message["date_mess"]} </p> 
            </div> <br><br>
          </div>";
}
?>





        <a href="unmessage.php">Écrire un nouveau message</a>

    </main>



</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>

</html>