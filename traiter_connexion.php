<?php
session_start();

include("connexionbd.php");

$db->query('SET NAMES utf8');

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
            echo "<p>Bien connectée " . $result["login"] . "</p>";
        } else {
            echo "mauvais mot de passe";
        }
    } else {
        echo "Utilisateur non trouvé";
        echo "<br>";
        echo "<a href='inscription_page.php'>Créez un compte</a>";
    }
} else {
    echo "Invalid request method.";
}
?>
