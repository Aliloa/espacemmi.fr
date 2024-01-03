<?php
session_start();

include("connexion.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    $requete_verif_user = "SELECT * FROM utilisateurs WHERE login=:login";
    $stmt_verif_user = $db->prepare($requete_verif_user);
    $stmt_verif_user->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt_verif_user->execute();

    if ($stmt_verif_user->rowCount()) {
        $result = $stmt_verif_user->fetch();
        if (password_verify($password, $result["mot_de_passe"])) {
            $_SESSION["login"] = $result["login"];
            header("Location: accueil.php");
        } else {
            echo "mauvais mot de passe";
        }
    } else {
        echo "Utilisateur non trouvé";
        echo "<br>";
        echo "<a href='inscription_page.php'>Créez un compte</a>";
    }
} else {
    echo "Veuillez remplir le formulaire";
}
?>
