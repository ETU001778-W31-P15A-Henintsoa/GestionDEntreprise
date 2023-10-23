
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contrat d'</span> Essaie</h4>
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?php echo $contrat[0]->datedebut; ?></span> <?php echo $contrat[0]->datefin; ?></h4></strong>

        <!-- Details Employe -->
        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Informations Personnels</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <p for=""><strong>Nom : </strong> <?php echo $employer[0]->nom; ?></p>
                      <p for=""><strong>Prenoms : </strong><?php echo $employer[0]->prenom; ?></p>
                      <p for=""><strong>Date de naissance : </strong><?php echo $employer[0]->datenaissance; ?></p>
                      <p for=""><strong>Adresse :</strong> <?php echo $employer[0]->adresse; ?></p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Contacts</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <p for=""><strong>Email :</strong> <?php echo $employer[0]->mail; ?></p>
                      <p for=""><strong>Numero de Telephone : </strong><?php echo $employer[0]->numero; ?></p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">L'Entreprise</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <p for=""><strong>Nom de l'Entreprise :</strong> <?php echo $entreprise[0]->nom; ?></p>
                      <p for=""><strong>Numero : </strong><?php echo $entreprise[0]->numero; ?></p>
                      <p for=""><strong>Fax : </strong><?php echo $entreprise[0]->fax; ?></p>
                      <p for=""><strong>Adresse : </strong><?php echo $entreprise[0]->adresse; ?></p>
                      <p for=""><strong>Localisation : </strong><?php echo $entreprise[0]->localisation; ?> <?php echo $entreprise[0]->nomville ; ?></p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Informations Profesionnels</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                    <?php //var_dump($entreprise); ?>
                      <p for=""><strong>Matricule :</strong> <?php echo $employer[0]->matricule; ?></p>
                      <p for=""><strong>Departement:</strong> <?php echo $employer[0]->departement; ?></p>
                      <p for=""><strong>Fonction : </strong><?php echo $employer[0]->branche; ?></p>
                      <p for=""><strong>Salaire Brute : </strong><?php echo $contrat[0]->salairebrut; ?> Ar</p>
                      <p for=""><strong>Salaire Net : </strong><?php echo $contrat[0]->salairenet; ?> Ar</p>
                      <p for=""><strong>Mission : </strong><?php echo $employer[0]->mission; ?></p>
                      <!-- <p for=""><strong>Obligation : </strong><?php // secho $employer[0]->obligation; ?></p> -->
                      <p for=""><strong>Description du Poste : </strong></p>
                      <p><?php echo $employer[0]->descriptionpost; ?></p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Avantages en nature</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <ul>
                        <?php for ($i=0; $i < count($avantageNature); $i++) {  ?>
                            <li><?php echo $avantageNature[$i]->libelle ?></li>
                        <?php } ?>
                      </ul>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Services Nationaux</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <ul>
                        <?php for ($i=0; $i < count($services); $i++) {  ?>
                            <li><?php echo $services[$i]->libelle ?></li>
                        <?php } ?>
                      </ul>
                   </div>
                  </div>
                </div>
        </div>


    </div>
    </div>