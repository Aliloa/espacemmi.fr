
<?php
include("connexion.php");
session_start();

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
        
        $resetLink = 'http://espacemmi.fr/formulaire_mdp.php'; 
        
        $body = "Bonjour, veuillez cliquer sur le lien suivant pour procéder à la réinitialisation de votre mot de passe : <a href='$resetLink'>réinitialiser le mot de passe</a>";
        
        $headers = "From: eiffel@espacemmichamps.fr\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo 'E-mail envoyé avec succès!';
        } else {
            echo 'Erreur lors de l\'envoi de l\'e-mail.';
        }
    } else {
        echo 'L\'adresse e-mail n\'existe pas ';
    }
} else {
    '';
}
?>
