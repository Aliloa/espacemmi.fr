
<?php
include("connexion.php");
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
    $email = $_POST['mail'];

    // Vérifier si l'e-mail existe dans la base de données
    $query = "SELECT * FROM utilisateurs WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $to = $email;
        $subject = 'Réinitialisation du mot de passe';
        
        $resetLink = 'http://espacemmichamps.fr/formulaire_mdp.php'; 
        
        $body = "Bonjour, veuillez cliquer sur le lien suivant pour procéder à la réinitialisation de votre mot de passe : <a href='$resetLink'>réinitialiser le mot de passe</a>";
        
        $headers = "From: eiffel@espacemmichamps.fr\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
           echo "<div id='custom-popup'>";
                echo "<p>E-mail envoyé avec succès! </p>";
                echo "<br>";
                echo"<p>Veuillez vérifier votre messagerie mail</p>";
                echo "</div>";

                echo "<script>";
                echo "setTimeout(function() {";
                echo "}, 2000);";
                echo "</script>";
            exit(); 
        } else {
echo "<div id='custom-popup'>";
                echo "<p>'Erreur lors de l\'envoi de l\'e-mail.'</p>";
                echo "</div>";

                echo "<script>";
                echo "setTimeout(function() {";
                echo "   window.location.href = 'mdp_page.php';";
                echo "}, 2000);";
                echo "</script>";
            exit(); ;        }
    } else {
        echo "<div id='custom-popup'>";
                echo "<p>L'adresse mail saisie n'existe pas</p>";
                echo "</div>";

                echo "<script>";
                echo "setTimeout(function() {";
                echo "   window.location.href = 'mdp_page.php';";
                echo "}, 2000);";
                echo "</script>";
            exit(); ;
    }
} else {
    '';
}
?>

</body>
</html>