<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_accueil.css'>

    <title>Paramètres</title>
</head>

<body>
<?php
    session_start();
    ?>

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
                    exit();
                }
            }
            ?>

        </div>
        <!-- FIN PHP-->
    </div>
</nav>


    <?php
    include('connexion.php');

    if (isset($_SESSION["login"])) {
        $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
        $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "<img src='upload/{$result['photoprofil']}' alt=''>";
        } else {
            header('Location:index.php?erreur=access_denied');
            exit();
        }
    }
    ?>

    <form action="traiteprofil.php" method="POST" enctype="multipart/form-data">
        <div>
            <input type="file" name="fichier" size="30" required> <br>Pour ajouter une photo de profil
            <input type="submit" name="upload" value="Uploader"><br> <br>
        </div>
    </form>


    <form action="traiteprofil.php" method="POST">
        <div>
            <label for="bio">Votre biographie</label>
            <input type="text" id='bio' name="bio" required> <br>
            <input type="submit" name="changerbio" value="Uploader"><br> <br>
        </div>
    </form>


    <form action="deconnexion.php" action='GET'>
        <input type="submit" name="deconnect" value="Se déconnecter">
    </form>


</body>

</html>