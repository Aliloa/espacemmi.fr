<?php
    session_start();
    include("connexion.php");

    if (isset($_POST['soumettre'])) {
        $entree = implode(", ", $_POST['entree']);
        $plat = implode(", ", $_POST['plat']);
        $dessert = implode(", ", $_POST['dessert']);

        $image = $_POST['image'];
        $date = $_POST['date'];
    }

    $requete = "INSERT INTO crous (entre, plat, dessert, image_plat, date) VALUES (:entree, :plat, :dessert, :image, :date)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":entree", $entree, PDO::PARAM_STR);
    $stmt->bindValue(":plat", $plat, PDO::PARAM_STR);
    $stmt->bindValue(":dessert", $dessert, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":date", $date, PDO::PARAM_STR);

    $stmt->execute();
    
    if ($stmt->rowCount()) {
        header('Location:menu_du_jour.php');
    } else {
        echo "ça n'a pas marché veuillez recommencer.";
        die($stmt);
    }
    ?>