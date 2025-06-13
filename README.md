Gestionnaire de Tâches (To-Do List)

Un projet simple de gestion de tâches en PHP et MySQL avec des fonctionnalités CRUD (Créer, Lire, Mettre à jour, Supprimer).

Fonctionnalités





Ajouter une tâche avec un titre et une description



Afficher la liste des tâches



Modifier une tâche existante



Supprimer une tâche



Filtrer les tâches par statut (toutes, en cours, terminées)

Prérequis





Serveur web (Apache)



PHP 7.4 ou supérieur



MySQL/MariaDB



Git



Composer (pour installer les dépendances)

Installation





Clonez ce dépôt :

git clone <URL_DU_DEPOT>
cd todo_list



Installez les dépendances avec Composer :

composer install



Créez une base de données MySQL nommée todo_list et exécutez le script database.sql pour créer la table tasks.



Créez un fichier .env à la racine du projet avec le contenu suivant :

DB_HOST=localhost
DB_NAME=todo_list
DB_USER=root
DB_PASS=votre_mot_de_passe

Remplacez votre_mot_de_passe par votre mot de passe MySQL.



Placez les fichiers dans le répertoire racine de votre serveur web (ex. : htdocs pour XAMPP).



Accédez à l'application via http://localhost/todo_list/index.php.

Structure des fichiers





index.php : Page principale pour afficher et gérer les tâches



config.php : Configuration de la connexion à la base de données



style.css : Feuille de style



database.sql : Script SQL pour la base de données



add_task.php : Script pour ajouter une tâche



edit_task.php : Script pour modifier une tâche



delete_task.php : Script pour supprimer une tâche



.env : Fichier pour les variables d'environnement (non versionné)



composer.json : Configuration des dépendances Composer

Démo

(TODO : Ajoutez des captures d'écran ou un lien vers une démo en ligne si disponible)

License

Ce projet est sous licence MIT.