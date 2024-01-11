Dans le cadre d'un projet universitaire, nous devions réaliser un site de réservation.
Voici le lien public de ce dernier: https://espacemmichamps.fr/

Afin de réinstaller un site et une base de données sur un serveur local XAMPP, en précisant l'URL locale à utiliser pour y accéder, voici les étapes à suivre:

# Étape 1:
Lancer le programme XAMPP et cliquer sur "start" pour exécuter les services Apache et MySQL.

# Étape 2: 
Localiser et copier le fichier "espacemmichamps" dans le répertoire "htdocs" de l'installation XAMPP en suivant le chemin d'accès par défaut: C:\xampp\htdocs.

# Étape 3: 
Ouvrir le navigateur Web de votre choix et saisir l'URL "http://localhost/phpmyadmin/". Il suffira ensuite de se connecter, puis de cliquer sur l'onglet "Base de données". 
Créez en une nouvelle, puis une fois cela fait, sélectionnez la base de données nouvellement créee et cliquer sur "Importer" dans le menu situé en haut. Cliquez sur le bouton "Parcourir" et insérer le document "ent.sql". Ensuite en appuyant sur le bouton "exécuter", les tables et leur contenu seront entrés dans la nouvelle base de données.

# Étape 4: 
Dans le document "connexion.php", modifiez les paramètres tels que le nom de la base de données, le nom d'utilisateur, le mot de passe et l'hôte pour faire correspondre le document à votre nouvelle base de données. Ensuite enregistrer les modifications apportées.


# Étape 5:
Retourner dans le navigateur Web de votre choix et saisissez l'URL "http://localhost/espacemmichamps.fr".
Ce dernier affichera maintenant votre site réinstallé, accessible localement depuis votre machine via XAMPP

# espacemmichamps.fr