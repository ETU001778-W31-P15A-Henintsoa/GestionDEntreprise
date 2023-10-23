
<style>
  #choix{
    width:900px;
       margin-left:300px;
       margin-right:auto;
  }
</style>
<div class="content-wrapper" id="choix">
<div class="container-xxl flex-grow-1 container-p-y" class="choix">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fiche de</span> Conge</h4>
             <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Choix d'Employe</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                        <?php if(isset($erreur)){
                            echo "<p style=color:red;>".$erreur."</p>";
                        }?>
                      <form action="<?php  echo site_url("salairecontroller/prime"); ?>" method="post">
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Employes</label>
                            <?php //echo count($employe); ?>
                            <select id="defaultSelect" class="form-select" name="idemploye">
                            <!-- <option>Choisir</option> -->
                            <?php for ($i=0; $i < count($employe); $i++) { ?>
                                <option value="<?php echo $employe[$i]-> idemploye; ?>"><?php echo $employe[$i]->nom; ?> <?php echo $employe[$i]->prenom; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Voir</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>