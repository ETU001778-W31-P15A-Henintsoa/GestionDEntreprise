<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions/Reponses</title>
</head>
<body>

<?php  // var_dump($besoin); ?>
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Formulaire d'Insertion des</span> Primes</h4>
            <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Choix d'Employe</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                    <form action="<?php echo site_url("welcome/formulaireDemandeConge"); ?>" method="post">
  
                    <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Employe</label>
                            <select id="defaultSelect" class="form-select" name="idtypeconge">
                            <option>Choisir</option>
                            <?php for ($i=0; $i < count($employe); $i++) { ?>
                                <option value="<?php echo $employe[$i]->idemploye; ?>"><?php echo $employe[$i]->nom; ?> <?php echo $employe[$i]->prenom; ?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <?php for ($i=0; $i < count($prime); $i++) { ?>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1" onchange="plus('<?php echo $prime[$i]->idtypeprime; ?>')" />
                            <label class="form-check-label" for="defaultCheck1">     <?php echo $prime[$i]->libelle; ?> </label>
                            <div id="<?php echo $prime[$i]->idtypeprime; ?>">
                            </div>
                    </div>
                    <br>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary">Soumetre</button>
                    </form>
                    </div>
                  </div>
                </div>
            </div>

<script>
    function plus(idtypeprime) {
        var nouveau =  "<p><input class='form-control' type='number' value='Sneat' id= 'html5-text-input' name='"+idtypeprime+"Q' placeholder='Quantite'/></p>"+
                        "<p><input class='form-control' type='datetime-local' id='html5-datetime-local-input' name='"+idtypeprime+"D' /></p>";
        var conteneur = document.getElementById(idtypeprime);
        conteneur.innerHTML = nouveau;
    }
</script>
</html>