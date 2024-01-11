<?php
    session_start();
    include("connexion.php");

    if (isset($_POST['soumettre'])) {
        $eleve = $_POST['eleve'];
        $date = $_POST['date'];
        $debut = $_POST['debut'];

        $fin = $_POST['fin'];
        $matiere = $_POST['matiere'];
        $titre = $_POST['titre'];
    }

    $requete = "INSERT INTO abscence_retard (eleve, date, debut, fin, ext_cours, titre) VALUES (:eleve, :date, :debut, :fin, :matiere, :titre)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":eleve", $eleve, PDO::PARAM_STR);
    $stmt->bindValue(":date", $date, PDO::PARAM_STR);
    $stmt->bindValue(":debut", $debut, PDO::PARAM_STR);
    $stmt->bindValue(":fin", $fin, PDO::PARAM_STR);
    $stmt->bindValue(":matiere", $matiere, PDO::PARAM_STR);
    $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        echo "Le retard de" .$eleve . "a bien été ajouté";
        echo "<a href='absenceprof.php'>Revenir à l'ajout des absences</a>";
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>