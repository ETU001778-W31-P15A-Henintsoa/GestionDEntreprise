<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Criteres </title>
</head>
<body>
    <div>
        <h3>Formulaire Criteres du Departement de <?php echo $departement[0]->nomdepartement; ?></h3>
        <form action="" method=""> 
            <div>
            <?php
            for($i=0; $i<count($branchebesoin); $i++){ ?>
            <h4> Pour le <?php echo $branchebesoin[$i]->branche; ?> </h4>
            <div><select name="<?php echo "D"+$branchebesoin[$i]->idbranchedepartement;?>" id="">
                <option value="">Diplome</option>
            </select></div>
            <div><select name="<?php echo "S"+$branchebesoin[$i]->idbranchedepartement;?>" id="">
                <option value="">Sexe</option>
                <option value="0">Homme</option>
                <option value="1">Femme</option>
            </select></div>
            <div><select name="<?php echo "N"+$branchebesoin[$i]->idbranchedepartement; ?>" id="">
                <option value="">Nationnalite</option>
            </select></div>
            <div><select name="<?php echo "E"+$branchebesoin[$i]->idbranchedepartement; ?>" id="">
                <option value="">Experience</option>
            </select></div>
            <div><input type="number" placeholder="Pourcentage"></div>
            <?php } ?>
            </br>
            <div><input type="submit" value="OK"></div>

            </div>
        </form>
    </div>
    
</body>
</html>