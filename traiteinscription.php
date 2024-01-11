<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    
    session_start();
    include("connexion.php");

    

    if (isset($_POST['soumettre'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];
        $promotion = $_POST['promotion'];

        $content_dir = 'upload/';
        $name_file = "default.png";
    }



    $testlogin = "SELECT * FROM utilisateurs WHERE nom=:nom AND prenom = :prenom AND login = :login";
    $stmt = $db->prepare($testlogin);
    $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount()) {
        echo "Ce login n'est pas disponible";
        // exit();
        header('Location:Inscription_page.php?erreur=login');
    }

    $requete = "INSERT INTO utilisateurs (login, nom, prenom, mot_de_passe, photoprofil, role, email, promotion) VALUES (:login, :nom, :prenom, :mdp, :photo, :role, :email, :promotion)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $stmt->bindValue(":mdp", $mdp, PDO::PARAM_STR);
    $stmt->bindValue(":photo", $name_file, PDO::PARAM_STR);
    $stmt->bindValue(":role", $role, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":promotion", $promotion, PDO::PARAM_STR);

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        header('Location:administration.php?added_successfully');
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }  ;

    ?>

</body>

</html>