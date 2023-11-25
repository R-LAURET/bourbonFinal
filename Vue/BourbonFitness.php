<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Site</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/Style.css"> <!-- Lien vers le fichier CSS externe -->
</head>
<body>


<!-- En-tête de la page -->
<div class="header">
    <!--<img src="image_d'acceuil.jpeg" alt="Jogging">-->
    <h1 class="titre1">BOURBON Fitness</h1>
    
</div>



<!-- Barre de navigation -->
<div class="navbar">
    <a href="BourbonFitness.php">Accueil</a>
    <a href="Coach.php">Trouver Coach</a>
    <a href="">À Propos</a>
    <a href="login.php">Mon Compte</a>
</div>

<div class="dd">
<h2>Les Coachs du moment</h2>
    <div class="coachs-section">
            <?php
            // Configuration de la connexion à la base de données
            $serveur = "localhost";
            $utilisateur = "btssio";
            $motDePasse = "btssio";
            $baseDeDonnees = "BourbonFitness";

            // Connexion à la base de données
            $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

            // Vérification de la connexion
            if ($connexion->connect_error) {
                die("Échec de la connexion à la base de données : " . $connexion->connect_error);
            }

            // Requête SQL pour récupérer les données des coachs
            $requete = "SELECT nomCoach, specialite FROM Coach";
            $resultat = $connexion->query($requete);

            // Affichage des données des coachs dans le HTML
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo '<div class="coach">';
                    echo '<img src=".jpg" alt="COACH">';
                    echo '<h3>' . $row["nomCoach"] . '</h3>';
                    echo '<p>Spécialité : ' . $row["specialite"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Aucun coach trouvé dans la base de données.";
            }
        ?>
    </div>
</div>

