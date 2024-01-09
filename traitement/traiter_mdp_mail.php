<?php
include("connexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];
    $login = $_SESSION['login'];

    if ($login) {
        $to = $email;
        $subject = 'Récupération de mot de passe';
        $body = "Votre mot de passe est : " . $login['mot_de_passe'];

        if (mail($to, $subject, $body)) {
            echo 'Le mot de passe a été envoyé à votre adresse e-mail.';
        } else {
            echo 'Erreur lors de l\'envoi de l\'e-mail.';
        }
    } else {
        echo 'Aucun utilisateur trouvé avec cette session.';
    }
} else {
    echo 'Méthode de requête incorrecte.';
}
?>
