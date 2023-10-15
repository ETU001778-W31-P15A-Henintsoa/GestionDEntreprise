<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mon Contrat Essai</title>
</head>
<body>
    <h2>Contrat D'Essai</h2>
    <div>
        <div><label for="">Matricule : <?php echo $employer[0]->idemploye; ?></label></div>
        <div><label for="">Nom : <?php echo $employer[0]->nom; ?></label></div>
        <div><label for="">Prenom : <?php echo $employer[0]->prenom; ?></label></div>
        <div><label for="">Adresse : <?php echo $employer[0]->adresse; ?></label></div>
        <div><label for="">Date de Naissance :</label></div>
        <div><label for="">Situation matrimoniale :</label></div>
    </div>
    
    <div>
        <div><label for="">Email : <?php echo $employer[0]->mail; ?></label></div>
        <div><label for="">Numero de Telephone : <?php echo $employer[0]->numero; ?></label></div>
    </div>

    <div>
        <div><label for="">Departement : </label></div>
        <div><label for="">Fonction : </label></div>
        <div><label for="">Obligation : </label></div>
        <div><label for="">Mission : </label></div>
        <div><label for="">Avantage en nature : </label>
    <ul>
        
    </ul></div>
        <div><label for="">Services Nationnale : </label></div>
        <div><label for="">Salaire Brute : </label></div>
        <div><label for="">Salaire Net : </label></div>
    </div>
</body>
</html>