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
        $destinataire = $_POST['eleve'];

        $content_dir = 'pieces_jointes/';
        if ($_FILES['fichier']['size'] > 0) {

        $tmp_file = $_FILES['fichier']['tmp_name'];
        if (!is_uploaded_file($tmp_file)) {
            exit("Le fichier est introuvable");
        }
        $name_file = $_FILES['fichier']['name'];
        if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
            exit("Impossible de copier le fichier dans $content_dir");
        }
        echo "Le fichier a bien été uploadé";
    }

        // Déterminer si le message est destiné à tous les étudiants
        $solooutous = ($_POST['eleve'] == 'Tous') ? 'tous' : 'solo';
        if ($solooutous == 'solo') {
            // Si la sélection est 'solo', envoi du message à un destinataire spécifique
            $requete = "INSERT INTO messages (objet, contenu_mss, expediteur, destinataire, piece_jointe, solooutous, date_mess) 
                        VALUES (:objet, :contenu, :expediteur, :destinataire, :piece_jointe, :solooutous, NOW())";
        } else {
            // Si la sélection est 'tous', envoi du message à tous les élèves
            $requete = "INSERT INTO messages (objet, contenu_mss, expediteur, destinataire, piece_jointe, solooutous, date_mess) 
                        SELECT :objet, :contenu, :expediteur, id_utilisateurs, :piece_jointe, :solooutous, NOW() 
                        FROM utilisateurs WHERE role = 'Étudiant.e'";
        }
        
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':objet', $objet, PDO::PARAM_STR);
        $stmt->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $stmt->bindValue(':expediteur', $_SESSION["id"], PDO::PARAM_INT);
        $stmt->bindValue(':piece_jointe', $name_file, PDO::PARAM_STR);
        $stmt->bindValue(':solooutous', $solooutous, PDO::PARAM_STR);
        
        if ($solooutous == 'solo') {
            $stmt->bindValue(':destinataire', $destinataire, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        

        if ($stmt->rowCount()) {
            header('Location:messagerie.php?successfully_sended');
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    }
    ?>

</body>

</html>