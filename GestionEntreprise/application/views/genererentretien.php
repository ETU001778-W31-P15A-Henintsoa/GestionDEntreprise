<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genere des entretiens </title>
</head>
<body>
    <center>
        <form action="<?php echo site_url("listeController/genererlisteentretien"); ?>" method="post">
            <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Générer les entretiens</h5>
                        <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Liste des Annonces</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="idannonce">
                                <?php 
                                    for($i=0;$i<count($annonce);$i++){ ?>
                                        <option value="<?php echo $annonce[$i]->idannonce ?>"><?php echo "Annonce pour ".$annonce[$i]->branche." le ".$annonce[$i]->dateinsertion  ?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-12 col-form-label">Date de Début d'entretien</label>
                            <div class="col-md-12">
                            <input class="form-control" type="date"  id="html5-date-input" name="datedebutentretien"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-12 col-form-label">Durée de l'entretien</label>
                            <div class="col-md-12">
                            <input class="form-control" type="number" value="15" id="html5-number-input" name="duree"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Générer</button>
                        </div>
                        </div>
                    </div>
                    </div>
        </form>
    </center>
</body>->
</html>
