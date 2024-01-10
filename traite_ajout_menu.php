<?php
    session_start();
    include("connexion.php");

    if (isset($_POST['soumettre'])) {
        $entree = implode(", ", $_POST['entree']);
        $plat = implode(", ", $_POST['plat']);
        $dessert = implode(", ", $_POST['dessert']);

        $image = $_POST['image'];
        $date = $_POST['date'];
        $lieu = $_POST['lieu'];
    }

    // Vérifier si la date existe déjà dans la base de données
$requeteVerification = "SELECT COUNT(*) AS count FROM crous WHERE date = :date AND lieu = :lieu";
$stmtVerification = $db->prepare($requeteVerification);
$stmtVerification->bindParam(':date', $date, PDO::PARAM_STR);
$stmtVerification->bindParam(':lieu', $lieu, PDO::PARAM_STR);
$stmtVerification->execute();
$resultVerification = $stmtVerification->fetch(PDO::FETCH_ASSOC);

if ($resultVerification['count'] > 0) {
    header("Location: ajouter_menu.php?lieu=$lieu&dateerr");
    die();
}

    $requete = "INSERT INTO crous (entre, plat, dessert, image_plat, date, lieu) VALUES (:entree, :plat, :dessert, :image, :date, :lieu)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":entree", $entree, PDO::PARAM_STR);
    $stmt->bindValue(":plat", $plat, PDO::PARAM_STR);
    $stmt->bindValue(":dessert", $dessert, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":date", $date, PDO::PARAM_STR);
    $stmt->bindValue(":lieu", $lieu, PDO::PARAM_STR);

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        header('Location:page_crous.php');
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>