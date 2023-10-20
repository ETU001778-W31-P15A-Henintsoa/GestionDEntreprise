<head>
    <title>Liste Conge</title>
</head>


        <?php if($_SESSION['RH']==21){ ?>

            <!-- Demande de Conger Valide -->
            
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste des</span> Conges</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Demandes de Conges Valides</h5>
                <div class="text-nowrap">
                  <table class="table">
                    <!-- <thead> -->
                      <tr>
                        <th><strong>Nom et Prenoms</strong></th>
                        <th><strong>Date de Debut</strong></th>
                        <th><strong>Date de Fin</strong></th>
                        <th><strong>Etat</strong></th>
                        <th><strong></strong></th>
                      </tr>
                    <!-- </thead> -->
                    <tbody class="table-border-bottom-0">
                        <?php for($i=0; $i<count($demandeemployevalider); $i++){ ?>
                      <tr>
                        <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i>  -->
                        <?php echo $demandeemployevalider[$i]->nom; ?> <?php echo $demandeemployevalider[$i]->prenom; ?></td>
                        <td><?php echo $demandeemployevalider[$i]->datedebut; ?></td>
                        <td><?php echo $demandeemployevalider[$i]->datefin; ?></td>
                        <td><span class="badge bg-label-success me-1">Valide</span></td>
                        <td>
                            <!-- <a href="<?php echo site_url("welcome/validationDemandeRH"); ?>">
                                <i class="bx bx-check" style="color:green;">
                                </i>
                            </a> -->
                          <!-- <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div> -->
                          <!-- </div> -->
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              
            <!-- Demande de Conger Valide -->
            
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Demandes de conge Non Valides</h5>
                <div class="text-nowrap">
                  <table class="table">
                    <!-- <thead> -->
                      <tr>
                        <th><strong>Nom et Prenoms</strong></th>
                        <th><strong>Date de Debut</strong></th>
                        <th><strong>Date de Fin</strong></th>
                        <th><strong>Etat</strong></th>
                        <th><strong></strong></th>
                      </tr>
                    <!-- </thead> -->
                    <tbody class="table-border-bottom-0">
                        <?php for($i=0; $i<count($demandeemployenonvalider); $i++){ ?>
                      <tr>
                        <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i>  -->
                        <?php echo $demandeemployenonvalider[$i]->nom; ?> <?php echo $demandeemployenonvalider[$i]->prenom; ?></td>
                        <td><?php echo $demandeemployenonvalider[$i]->datedebut; ?></td>
                        <td><?php echo $demandeemployenonvalider[$i]->datefin; ?></td>
                        <td><span class="badge bg-label-warning me-1">Non Valide</span></td>
                        <td>
                            <a href="<?php echo site_url("welcome/validationDemandeRH?iddemande=".$demandeemployenonvalider[$i]->iddemandeconge); ?>">
                                <i class="bx bx-check" style="color:green;">
                                </i>
                            </a>
                          <!-- <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div> -->
                          <!-- </div> -->
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
        
        
        <?php }else{ ?>
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste de mes</span> Conges</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Mes Demandes de Conges</h5>
                <div class="text-nowrap">
                  <table class="table">
                    <!-- <thead> -->
                      <tr>
                        <th><strong>Date de Debut</strong></th>
                        <th><strong>Date de Fin</strong></th>
                        <th><strong>Etat</strong></th>
                      </tr>
                    <!-- </thead> -->
                    <tbody class="table-border-bottom-0">
                        <?php for($i=0; $i<count($demande); $i++){ ?>
                      <tr>
                        <td><?php echo $demande[$i]->datedebut; ?></td>
                        <td><?php echo $demande[$i]->datefin; ?></td>
                        <td>
                        <?php if($demande[$i]->datefin == 21){ ?>   
                            <span class="badge bg-label-success me-1">Valide</span></td>
                        <?php }else if($demande[$i]->datefin == 11){ ?>
                            <span class="badge bg-label-info me-1">Valide DG</span></td>
                        <?php }else{ ?>
                            <span class="badge bg-label-warning me-1">Attente de Validation</span></td>
                        <?php } ?>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste de mes</span> Conges</h4> -->

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Mes Conges</h5>
                <div class="text-nowrap">
                  <table class="table">
                    <!-- <thead> -->
                      <tr>
                        <th></th>
                        <th><strong>Date de Debut</strong></th>
                        <th><strong>Date de Fin</strong></th>
                        <!-- <th><strong>Etat</strong></th> -->
                        <!-- <th><strong></strong></th> -->
                      </tr>
                    <!-- </thead> -->
                    <tbody class="table-border-bottom-0">
                        <?php for($i=0; $i<count($conge); $i++){ ?>
                      <tr>
                        <td><?php echo $conge[$i]->datedebut; ?></td>
                        <td><?php echo $conge[$i]->datefin; ?></td>
                        <!-- <td><span class="badge bg-label-success me-1">Valide</span></td> -->
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              
            <?php }