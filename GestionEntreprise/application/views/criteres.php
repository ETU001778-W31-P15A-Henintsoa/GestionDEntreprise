
     <!-- Content wrapper -->
     <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Les Besoins de L'</span> entreprise</h4>

                        <div>
                        <h3>Formulaire Criteres du Departement de <?php echo $departement[0]->nomdepartement; ?></h3>
                        <form action=<?php echo site_url("welcome/formulaireCriteres"); ?> method="POST"> 
            
                     <input type="hidden" name="iddepartement" value="<?php echo $departement[0]->iddepartement; ?>">
            <?php
            for($i=0; $i<count($branchebesoin); $i++){ ?>
                <div class="row">
                    <div class="col-xl">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><?php echo $branchebesoin[$i]->branche; ?> </h5>
                        <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <!-- /////////////////////////////////////////////// INPUT -->
                     <div class='mb-3'>
                        <input type="hidden" name="<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" value="<?php echo $branchebesoin[$i]->idbranchedepartement; ?>">
                     <div class="mb-3">
                     <label class="form-label" for="basic-default-fullname">Diplome</label>
                <select id="defaultSelect" class="form-select"  name= "D<?php echo $branchebesoin[$i]->idbranchedepartement;?>" id="">
                    <!-- <option value="">Diplome</option> -->
                    <?php 
                    for ($a=0; $a<count($diplome); $a++){ ?>
                    <option value="<?php echo $diplome[$a]->iddiplome; ?>"><?php echo $diplome[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="COD<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Sexe</label>
                <select id="defaultSelect" class="form-select" name="S<?php echo $branchebesoin[$i]->idbranchedepartement;?>" id="">
                    <option value="0">Homme</option>
                    <option value="1">Femme</option>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="COS<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Situation Matrimoniale</label>
                <select id="defaultSelect" class="form-select" name="M<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <!-- <option value=""></option> -->
                    <?php
                    for ($a=0; $a<count($situation); $a++){ ?>
                        <option value="<?php echo $situation[$a]->idsituation; ?>"><?php echo $situation[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="COM<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nationnalite</label>
                <select id="defaultSelect" class="form-select" name="N<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <!-- <option value=""></option> -->
                    <?php
                    for ($a=0; $a<count($nationnalite); $a++){ ?>
                        <option value="<?php echo $nationnalite[$a]->idnationnalite; ?>"><?php echo $nationnalite[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="CON<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Filiere</label>
                <select id="defaultSelect" class="form-select" name="F<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <!-- <option value=""></option> -->
                    <?php
                    for ($a=0; $a<count($filiere); $a++){ ?>
                        <option value="<?php echo $filiere[$a]->idfiliere; ?>"><?php echo $filiere[$a]->libelle;?></option>
                    <?php } ?>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="COF<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Experience</label>
                <select id="defaultSelect" class="form-select" name="E<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <!-- <option value=""></option> -->
                    <?php 
                    for ($a=0; $a<count($experience); $a++){ ?>
                        <option value="<?php echo $experience[$a]->idexperience;?>"><?php echo $experience[$a]->anneeexperience; ?> an(s)</option>
                    <?php } ?>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="COE<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Age</label>
                <select id="defaultSelect" class="form-select" name="AD<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Age Debut</option>
                    <?php 
                    for ($a=1; $a<100; $a++){ ?>
                        <option value="<?php echo $a;?>" ><?php echo $a; ?> </option>
                    <?php } ?>
                </select>
                <select id="defaultSelect" class="form-select" name="AF<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Age Fin</option>
                    <?php 
                    for ($a=1; $a<100; $a++){ ?>
                        <option value="<?php echo $a;?>" ><?php echo $a; ?> </option>
                    <?php } ?>
                </select>
                <input type="number"  class="form-control" id="basic-default-fullname" name="COA<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Pourcentage de note</label>
                <input type="number"  class="form-control" id="basic-default-fullname" placeholder="" name="pourcentage">
            </div>
            <?php } ?>
            </br>
            <button type="submit" class="btn btn-primary">Soumetre</button>
        </form>
    </div>
    
</body>
</html>



