<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style_crous.css" />
    <title>Espace mmi menu</title>
</head>
<body>
    <nav>
        <!-- Pas à moi de le faire? -->
    </nav>
    <main>
    <?php 
$db = new PDO('mysql:host=localhost;dbname=ent;port=3306','root','');
$requete ="SELECT * FROM crous ORDER BY date ASC LIMIT 1, " . PHP_INT_MAX;
$stmt=$db->prepare($requete);
$stmt->execute();
$tableauResult=$stmt->fetchAll(PDO::FETCH_ASSOC);

$requeteDernier = "SELECT * FROM crous ORDER BY date ASC LIMIT 1";
$stmtDernier = $db->prepare($requeteDernier);
$stmtDernier->execute();
$dernierElement = $stmtDernier->fetch(PDO::FETCH_ASSOC);
?>
<!-- Carousel version mobile, avec Bootstrap -->
        <section class="container today carousel slide" id="carouselExample" >
            <!-- Date avec les boutons -->
            <div class="date">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left carousel-control-prev-icon" viewBox="0 0 16 16" style="color:black">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    <span class="visually-hidden">Previous</span>
                  </button>
                <h2>24/11</h2>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right carousel-control-next-icon" viewBox="0 0 16 16" style="color:black">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
            <div class="carousel-inner shadow rounded-4">
                <!-- première slide -->
                <div class="card carousel-item active">
                    <div>
                        <img src=" <?php
                            echo $dernierElement['image_plat'];
                        ?>" alt="" class="card-img-top">
                        <h3 class="fw-bold entre">Entrée</h3>
                        <p>
                            <?php
                            $dernierElement['entre'] = str_replace(', ', '<br>', $dernierElement['entre']);
                            echo $dernierElement['entre'];
                        ?>
                        </p>
                    </div>
                    <hr class="border border-3">
                    <div>
                        <h3 class="fw-bold">Plat</h3>
                        <p> <?php
                            $dernierElement['plat'] = str_replace(', ', '<br>', $dernierElement['plat']);
                            echo $dernierElement['plat'];
                        ?></p>
                    </div>
                    <hr class="border border-3">
                    <div>
                        <h3 class="fw-bold">Dessert</h3>
                        <p> <?php
                            $dernierElement['dessert'] = str_replace(', ', '<br>', $dernierElement['dessert']);
                            echo $dernierElement['dessert'];
                        ?></p>
                    </div>
                    </div>
                    <!-- Toutes kes autres slides -->
                    <?php
                    foreach ($tableauResult as $result){
                        $result['entre'] = str_replace(', ', '<br>', $result['entre']);
                        $result['plat'] = str_replace(', ', '<br>', $result['plat']);
                        $result['dessert'] = str_replace(', ', '<br>', $result['dessert']);
                        echo "<div class='card carousel-item'>";
                        echo "<div>
                        <img src='" . $result['image_plat'] . "' alt='' class='card-img-top'>
                        <h3 class='fw-bold entre'>Entrée</h3>
                        <p>".$result['entre']."</p>
                    </div>";
                    echo "<hr class='border border-3'>";
                    echo " <div>
                    <h3 class='fw-bold'>Plat</h3>
                    <p>".$result['plat']."</p>
                </div>";
                echo "<hr class='border border-3'>";
                echo "<div>
                <h3 class='fw-bold'>Dessert</h3>
                <p>".$result['dessert']."</p>
            </div>";
            echo "</div>";
                    }
                    ?>
            </div>
        </section>
    </main>
    <footer>
        <!-- Pas ma partie -->
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="script_crous.js"></script>
</html>