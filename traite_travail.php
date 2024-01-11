<?php
    session_start();
    include("connexion.php");


    if (isset($_POST['soumettre'])) {
        $travail = $_POST['travail'];
        $date = $_POST['date'];
        $matiere = $_POST['matiere'];

        $requeteprof = "SELECT nom, prenom FROM utilisateurs WHERE login = :login";
        $stmtprof = $db->prepare($requeteprof);
        $stmtprof->bindValue(":login", $_SESSION['login'], PDO::PARAM_STR);
        $stmtprof->execute();
        $resultatprof = $stmtprof->fetch(PDO::FETCH_ASSOC);
            $prof = $resultatprof['nom'] . " " .$resultatprof['prenom'];
    }


 $requete = "INSERT INTO travail_a_faire (travail, date, enseignant, tache_prof) VALUES (:travail, :date, :prof, :matiere)";
            $stmt = $db->prepare($requete);
            $stmt->bindValue(":travail", $travail, PDO::PARAM_STR);
            $stmt->bindValue(":date", $date, PDO::PARAM_STR);
            $stmt->bindValue(":prof", $prof, PDO::PARAM_STR);
            $stmt->bindValue(":matiere", $matiere, PDO::PARAM_STR);

            $stmt->execute();
    
    if ($stmt->rowCount()) {
        echo "Le travail à faire: " .$travail . " a bien été ajouté pour le " . $date ;
        echo "<a href='absenceprof.php'>Revenir à l'ajout des absences</a>";
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>