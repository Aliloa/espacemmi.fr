Dans le cadre d'un projet universitaire, nous devions réaliser la refont de notre ent.
Voici le lien public de ce dernier: https://espacemmichamps.fr/

Afin  d'installer un site et une base de données sur un serveur O2switch, voici les étapes à suivre:

# Étape 1:
Connectez-vous à votre compte O2Switch et accédez au gestionnaire de fichiers pour téléchargez tous les fichiers du site. Il suffira ensuite d'exporter la base de données via l'interface de gestion de base de données en cliquant sur phpMyAdmin.

# Étape 2: 
Créer une nouvelle base de données et un nouvel utilisateur pour le site sur l'espace compte. Il faut ensuite lier un utilisateur à la base de données. Créez-en un s'il le faut et ajouter lui tous les privilèges.

# Étape 3: 
Utiliser un client FTP (FileZilla, par exemple) pour transférer les fichiers du site vers le serveur O2switch ou importer directement les fichiers dans le répertoire choisi dans gestionnaire de fichiers. Il faut s'assurer que les permissions des fichiers et des répertoires sont correctes.


# Étape 4: 
Accéder à la gestion de la base de données sur le nouveau serveur et importez le fichier SQL que précédemment exporté.

# Étape 5:
Il faut s'assurer de modifier le fichier de configuration du site pour refléter les nouvelles informations de la base de données (nom de la base de données, nom d'utilisateur, mot de passe).

# Étape 6:
Accéder sur le site web sur le site à l'adresse espacemmichamps.fr et faire des tests pour vérifier que toutes les requêtes PHP fonctionnent correctement.

# Étape 7:
Plus tard, patienter le temps que l'option "Redirection HTTPS" soit disponible, puis activer l'option depuis l'espaces "Domaines" pour garantir la sécurité du site web.


<!-- Dans le cadre d'un projet universitaire, nous devions réaliser un ent.
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

# espacemmichamps.fr -->