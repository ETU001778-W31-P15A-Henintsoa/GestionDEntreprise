<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Criteres </title>
</head>
<body>
    <div>
        <h3>Formulaire Criteres du Departement de <?php echo $departement[0]->nomdepartement; ?></h3>
        <form action=<?php echo site_url("welcome/formulaireCriteres"); ?> method="POST"> 
            <div>
            <input type="hidden" name="iddepartement" value="<?php echo $departement[0]->iddepartement; ?>">
            <?php
            for($i=0; $i<count($branchebesoin); $i++){ ?>
            <h4> Pour le <?php echo $branchebesoin[$i]->branche; ?> </h4>

            <input type="hidden" name="<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" value="<?php echo $branchebesoin[$i]->idbranchedepartement; ?>">

            <div>
                <select name= "D<?php echo $branchebesoin[$i]->idbranchedepartement;?>" id="">
                    <option value="">Diplome</option>
                    <?php 
                    for ($a=0; $a<count($diplome); $a++){ ?>
                    <option value="<?php echo $diplome[$a]->iddiplome; ?>"><?php echo $diplome[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number" name="COD<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="S<?php echo $branchebesoin[$i]->idbranchedepartement;?>" id="">
                    <option value="">Sexe</option>
                    <option value="0">Homme</option>
                    <option value="1">Femme</option>
                </select>
                <input type="number" name="COS<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="M<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Situation Matrimoniale</option>
                    <?php
                    for ($a=0; $a<count($situation); $a++){ ?>
                        <option value="<?php echo $situation[$a]->idsituation; ?>"><?php echo $situation[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number" name="COM<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="N<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Nationnalite</option>
                    <?php
                    for ($a=0; $a<count($nationnalite); $a++){ ?>
                        <option value="<?php echo $nationnalite[$a]->idnationnalite; ?>"><?php echo $nationnalite[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number" name="CON<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="F<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Filiere</option>
                    <?php
                    for ($a=0; $a<count($filiere); $a++){ ?>
                        <option value="<?php echo $filiere[$a]->idfiliere; ?>"><?php echo $filiere[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number" name="COF<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="E<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Experience</option>
                    <?php 
                    for ($a=0; $a<count($experience); $a++){ ?>
                        <option value="<?php echo $experience[$a]->idexperience;?>"><?php echo $experience[$a]->anneeexperience; ?> </option>
                    <?php } ?>
                </select>
                <input type="number" name="COE<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="AD<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Age Debut</option>
                    <?php 
                    for ($a=1; $a<100; $a++){ ?>
                        <option value="<?php echo $a;?>" ><?php echo $a; ?> </option>
                    <?php } ?>
                </select>
                <select name="AF<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Age Fin</option>
                    <?php 
                    for ($a=1; $a<100; $a++){ ?>
                        <option value="<?php echo $a;?>" ><?php echo $a; ?> </option>
                    <?php } ?>
                </select>
                <input type="number" name="COA<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <input type="number" placeholder="Pourcentage" name="pourcentage">
            </div>
            <?php } ?>
            </br>
            <div><input type="submit" value="OK"></div>

            </div>
        </form>
    </div>
    
</body>
</html>



