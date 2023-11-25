<?php
include("template/header.php");
?>



    <div class="container">
        <form action="index.php?action=addCoach" method="post" class="form">
            <h2>Inscription coach </h2>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe :</label>
                <select id="sexe" name="sexe" required>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité :</label>
                <input type="text" id="specialite" name="specialite" required>
            </div>
            <div class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Ajouter Coach</button>
            </div>
            <p class="notice">Notice : le mot de passe doit contenir une majuscule, une minuscule, un chiffre et un caractère spécial</p>
            <p class="connexion">vous n'êtes pas coach ? <a href="index.php?action=showClientForm">Inscrivez-vous ici</a></p>
        </form>
    </div>
    <div class="contenu">
        <div class="information">
            <h2 class= "titre">BOURBON FITNESS</h2>
                <H3 class="sous_titre"> <br>De quoi il s'agit ? </H3>
                <p ><br>Notre plateforme réunie tout les coach de la réunion dans divers spécialitées.
                    <br><br>Vous pouvez visualiser les coachs en fonction de vos attentes, donner une notations sous forme d'étoiles ,écrire un commentaire ainsi que d'échanger gratuitement avec les coachs par le biais de notre tchat.</p>
                <H3 class="sous_titre"> <br> Quel est le but ? </H3>
                <p><br>Le but est de faciliter votre démarche dans la recherche d'un coachs spécialisé ainsi que de mettre en valeur tout les coachs de la Réunion.</p>
        </div>
    </div>
</body>

</html>
<?php
//include 'template/footer.php';
?>

