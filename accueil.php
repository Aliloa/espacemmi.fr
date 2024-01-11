<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Espace MMI | Accueil</title>
    <link rel='icon' href='img/favicon.png'>
    <link rel='stylesheet' href='css/style_navigation.css'>
    <link rel='stylesheet' href='css/style_accueil.css'>
    <link rel='stylesheet' href='css/dark_mode.css'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    } if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e'){
        header('Location: backofficeprof.php?access_denied');


    }
    ?>
    <header>
        <div class='menu'>

            <!-- Logo Accueil -->
            <a href='accueil.php'><img class="logo" src='./img/logo.svg' alt="page d'accueil"
                    aria-current="currentpage"></a>

            <!-- Navigation desktop -->
            <nav class='navigation'>
                <ul class='choix'>
                    <li><a href='cours.php'>Mes cours</a></li>
                    <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
                    <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
                    <li><a href='page_crous.php'>Crous</a></li>
                </ul>

                <!-- Barre de recherche -->
                <div class='group'>
                    <svg viewBox='0 0 24 24' aria-hidden='true' class='icon'>
                        <g>
                            <path
                                d='M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z'>
                            </path>
                        </g>
                    </svg>
                    <label for="barre de recherche"></label>
                    <input id="barre de recherche" class='input' type='search' placeholder='Search' />
                </div>

                <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
                <div class='icon-photo'>
                    <a href='messagerie.php'><img class='lettre' src='./img/1-lettre.svg' alt="messagerie"></a>
                    <button class="dark_button" onclick="toggleDarkMode()"><img class='dark_mode' src='./img/1-moon.svg'
                            alt="mode sombre"></button>



                    <!-- PHP - LIEN VERS LA PAGE profil.php POUR MODIF LA PDP-->
                    <div class='photo-2'>

                        <?php
                        include('connexion.php');

                        if (isset($_SESSION["login"])) {
                            $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                            $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($result) {
                                echo "
                                <a href='profil.php'> <img src='upload/{$result['photoprofil']}' alt='' class='photo-2'></a>";
                            }
                        }
                        ?>

                    </div>
                    <!-- FIN PHP-->
                    <form action="deconnexion.php" method="GET">
                        <button type="submit" name="deconnect" id="btnDeconnexion">
                            <img class="logout" src="img/1-logout.svg" alt="Déconnexion">
                        </button>
                    </form>

                </div>
            </nav>

            <!-- Navigation mobile & tablette -->
            <div class='menu-burger'>

                <span id='burger-menu'> <img class="img_menu" src='./img/menu.svg' alt='menu'></span>

                <nav class='burger'>


                    <!-- PHP/ STRUCTURE POUR ADAPTER A L UTILISATEUR   -->
                    <?php
                    include('connexion.php');

                    if (isset($_SESSION["login"])) {
                        $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                        $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "
                            <div class='kelis'>
                                <div class='profil-1'>
                                    <a href='profil.php'>
                                        <div class='photo-1'>
                                        <img src='upload/{$result['photoprofil']}' class='photo-1' alt=''>
                                        </div>
                                    </a>
                                    <div class='profil-2'>";


                        echo "<h1> {$result['prenom']} {$result['nom']}</h1>";
                        echo "<p>{$result['promotion']}</p>";

                        echo "       </div>
                                </div>
                                <div class='profil-3'>
                                <h2>À propos</h2>";
                        echo "<p>{$result['bio']}</p> 
                                </div>
                            </div>";

                    }
                    ?>
                    <!-- FIN PHP   -->


                    <ul class='choix-2'>
                        <li><a href='cours.php'>Mes cours</a></li>
                        <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
                        <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
                        <li><a href='page_crous.php'>Crous</a></li>
                    </ul>


                    <div class='tools'>
                        <div class='tool'>
                            <img class="param" src='img/1-param.png' alt=''>
                            <a href='profil.php'><p>Profil</p></a>
                        </div>
                        <div class='tool'>
                            <img class="lettre" src='img/1-lettre.svg' alt=''>
                            <a href='messagerie.php'><p>Messagerie</p></a>
                        </div>
                        <div class='tool'>
                            <button class="flex_bouton" onclick="toggleDarkMode()"><img class='dark_mode'
                                    src='./img/1-moon.svg' alt="mode sombre">
                                <p>Mode sombre</p>
                            </button>
                        </div>
                        <div class='tool'>
                            <img class="logout" src='img/1-logout.svg' alt=''>
                            <form action="deconnexion.php" method="GET">
                                <button class="btnDeconnexion" type="submit" name="deconnect" id="btnDeconnexion">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>

                </nav>

                <div class='overlay'></div>

            </div>

        </div>

    </header>



    <main>

        <div class='container'>

            <div class='bloc-1'>

                <div>
                    <?php
                    include('connexion.php');

                    if (isset($_SESSION["login"])) {
                        $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                        $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<h1>Bonjour {$result['prenom']}, sympa de vous revoir !</h1>";
                    }
                    ?>
                    <p>Bienvenue sur l'EntMMi, votre espace dédié au Multimédia et à l'Informatique. Explorez, et
                        découvrez les dernières informations disponibles.</p>
                </div>

                <img src='img/1-perso.png' alt=''>

            </div>


            <div class='bloc-2'>

                <div class="pre-next">
                    <button id="precedent"> <img src="img/1-left.svg" alt="précédent"></button>
                    <button id="suivant"><img src="img/1-right.svg" alt="suivant"></button>
                </div>

                <div class="wake">
                    <p>8h 9h 10h 11h 13h 14h 15h 16h 17h</p>
                </div>

                <img class="line" src="img/1-line.png" alt="">

                <div id="planning">

                    <?php

                    // setlocale(LC_TIME, 'fr_FR.utf8'); // j'ai défini la langue locale en français pour traduire les données mais ça ne marche pas pardon population
                    
                    $apiUrl = 'https://entmmi.fr/api/ade-ics';

                    $data = array(
                        'ical_url' => 'https://edt.univ-eiffel.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=4905&projectId=25&calType=ical&nbWeeks=50',
                        'raw_data' => false,
                        'parsed_data' => true,
                        'from' => strtotime('2023-12-18'),
                        'to' => strtotime('2024-04-04'),
                        'group' => 'B',
                    );

                    $options = [
                        'http' => [
                            'header' => "Content-type: application/json",
                            'method' => 'POST',
                            'content' => json_encode($data),
                        ],
                    ];

                    $context = stream_context_create($options);
                    $result = file_get_contents($apiUrl, false, $context);
                    $response = json_decode($result, true);
                    $planningData = $response; // Les données qu'on a obtenu
                    
                    if (isset($response['error'])) {
                        echo "API Error: " . $response['error']['message'];
                    } else {

                        // Organisation des données dans un emploi du temps quotidien
                        $planning = [];

                        foreach ($planningData as $event) {
                            $day = (new DateTime())->setTimestamp($event['start'])->format('l j F Y');

                            $formatEDT = [
                                'start_time' => date('H:i', $event['start']),
                                'end_time' => date('H:i', $event['end']),
                                'title' => isset($event['title']) ? $event['title'] : '',
                                'trainer' => isset($event['trainer']) ? $event['trainer'] : '',
                                'location' => implode(', ', $event['location']),
                            ];

                            $planning[$day][] = $formatEDT;
                        }

                        // Trier les jours par ordre chronologique
                        uksort($planning, function ($a, $b) {
                            return strtotime($a) - strtotime($b);
                        });


                        // Trier les événements de chaque jour par heure de début
                        foreach ($planning as &$events) {
                            usort($events, function ($a, $b) {
                                return strtotime($a['start_time']) - strtotime($b['start_time']);
                            });
                        }

                    }
                    ?>

                </div>

                <script>
                    var planning = <?php echo json_encode($planning); ?>;
                    var suiviJourActuel = 0;
                    var container = document.getElementById('planning');
                    var precedent = document.getElementById('precedent');
                    var suivant = document.getElementById('suivant');

                    function voirEDT() {
                        // Affichage du contenu du jour
                        var jourJ = Object.keys(planning)[suiviJourActuel];
                        var contenuEDT = '<h2>' + jourJ + '</h2><div class="edt">';

                        planning[jourJ].forEach(function (event) {
                            contenuEDT += ` <div class="hour-0"> 
                                                <p class="hour">${event['start_time']} - ${event['end_time']} </p> 
                                                <div class="edt-p"> 
                                                    <p>${event['title']}</p>
                                                    <p>${event['trainer']} </p>
                                                    <p>${event['location']}</p>
                                                </div>
                                            </div>`;
                        });

                        contenuEDT += '</div>';
                        container.innerHTML = contenuEDT;
                    }


                    function updateDay(offset) {
                        suiviJourActuel += offset;

                        // Vérifie si l'index est en dehors des limites
                        if (suiviJourActuel < 0) {
                            suiviJourActuel = 0;

                            //  Garantit que suiviJourActuel reste dans les limites du tableau des clés de planning.
                        } else if (suiviJourActuel >= Object.keys(planning).length) {
                            suiviJourActuel = Object.keys(planning).length - 1;
                        }

                        // Affichage du contenu du jour correspondant
                        voirEDT();
                    }

                    // Ajout des gestionnaires d'événements pour les boutons "Précédent" et "Suivant"
                    precedent.addEventListener('click', function () {
                        updateDay(-1);
                    });

                    suivant.addEventListener('click', function () {
                        updateDay(1);
                    });

                    // Affichage du contenu du jour actuel lors du chargement de la page
                    voirEDT();
                </script>

            </div>




            <div class='bloc-3'>

                <h1>Vos derniers cours ajoutés</h1>
                <a href='derniers_cours.php'>
                    <p class='vp'>voir plus</p>
                </a>
                <?php
                include('connexion.php');
                $requete = "SELECT cours.*, utilisateurs.nom, utilisateurs.prenom
                                FROM cours
                                INNER JOIN utilisateurs ON cours.externe_prof = utilisateurs.id_utilisateurs
                                ORDER BY id_cours DESC LIMIT 2";

                $stmt = $db->query($requete);
                $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultat as $cours) {
                    $chemindoc = "documents/" . $cours["document"];

                    echo "<div class='cours'>
                                    <a href='{$chemindoc}' target='_blank'><h2>{$cours["cours"]}</h2></a>
                                    <p>Créé par {$cours["prenom"]} {$cours["nom"]}</p>
                            </div>";
                }
                ?>

            </div>




            <div class='bloc-4'>
                <h1>Forum</h1>
                <a href='#'>
                    <p class='vp'>voir plus</p>
                </a>

                <div class='cours'>
                    <div>
                        <h2>FATIMARAJAN Anchana</h2>
                        <p>ent maudit puree</p>
                    </div>
                </div>

            </div>





            <div class='bloc-5'>
                <h1>Vos dernières notes</h1>
                <a href='vie_scolaire.php'>
                    <p class='vp'>voir plus</p>
                </a>
                <div class='graphique'>
                    <canvas id="histogramme" width="500" height="400" style="padding: 20px;"></canvas>
                </div>

                <?php
                include('connexion.php');

                $requete = $db->query("SELECT * FROM notes ORDER BY date_note DESC LIMIT 7");

                $requete = "SELECT DATE_FORMAT(date_note, '%d/%m') AS nouvelledate, notes.* FROM notes ORDER BY nouvelledate DESC LIMIT 6";
                $stmt = $db->query($requete);

                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $notes = [];
                $nom_notes = [];
                $matiere = [];

                foreach ($data as $row) {
                    $notes[] = $row["notes"];
                    $nom_note[] = $row["nom_note"];
                    $matiere[] = $row["nouvelledate"];
                }
                ?>

                <script>
                    const ctx = document.getElementById('histogramme');

                    // Supposons que $matiere est un tableau de noms de matières en PHP
                    const matiere = <?= json_encode($matiere) ?>;
                    const nom_note = <?= json_encode($nom_note) ?>;

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: matiere,

                            datasets: [{
                                label: 'Notes',
                                data: <?= json_encode($notes) ?>,
                                backgroundColor: "#6C63FF",
                                borderColor: "#6C63FF",
                                borderWidth: 1,
                                // borderRadius: 50
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    }

                                },
                                y: {
                                    grid: {
                                        display: false
                                    },
                                    beginAtZero: true,
                                    max: 20,
                                    // j'ai ajouté max 20 mais jsp où t'as fait pour faire de 2 en 2
                                }
                            },
                            plugins: {
                                title: {
                                    display: false
                                },
                                legend: {
                                    display: false
                                },

                            }

                        }
                    });

                </script>



            </div>






            <div class='bloc-6'>
                <?php
                // seconde requete pour avoir seulement l'élement de la bdd de la date qui se rapproche de ajoudhui
                $dateAujourdhui = date("Y-m-d");
        $requeteDernier = "SELECT * FROM crous WHERE date >= :aujourdhui AND lieu = 'ESIEE' ORDER BY date ASC LIMIT 1";
        $stmtDernier = $db->prepare($requeteDernier);
        $stmtDernier->bindParam(':aujourdhui', $dateAujourdhui, PDO::PARAM_STR);
        $stmtDernier->execute();
        $dernierElement = $stmtDernier->fetch(PDO::FETCH_ASSOC);

        // Traduire les jours de la semaine
        $dayNames = [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche',
        ];

        $date_dernier = new DateTime($dernierElement['date'], new DateTimeZone('Europe/Paris'));
        $jour_anglais_d = $date_dernier->format('l');
        $nom_jour_dernier = $dayNames[$jour_anglais_d];
                ?>
                <div class='menu_autre'>
                        <div>
                        <h1>Menu du <?php echo $nom_jour_dernier . " " . date('d/m', strtotime($dernierElement['date'])); ?> (ESIEE) </h1>
                        </div>
                        <div class='card shadow'>
                        <div>
                        <img src="<?php echo $dernierElement['image_plat']; ?>" alt='' class='card-img-top'>
                        <h3 class='entre'>Plat</h3>
                        <p> <?php
                                $dernierElement['plat'] = str_replace(', ', '<br>', $dernierElement['plat']);
                                echo $dernierElement['plat'];
                                ?> <br>
                        ...
                        </p>
                        <button class='btn voir_plus' id=' <?php echo $dernierElement['id'] ?>'>voir plus</button>
                        </div>
                        </div>
                    </div>
            </div>

            <!-- POP UP MENU SU JOUR -->
            <section class='bon_pop_up pop_up today' id='<?php echo $dernierElement['id'] ?>'>
                        <h2 class='m-0 date'> <?php echo date('d/m', strtotime($dernierElement['date'])); ?></h2>
                        <div class='card'>
                            <div>
                                <img src='<?php echo $dernierElement['image_plat']; ?>' alt='' class='card-img-top'>
                                <h3 class='fw-bold entre'>Entrée</h3>
                                <p><?php echo str_replace(', ', '<br>', $dernierElement['entre']); ?></p>
                            </div>
                            <hr class='border border-3'>
                            <div>
                                <h3 class='fw-bold'>Plat</h3>
                                <p><?php echo $dernierElement['plat']; ?></p>
                            </div>
                            <hr class='border border-3'>
                            <div>
                                <h3 class='fw-bold'>Dessert</h3>
                                <p><?php echo str_replace(', ', '<br>', $dernierElement['dessert']); ?></p>
                            </div>
                        </div>
                    </section>
        



            <div class='bloc-7'>

                <?php
                include('connexion.php');
                $requete = "SELECT * FROM utilisateurs ORDER BY login = :login DESC, login LIMIT 3";
                $stmt = $db->prepare($requete);
                $stmt->bindParam(':login', $_SESSION['login'], PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $user) {
                    echo "<div class='kelis-2'>
                            <img src='upload/{$user['photoprofil']}' alt=''>
                            <p>{$user['login']}</p>
                            <p class='p'>En ligne</p>
                        </div>";
                }
                ?>

            </div>

        </div>

    </main>

    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>

</body>

<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>
<script src="js/script_crous.js"></script>


</html>