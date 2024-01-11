<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>

<?php include('connexion.php'); ?>
<form action="traite_absence.php" method="POST">
        <h1>Ajouter absence /retard</h1>

             <label for="eleve">Eleve</label>
        <select name="eleve">     
            <?php
            $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE role="Étudiant.e"');
            $stmt->execute();
            $tableauResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($tableauResult as $result) {
                echo "<option value='". $result['id_utilisateurs']."'>". $result['nom']." " . $result['prenom'] ."</option>";
            }
            ?>
        </select> <br>

        <label for="nom">Date</label>
        <input type="date" name="date" required> <br>

        <label for="debut">De</label>
        <input type="time" name="debut" required> <br>

        <label for="fin">A</label>
        <input type="time" name="fin" required> <br>


        <label for="matiere">Matière</label>
        <select name="matiere">     
            <?php
            $stmt = $db->prepare('SELECT * FROM grossematiere');
            $stmt->execute();
            $tableauResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($tableauResult as $result) {
                echo "<option value='". $result['id_matiere'] . "'>". $result['nom_mat'] . "</option>";
            }
            ?>
        </select> <br>

        <div>
    <input class="radio" type="radio" id="absence" name="titre" value="Absence" />
    <label for="absence">Absence</label>
    
    <input class="radio" type="radio" id="retard" name="titre" value="Retard" />
    <label for="retard">Retard</label>
</div>



        <button type="submit" name='soumettre'>S'inscrire</button>
    </form>
</body>
</html>