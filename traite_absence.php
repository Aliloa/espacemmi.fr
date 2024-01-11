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

    $requeteetudiant = "SELECT nom, prenom FROM utilisateurs WHERE id_utilisateurs = :id_eleve";
    $stmtetudiant = $db->prepare($requeteetudiant);
    $stmtetudiant->bindValue(":id_eleve", $eleve, PDO::PARAM_INT);
    $stmtetudiant->execute();
    $resultatetudiant = $stmtetudiant->fetch(PDO::FETCH_ASSOC);

    $requete = "INSERT INTO abscence_retard (titre, date, debut, fin, matiere_ext, prof, eleve) VALUES (:titre, :date, :debut, :fin, :matiere, :prof, :eleve)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":eleve", $eleve, PDO::PARAM_STR);
    $stmt->bindValue(":date", $date, PDO::PARAM_STR);
    $stmt->bindValue(":debut", $debut, PDO::PARAM_STR);
    $stmt->bindValue(":fin", $fin, PDO::PARAM_STR);
    $stmt->bindValue(":matiere", $matiere, PDO::PARAM_STR);
    $stmt->bindValue(":prof", $_SESSION["id"], PDO::PARAM_STR);
    $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        echo "Le retard de" .$resultatetudiant['nom'] . " ". $resultatetudiant['prenom']."a bien été ajouté";
        echo "<a href='absenceprof.php'>Revenir à l'ajout des absences</a>";
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>