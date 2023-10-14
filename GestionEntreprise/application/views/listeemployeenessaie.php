<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste EmpEss</title>
</head>
<body>
    <div>
        <h2>Liste des employes en essaie</h2>
            <ul>
            <?php for ($i=0; $i <count($employe); $i++) { ?> 
                <li><a href="<?php echo site_url("welcome/versContratEssaie?idemploye=".$employe[$i]->idemploye); ?>"><?php echo $employe[$i]->nom; ?><?php echo " ".$employe[$i]->prenom; ?></a></li>
            <?php } ?>  
            </ul>
    </div>    
</body>
</html>