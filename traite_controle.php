<?php
    session_start();
    include("connexion.php");


    if (isset($_POST['soumettre'])) {
        $titre = $_POST['titre'];
        $date = $_POST['date'];

        $requeteprof = "SELECT nom, prenom FROM utilisateurs WHERE login = :login";
        $stmtprof = $db->prepare($requeteprof);
        $stmtprof->bindValue(":login", $_SESSION['login'], PDO::PARAM_STR);
        $stmtprof->execute();
        $resultatprof = $stmtprof->fetch(PDO::FETCH_ASSOC);
            $prof = $resultatprof['nom'] . " " .$resultatprof['prenom'];
    }


 $requete = "INSERT INTO controle (controle, date, enseignant) VALUES (:titre, :date, :prof)";
            $stmt = $db->prepare($requete);
            $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
            $stmt->bindValue(":date", $date, PDO::PARAM_STR);
            $stmt->bindValue(":prof", $prof, PDO::PARAM_STR);

            $stmt->execute();
    
    if ($stmt->rowCount()) {
        echo "Le controle à faire: " .$titre . " a bien été ajouté pour le " . $date ;
        echo "<a href='ajout_controle.php'>Revenir à l'ajout des controles</a>";
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>