<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Employer</title>
</head>
<body>
    <div>
        <h2>Liste des Employes en cours d'Essaie</h2>
        <?php 
        if(count($employes)==0){
            echo "<label style='color: grey;'>Aucun employe(s) en cours d'essai</label>";
        }else{
            echo "<ul>";
            for ($i=0; $i < 5; $i++) { ?>
                <li>
                    <a href="">hahahaha</a>
                </li>
        <?php } 
         echo " </ul>";
        } ?>
    </div>
</body>
</html>