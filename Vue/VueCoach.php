
<?php include('template/header.php'); ?>

<h2>Détails du Coach</h2>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Spécialité</th>
        <th>Email</th>
        <th>Téléphone</th>
    </tr>
    <tr>
        <?php if(isset($_GET['login'])) : ?>
            
            <td><?= $coachDetails->getId(); ?></td>
            <td><?= $coachDetails->getNom(); ?></td>
            <td><?= $coachDetails->getPrenom(); ?></td>
            <td><?= $coachDetails->getSpecialite(); ?></td>
            <td><?= $coachDetails->getEmail(); ?></td>
            <td><?= $coachDetails->getTelephone(); ?></td>
       
        <?php endif; ?>
    </tr>
</table>

<?php //include('template/footer.php'); ?>

