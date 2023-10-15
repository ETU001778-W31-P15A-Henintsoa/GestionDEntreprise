<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation Contrat Essai</title>
</head>
<body>
    <div>
        <h2>Creer Un Contrat d'essaie</h2>
        <form action="<?php echo site_url('welcome/formulaireContratEssai'); ?>" method="post">
            <div><input type="hidden" name="idemploye" value="<?php echo $idemploye; ?>"></div>
            <div><input type="date" name="datedebut"></div>
            <div><input type="date" name="datefin"></div>
            <div><input type="number" name="salaire" placeholder="Salaire"></div>
            <div><select name="idbranchedepartement" id="">
                <option>Poste</option>
                <?php for ($i=0; $i <count($poste); $i++) { ?>
                    <option value="<?php echo $poste[$i]->idbranchedepartement; ?>"><?php echo $poste[$i]->branche; ?></option>
                <?php } ?>
            </select></div>
            <div>
            <?php for ($i=0; $i <count($service); $i++) { ?>
                <input type="checkbox" name="<?php echo $service[$i]->idservice; ?>" ><label for=""><?php echo $service[$i]->libelle; ?></label>
            <?php } ?>
            </div>
            <div><input type="submit" value="OK"></div>
        </form>
    </div>
</body>
</html>