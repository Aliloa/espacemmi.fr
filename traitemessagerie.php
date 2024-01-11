<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include('connexion.php');

    if (isset($_POST['newmessage'])) {

        $objet = $_POST['objet'];
        $contenu = $_POST['contenu'];
        $expediteur = $_SESSION['login']; // Utilisateur connecté (expéditeur)
        $destinataire = $_POST['eleve']; // ID du destinataire
    
        $piece_jointe = '';
        if (!empty($_FILES['piece']['name'])) {
            // Traitez la pièce jointe ici (téléchargement, stockage, etc.)
            // Assurez-vous de sécuriser le traitement des fichiers téléchargés.
            $piece_jointe = 'chemin/vers/votre/dossier/' . $_FILES['piece']['name'];
        }

        // Déterminer si le message est destiné à tous les étudiants
        $solooutous = ($_POST['eleve'] == 'Tous') ? 'tous' : 'solo';

        // Requête SQL pour insérer le message dans la table messages
        $requete = "INSERT INTO messages (objet, contenu_mss, expediteur, destinataire, piece_jointe, solooutous)
                VALUES (:objet, :contenu, :expediteur, :destinataire, :piece_jointe, :solooutous)";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':objet', $objet, PDO::PARAM_STR);
        $stmt->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $stmt->bindValue(':expediteur', $expediteur, PDO::PARAM_STR);
        $stmt->bindValue(':destinataire', $destinataire, PDO::PARAM_INT);
        $stmt->bindValue(':piece_jointe', $piece_jointe, PDO::PARAM_STR);
        $stmt->bindValue(':solooutous', $solooutous, PDO::PARAM_STR);

        // Exécuter la requête
        $stmt->execute();

        // Vérifier le succès de l'insertion
        if ($stmt->rowCount() > 0) {
            echo "Message envoyé avec succès !";
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    }
    ?>

</body>

</html>