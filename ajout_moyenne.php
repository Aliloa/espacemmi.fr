<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace | Moyenne</title>
<link rel="stylesheet" href="css/style_vie_scolaire.css">
<link rel="icon" href="img/favicon.png"></head>
<body>

<div class="formulaire">
<h1>Moyenne</h1>

<form action="traite_moyenne.php" method="post">
<label for="matiere">Matière</label>
<input type="input" id="matiere" name="matiere" required>
<label for="note">Note</label>
<input type="input" id="note" name="note" required>
<input type='submit' value='Se connecter'>

</form>
</div>

</body>
</html>