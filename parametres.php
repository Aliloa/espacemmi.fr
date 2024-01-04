<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
</head>

<body>
    <?php
    session_start();
    ?>


    <?php
    include('connexion.php');

    $stmt = $db->query('SELECT * FROM utilisateurs');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo " <a href='parametres.php'> <img src='upload/{$result['photoprofil']}' alt=''></a>";
    ?>

</body>
<!--   if (isset($_SESSION['login'])) {
        var_dump($_SESSION['login']);
    echo " <a href='parametres.php'> <img src='upload/{$result['photoprofil']}' alt=''></a>";
    }else{
        header('Location:index.php?erreur=access_denied');

    } -->
</html>