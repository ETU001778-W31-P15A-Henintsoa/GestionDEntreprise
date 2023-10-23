<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Creation </span> Contrat d'Essai</h4>
       
    <!-- Basic Layout -->
    <div class="row">
    <div class="col-xl">
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Formulaire de creation de Contrat d'Essai</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
    </div>
    <div class="card-body">

    <form action="<?php echo site_url('welcome/formulaireContratEssai'); ?>" method="post">
            <div><input type="hidden" name="idemploye" value="<?php echo $idemploye; ?>"></div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company">Debut du Contrat</label>
                    <!-- <div class="col-md-12"> -->
                    <input
                        class="form-control"
                        type="date"
                        id="html5-datetime-local-input"
                        name="datedebut"
                    />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company">Fin du Contrat</label>
                    <!-- <div class="col-md-12"> -->
                    <input
                        class="form-control"
                        type="date"
                        id="html5-datetime-local-input"
                        name="datefin"
                    />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Salaire</label>
                <input type="number" class="form-control" id="basic-default-fullname" name="salaire" placeholder="Salaire" />
            </div>
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Poste</label>
                <select id="defaultSelect" class="form-select" name="idbranchedepartement">
                    <option>Poste</option>
                <?php for ($i=0; $i <count($poste); $i++) { ?>
                    <option value="<?php echo $poste[$i]->idbranchedepartement; ?>"><?php echo $poste[$i]->branche; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Services</label>
                <?php for ($i=0; $i <count($service); $i++) { ?>
                    <p><input type="checkbox" name="<?php echo $service[$i]->idservice; ?>" ><label for="" style="color:black;"><?php echo $service[$i]->libelle; ?></label></p>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Soumetre</button>
        </form>
</div>
</div>
</body>
</html>