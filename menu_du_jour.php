<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style_menu.css" />
    <title>Espace mmi menu</title>
    
</head>


<body>


    <nav>
        <!-- Pas à moi de le faire? -->
    </nav>


    <main>

    <a href="ajouter_menu.php"><button>Ajouter menu</button></a>
        <?php
            include("connexion.php");
            // première requete pour avoir tous les menus de la base de données, sauf le dernier
            $requete = "SELECT * FROM crous ORDER BY date ASC LIMIT 1, " . PHP_INT_MAX;
            $stmt = $db->prepare($requete);
            $stmt->execute();
            $tableauResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // seconde requete pour avoir seulement le dernier élement de la bdd
            $requeteDernier = "SELECT * FROM crous ORDER BY date ASC LIMIT 1";
            $stmtDernier = $db->prepare($requeteDernier);
            $stmtDernier->execute();
            $dernierElement = $stmtDernier->fetch(PDO::FETCH_ASSOC);
        ?>


        <!-- Carousel version mobile, avec Bootstrap -->
        <section class="today mobile">



<div class="carousel_wrap shadow">
                <!-- Date avec les boutons -->
            <button class="carousel_gauche" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-left carousel-control-prev-icon" viewBox="0 0 16 16" style="color:black">
                    <path fill-rule="evenodd"
                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg>
            </button>
            <!-- afficher la date au format jj-mm (chatGPT) -->
            <button class="carousel_droite" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right carousel-control-next-icon" viewBox="0 0 16 16" style="color:black">
                    <path fill-rule="evenodd"
                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
 <div class="carousel">
                <!-- première slide -->
                <div class="carousel-item">
                    <h2 class="m-0 date">
                        <?php echo date('d/m', strtotime($dernierElement['date'])); ?>
                    </h2>
                    <div class="card">
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
                            <p>
                                <?php
                                $dernierElement['plat'] = str_replace(', ', '<br>', $dernierElement['plat']);
                                echo $dernierElement['plat'];
                                ?>
                            </p>
                        </div>
                        <hr class="border border-3">
                        <div>
                            <h3 class="fw-bold">Dessert</h3>
                            <p>
                                <?php
                                $dernierElement['dessert'] = str_replace(', ', '<br>', $dernierElement['dessert']);
                                echo $dernierElement['dessert'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Toutes kes autres slides -->
                <?php
                    foreach ($tableauResult as $result) {
                        $result['entre'] = str_replace(', ', '<br>', $result['entre']);
                        $result['plat'] = str_replace(', ', '<br>', $result['plat']);
                        $result['dessert'] = str_replace(', ', '<br>', $result['dessert']);
                        echo "<div class='carousel-item'>";
                        echo "<h2 class='m-0 date'>" . date('d/m', strtotime($result['date'])) . "</h2>";
                        echo "<div class='card'>";
                        echo "<div>
                            <img src='" . $result['image_plat'] . "' alt='' class='card-img-top'>
                            <h3 class='fw-bold entre'>Entrée</h3>
                            <p>" . $result['entre'] . "</p>
                        </div>";
                        echo "<hr class='border border-3'>";
                        echo " <div>
                        <h3 class='fw-bold'>Plat</h3>
                        <p>" . $result['plat'] . "</p>
                    </div>";
                        echo "<hr class='border border-3'>";
                        echo "<div>
                    <h3 class='fw-bold'>Dessert</h3>
                    <p>" . $result['dessert'] . "</p>
                    </div>";
                        echo "</div>
                    </div>";
                    }
                ?>
            </div>
</div>
           

                


        </section>

        <!-- VERSION DESKTOP -->
        <section class="container today desktop">
            <div class="menu_ajd">
                <div>
                    <h2 class="fs-5">24/11</h2>
                </div>
                <div class="card shadow violet">
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
                        <p>
                            <?php
                            $dernierElement['plat'] = str_replace(', ', '<br>', $dernierElement['plat']);
                            echo $dernierElement['plat'];
                            ?>
                        </p>
                    </div>
                    <hr class="border border-3">
                    <div>
                        <h3 class="fw-bold">Dessert</h3>
                        <p>
                            <?php
                            $dernierElement['dessert'] = str_replace(', ', '<br>', $dernierElement['dessert']);
                            echo $dernierElement['dessert'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid tous_les_menu">

                <?php
                    foreach ($tableauResult as $result) {
                        $result['plat'] = str_replace(', ', '<br>', $result['plat']);
                        echo "<div class='menu_autre'>";
                        echo "<div>
                            <h2 class='fs-5'>" . date("d/m", strtotime($result['date'])) . "</h2>
                        </div>";
                        echo "<div class='card shadow'>";
                        echo "<div>
                        <img src=" . $result['image_plat'] . " alt='' class='card-img-top'>
                        <h3 class='fw-bold entre'>Plat</h3>
                        <p>" . $result['plat'] . "<br>
                        ...
                        </p>
                        <button class='btn voir_plus rounded-5' id='" .$result['id']. "'>voir plus</button>
                    </div>";
                        echo "</div>
                    </div>";
                    }
                ?>
            </div>
        </section>
    </main>

        <?php
                    foreach ($tableauResult as $result) {
                        $result['entre'] = str_replace(', ', '<br>', $result['entre']);
                        $result['plat'] = str_replace(', ', '<br>', $result['plat']);
                        $result['dessert'] = str_replace(', ', '<br>', $result['dessert']);

                        echo "<section class='pop_up today' id='" .$result['id']. "'>
                        <h2 class='m-0 date'>" . date('d/m', strtotime($result['date'])) . "</h2>
                        <div class='card'>
                            <div>
                                <img src='" . $result['image_plat']. "
                                ' alt='' class='card-img-top'>
                                <h3 class='fw-bold entre'>Entrée</h3>
                                <p> " .
                                    $result['entre'] . "</p>
                            </div>
                            <hr class='border border-3'>
                            <div>
                                <h3 class='fw-bold'>Plat</h3>
                                <p>" . $result['plat']. "</p>
                            </div>
                            <hr class='border border-3'>
                            <div>
                                <h3 class='fw-bold'>Dessert</h3>
                                <p>" . $result['dessert'] . "</p>
                            </div>
                        </div>
                    </section>";
                    }
                ?>


    <footer>
        <!-- Pas ma partie -->
    </footer>


</body>

<script src="js/script_crous.js"></script>