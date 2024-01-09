<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_navigation.css'>
    <title>Espace MMI | Planning</title>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>


    <header>
        <div class='menu'>

            <!-- Logo Accueil -->
            <a href='accueil.php'><img src='./img/logo.svg' alt="page d'accueil" aria-current="currentpage"></a>

            <!-- Navigation desktop -->
            <nav class='navigation'>

                <ul class='choix'>
                    <li><a href=''>Mes cours</a></li>
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
                    <input class='input' type='search' placeholder='Search' />
                </div>

                <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
                <div class='icon-photo'>

                    <img class='logo' src='./img/1-lettre.svg' alt="page d' accueil">
                    <img class='logo' src='./img/1-notif.svg' alt="page d' accueil">
                    <img class='logo' src='./img/1-moon.svg' alt="page d' accueil">

                    <!-- PHP - AJOUTEZ LE LIEN POUR LA D2CONEXION ET LE LIEN VERS LA PAGE PARAMETRES.PHP POUR MODIF LA PDP-->
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
                                <a href='parametres.php'> <img src='upload/{$result['photoprofil']}' alt='' class='photo-2'></a>";
                            }
                        }
                        ?>

                    </div>
                    <!-- FIN PHP-->

                </div>

            </nav>

            <!-- Navigation mobile & tablette -->
            <div class='menu-burger'>

                <span id='burger-menu'> <img src='./img/menu.svg' alt='menu'></span>

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
                                    <a href='parametres.php'>
                                        <div class='photo-1'>
                                            <img src='upload/{$result['photoprofil']}' class='photo-1' alt=''>
                                        </div>
                                    </a>

                                    <div class='profil-2'>
                                        <h1> {$result['prenom']} {$result['nom']}</h1>
                                        <p>{$result['promotion']}</p>
                                    </div>
                                </div>
                                <div class='profil-3'>
                                    <h2>À propos</h2>
                                    <p>{$result['bio']}</p>
                                </div>
                            </div>";

                    }
                    ?>
                    <!-- FIN PHP   -->


                    <ul class='choix-2'>
                        <li><a href=''>Mes cours</a></li>
                        <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
                        <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
                        <li><a href='page_crous.php'>Crous</a></li>
                        <li><a href=''>Déconnexion</a></li>
                    </ul>


                    <div class='tools'>
                        <div class='tool'>
                            <img src='img/1-notif.svg' alt=''>
                            <p>Notifications</p>
                        </div>
                        <div class='tool'>
                            <img src='img/1-param.png' alt=''>
                            <p>Paramètres</p>
                        </div>
                        <div class='tool'>
                            <img src='img/1-lettre.svg' alt=''>
                            <p>Messagerie</p>
                        </div>
                        <div class='tool'>
                            <img src='img/1-moon.svg' alt=''>
                            <p>Mode sombre</p>
                        </div>
                    </div>


                </nav>

                <div class='overlay'></div>

            </div>
        </div>

    </header>

    <main>

        <?php
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

        $planningData = $response;

        if (isset($response['error'])) {
            echo "API Error: " . $response['error']['message'];
        } else {

        // Organisation des données dans le planning
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

        // Triage des jours par ordre chronologique
        uksort($planning, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });


        // Triage des événements de chaque jour par heure de début
        foreach ($planning as &$events) {
            usort($events, function ($a, $b) {
                return strtotime($a['start_time']) - strtotime($b['start_time']);
            });
        }

        // Affichage du planning 
        
        // Affichage des boutons prédent et suivant
        echo "<div id='container'></div>
                <button onclick='previousWeek()'> Précédent </button>
                <button onclick='nextWeek()'>Suivant</button>";

        
        }
        ?>

        <script>

            planningData = <?php echo json_encode ($planning); ?>

            var suiviSemaine = 0;
            var contenuEdt = document.getElementById('container');

            function voirEDT() {

                // Obtention des 5 jours de la semaine hors week-ends
                var jourOuvrable = Object.keys(planningData).slice(suiviSemaine * 5, (suiviSemaine + 1) * 5);


                // Si le premier jour n'est pas un lundi, ajustation pour obtenir une semaine complète commençant par un lundi
                var lundi = new Date(jourOuvrable[0]);
                if (lundi.getDay() !== 1) {
                    var daysToAdjust = 1 - lundi.getDay();
                    jourOuvrable = Object.keys(planningData).slice((suiviSemaine * 5) + daysToAdjust, ((suiviSemaine + 1) * 5) + daysToAdjust);
                }

                
                // Affichage du contenu de la semaine
                var contenuEDT = '';

                jourOuvrable.forEach(function (day) {
                    contenuEDT += '<h2>' + day + '</h2><ul>';
                    planningData[day].forEach(function (event) {
                        contenuEDT += `<li>${event['start_time']} - ${event['end_time']}: ${event['title']} ${event['trainer']} (${event['location']})</li>`;
                    });
                    contenuEDT += '</ul>';
                });

                contenuEdt.innerHTML = contenuEDT;
            }

            function previousWeek() {
                if (suiviSemaine > 0) {
                    suiviSemaine--;
                    voirEDT();
                }
            }

            function nextWeek() {
                if ((suiviSemaine + 1) * 5 < Object.keys(planningData).length) {
                    suiviSemaine++;
                    voirEDT();
                }
            }

            voirEDT();
        </script>


    </main>




</body>


<script src='js/script_accueil.js'></script>

</html>