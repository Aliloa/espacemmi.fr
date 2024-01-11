<?php
    session_start();
include('connexion.php');

// Vérifiez si l'identifiant du commentaire à supprimer est présent dans l'URL
if (isset($_GET['id'])) {
    $id_commentaire = $_GET['id'];

    $requete = "DELETE FROM crous WHERE id = :id";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(':id', $id_commentaire, PDO::PARAM_INT);
    $stmt->execute();

    // Redirigez l'utilisateur vers la page d'où il a initié la suppression
    header("Location: " . $_SERVER['HTTP_REFERER']);
} 
?>
