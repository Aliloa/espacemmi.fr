<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Vie scolaire</title>
    <link rel='stylesheet' href='css/style_vie_scolaire.css'>
    <link rel="icon" href="img/favicon.png"></head>

</head>

<body>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>

    <?php
    include("connexion.php");
    $requete = "SELECT * FROM travail_a_faire ORDER BY date DESC";
    $stmt = $db->query($requete);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class='result-container'>
        <div class='bloc-1'>
            <div class="bouton">
            <h1>Travail à faire</h1>
            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#6C63FF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg></a>
            </div>
             <?php foreach ($results as $result) { ?>
                <div class='matiere-date'>
                    <h2><?php echo $result['travail']; ?></h2>
                    <p class='small-date'><?php echo "Rendu: {$result['date']}"; ?></p>
                </div>
                <h3><?php echo $result['enseignant']; ?></h3>
                <br>
            <?php } ?>

        </div>

<?php
$requete = "SELECT * FROM controle ORDER BY date DESC ";
$stmt = $db->query($requete);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

        <div class='bloc-2'>
        <div class="bouton">
            <h1>Contrôle à venir</h1>
            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#6C63FF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg></a>
            </div>
                        <?php foreach ($results as $result) { ?>
                <div class='matiere-date'>
                    <h2><?php echo $result['controle']; ?></h2>
                    <p class='small-date'><?php echo "Rendu: {$result['date']}"; ?></p>
                </div>
                <h3><?php echo $result['enseignant']; ?></h3>
            <?php } ?>
           
        </div>

<?php
 $requete = "SELECT * FROM abscence_retard ORDER BY id_abs DESC";
 $stmt = $db->query($requete);
 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?> 
 
        <div class='bloc-3'>
        <div class="bouton">
            <h1>Absences et retards</h1>
            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#6C63FF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg></a>
            </div>
                        <?php foreach ($results as $result) { ?>
                <div class='matiere-date'>
                    <h2><?php echo $result['titre']; ?></h2>
                    <p class='small-date'><?php echo "{$result['nombre']}"; ?></p>
                </div>
                <div class="cours_classe">
                    <h3><?php echo $result['cours']; ?></h3>
                    <h3><?php echo "Le " . $result['date']; ?></h3>
                </div>
            <?php } ?>
            

        </div>


  <?php
  
  $requete = "SELECT * FROM notes ORDER BY id_note DESC";
  $stmt = $db->query($requete);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

<div class='bloc-4'>
<div class="bouton">
            <h1>Les moyennes</h1>
            <a href="ajout_moyenne.php"><svg xmlns="http://www.w3.org/2000/svg" width="  30" height="30" fill="#6C63FF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg></a>
            </div>
                        <?php foreach ($results as $result) { ?>
                <div class='matiere-date'>
                    <h2><?php echo $result['matiere']; ?></h2>
                    <p class='small-date'><?php echo "{$result['notes']} /20"; ?></p>
                </div>
                
            <?php } ?>

        </div>
    </div>

    

   

    </body>

    </html>

