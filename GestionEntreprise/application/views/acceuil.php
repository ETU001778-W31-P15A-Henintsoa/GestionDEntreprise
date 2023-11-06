<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Etat</span> Employe</h4>
       
    <!-- Basic Layout -->
    <div class="row">
    <div class="col-xl">
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Changement Etat Employe</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
    </div>
    <div class="card-body">

        <form action="<?php echo site_url('welcome/formulaireChangementEtatEmploye'); ?>" method="post">
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Salaire</label>
                <input type="text" class="form-control" id="basic-default-fullname" name="matricule" placeholder="Matricule" />
            </div>
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Etats</label>
                <p><input type="radio" name="etat" value="true"><label for="" style="color:black;">Embaucher</label></p>
                <p><input type="radio" name="etat" value="null"><label for="" style="color:black;">Fin Essaie</label></p>
            </div>
            <button type="submit" class="btn btn-primary">Soumetre</button>
        </form>
</div>
</div>
</body>
</html>