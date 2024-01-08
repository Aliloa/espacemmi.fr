<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    session_start();
    include("connexion.php");

    if (isset($_POST['ajoutercours'])) {
        $module = $_POST['module'];
        $coef = $_POST['coef'];


        $requete = "INSERT INTO cours (cours, coef, externe_prof) VALUES (:cours, :coef, :externe_prof)";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(":cours", $module, PDO::PARAM_STR);
        $stmt->bindValue(":coef", $coef, PDO::PARAM_STR);
        $stmt->bindValue(":externe_prof", $_SESSION["id"], PDO::PARAM_INT);
        $stmt->execute();




        $requeteProfesseur = "SELECT * FROM utilisateurs WHERE nom = :nomProfesseur AND prenom = :prenomProfesseur AND role = 'Enseignant.e'";
        $stmtProfesseur = $db->prepare($requeteProfesseur);
        $stmtProfesseur->bindValue(":nomProfesseur", $nomProfesseur, PDO::PARAM_STR);
        $stmtProfesseur->bindValue(":prenomProfesseur", $prenomProfesseur, PDO::PARAM_STR);
        $stmtProfesseur->execute();



            if ($stmt->rowCount()) {
                header('Location:ajout_cours.php?added_successfully');
            } else {
                echo "L'ajout du cours a échoué. Veuillez réessayer.";
            }
        }

    
    ?>
</body>

</html>