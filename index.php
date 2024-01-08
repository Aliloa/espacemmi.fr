<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Accueil</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">


</head>
<body>
<div class="main1">
<div class="logo">
    <img src="img/logo_petit.png">
    <img src="img/Logo.png">

   
</div>

    <div class="information_main">
    <h1>Bienvenue sur le site Intranet MMI</h1>
    <h2>L'ENT Eiffel est maintenant disponible sur le site intranet étudiant et enseignant.</h2>

<p>Explorez nos ressources pédagogiques, échangez avec vos pairs, et découvrez les services offerts par le CROUS. Notre communauté aspire à promouvoir l'excellence académique, la créativité, et le bien-être de tous ses membres.</p>


<div class="links-container">
        <a href="connexion_page.php">Connexion</a>
    </div>
   <div class="image1">
    <img src="img/image_index.png">
   </div> 
    </div>

    

    
</div>
    

<footer>
        <div class="mentions-legales" onclick="openModal()">Mentions Légales</div>
    </footer>

     <!-- Modal -->
     <div id="myModal" class="modal" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation();">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Mentions Légales</h2>
            <p>Ajoutez ici le contenu de vos mentions légales.</p>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>

</body>
</html>