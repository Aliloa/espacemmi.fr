


<?php
include('connexion.php');
session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="icon" href="img/favicon.png">
</head>

<body>
    
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login_user'];
    $mdp = $_POST['mdp1'];

    $checkLoginQuery = "SELECT * FROM utilisateurs WHERE login = :login";
    $checkStmt = $db->prepare($checkLoginQuery);
    $checkStmt->bindParam(':login', $login);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        $mot_de_passe_hash = password_hash($mdp, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE login = :login";

        $stmt = $db->prepare($updateQuery);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);
        $stmt->bindParam(':login', $login);

        if ($stmt->execute()) {
           echo "<div id='custom-popup'>";
                echo "<p>Mot de passe mis à jour!</p>";
                echo "</div>";

                echo "<script>";
                echo "setTimeout(function() {";
                echo "   window.location.href = 'connexion_page.php';";
                echo "}, 2000);";
                echo "</script>";
            exit(); 
        } else {
            echo 'Erreur lors de la mise à jour du mot de passe.';
            print_r($stmt->errorInfo()); 
        }
    } else {
        echo 'Le login n\'existe pas';
    }
} else {
    echo 'Erreur lors de la soumission du formulaire.';
}
?>

</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>
</html>