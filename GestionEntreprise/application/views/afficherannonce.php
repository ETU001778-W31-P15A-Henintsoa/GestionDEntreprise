<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les annonces</title>
</head>
<body>
    <h1>Listes des annonces</h1>
    <table border="1px">
        <tr>
            <td>Departement</td>
            <td>Branche</td>
            <td>Date Fin Depot</td>
            <td></td>
        </tr>
        <?php 
            foreach($annonces as $annonce){ ?>
                <tr>
                    <td><?php echo $annonce->departement ?></td>
                    <td><?php echo $annonce->branche ?></td>
                    <td><?php echo $annonce->datefindepot ?></td>
                    <td><a href="<?php echo site_url('Candidat/FormulaireCV/' . $annonce->idannonce);  ?>">Postuler</a></td>
                </tr>
          <?php }
        ?>
    </table>
</body>
</html>