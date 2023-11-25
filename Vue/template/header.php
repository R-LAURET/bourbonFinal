<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/FormRegister.css" type="text/css">
    <link rel="stylesheet" href="Style/StyleCoach.css" type="text/css">

    <title>BourbonFitness</title>
</head>
<body>

<div class="header">
    <!--<img src="image_d'acceuil.jpeg" alt="Jogging">-->
    <!--<h1 class="titre1">BOURBON FITNESS</h1>-->
</div>

<!-- Barre de navigation -->
<div class="navbar top">
    <a href="BourbonFitness.php">Accueil</a>
    <a href="index.php?action=showCoaches">Trouver Coach</a>
    <a href="">À Propos</a>
    <a href="index.php?action=showRegistrationForm">Mon Compte</a>
    
    <!-- Formulaire de connexion à droite -->
    <form action="index.php?action=Connexion" method="post" class="login-form top">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Connexion</button>
    </form>
</div>

<!-- Votre contenu de page ici -->

