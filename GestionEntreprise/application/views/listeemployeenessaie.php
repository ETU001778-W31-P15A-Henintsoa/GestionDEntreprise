        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contrat d'</span> Essaie</h4>
            
        <!-- Details Employe -->
        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Listes des Employes en Essai </h5>
                      </div>
                    <div class="card-body">
                    <div class="card">
                <div class="text-nowrap">
                    <?php // var_dump($employe); ?>
                  <table class="table">
                    <!-- <thead> -->
                      <tr>
                          <th><strong>Nom et Prenoms</strong></th>
                          <th><strong>Fonction</strong></th>
                          <th><strong>Departement</strong></th>
                          <th><strong>Etat</strong></th>
                        <th><strong></strong></th>
                      </tr>
                    <!-- </thead> -->
                    <tbody class="table-border-bottom-0">
                      <?php for ($i=0; $i <count($employe); $i++){ ?>
                      <tr>
                        <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i>  -->
                            <?php echo $employe[$i]->nom; ?><?php echo " ".$employe[$i]->prenom; ?>
                        </td>
                        <td><?php echo$employe[$i]->branche; ?></td>
                        <td><?php echo $employe[$i]->departement; ?></td>
                        <td><span class="badge bg-label-warning me-1">En Essaie</span></td>
                        <td>
                            <a href="<?php echo site_url('welcome/versContratEssaie?idemploye='.$employe[$i]->idemploye); ?>">
                                <i class="bx bxs-file-jpg" style="color:blue;">
                                </i>
                            </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div>    
