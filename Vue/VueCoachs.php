<?php include('template/header.php'); ?>

<h1>Liste des Coachs</h1>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Âge</th>
            <th>Spécialité</th>
            <th>Detail</th>
            <!-- Ajoutez d'autres en-têtes en fonction de vos propriétés -->
        </tr>

        <?php foreach ($coaches as $coach): ?>
            <tr>
                <td><?= $coach->getId(); ?></td>
                <td><?= $coach->getNom(); ?></td>
                <td><?= $coach->getPrenom(); ?></td>
                <td><?= $coach->getSexe(); ?></td>
                <td><?= $coach->getAge(); ?></td>
                <td><?= $coach->getSpecialite(); ?></td>
                <td><a href="index.php?action=showCoach&login=<?= $coach->getLogin(); ?>">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php include('template/footer.php'); ?>
