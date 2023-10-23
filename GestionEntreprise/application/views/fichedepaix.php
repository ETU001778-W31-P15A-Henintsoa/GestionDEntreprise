        <!-- Content wrapper -->
<style>
  .body{
   
  }
</style>
<div class="body">
<?php 
    //var_dump($donnee);
  ?>
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fiche de</span> Paie</h4>

        <!-- Logo -->
        <div class="card">
            <h5 class="card-header">Logo</h5>
                <div class="card-body">
                </div>
            <center>
              <h3>Fiche de Paie</h3>
            <h3>Arret au <?php
            date_default_timezone_set('Africa/Nairobi');
              //$date=new dateTime($donnee['date']->date);
              echo date("Y-m-d");
              ?> </h3>  
            </center>
        </div>

        <!-- Details Employe -->
        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <!-- <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div> -->
                    <div class="card-body">
                      <p for=""><strong>Nom : </strong> <?php echo $donnee['employe']->nom; ?></p>
                      <p for=""><strong>Prenoms : </strong><?php echo $donnee['employe']->prenom; ?></p>
                      <p for=""><strong>Matricule :</strong> 1234</p>
                      <p for=""><strong>Date Aumbauche :</strong> <?php echo $donnee['employe']->dateembauche; ?></p>
                      <p for=""><strong>Ancienete :</strong> <?php echo $donnee['employe']->anciennete; ?></p>
                   </div>
                  </div>
                </div>

                <div class="col-xl">
                <div class="card mb-4">
                    <!-- <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic with Icons</h5>
                      <small class="text-muted float-end">Merged input group</small>
                    </div> -->
                    <div class="card-body">
                      <p for=""><strong>Classification :</strong> Classification</p>
                      <p for=""><strong>Salaire de Base :</strong> <?php echo $donnee['salaire']['montant']; ?> AR</p>
                      <p for=""><strong>Taux Journaliers :</strong><?php echo $donnee['salaire']['jour']; ?>  Ar</p>
                      <p for=""><strong>Taux Horaires :</strong> <?php echo $donnee['salaire']['heure']; ?> </p>
                      <p for=""><strong>Indice :</strong> 17 660,00 Ar</p>
                    </div>
                  </div>
                </div>
                </div>
                
        <!-- Bordered Table -->
            <div class="card">
                <h5 class="card-header"></h5>
                <div class="card-body">
                  <div class="text-nowrap">
                    <table class="table table-bordered">
                      <!-- <thead> -->
                        <tr>
                          <th>Designation</th>
                          <th>Nombre</th>
                          <th>Taux</th>
                          <th>Montant</th>
                        </tr>
                      <!-- </thead> -->
                      <tbody>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Salaire du <?php echo $donnee['dateDebut']; ?> au <?php echo $donnee['dateFin']; ?>
                          </td>
                          <td>1 mois</td>
                          <td>136 114,00</td>
                          <td>4 083 409,09</td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Absences deuctibles
                          </td>
                          <td></td>
                          <td>136 114,00</td>
                          <td></td>
                        </tr> <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                           Primes de rendement
                          </td>
                          <td></td>
                          <td><?php echo $donnee['prime']['rendement']; ?></td>
                          <td><?php echo $donnee['prime']['rendement']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Primes d'anciennete
                          </td>
                          <td></td>
                          <td><?php echo $donnee['prime']['anciennete'] ?></td>
                          <td><?php echo $donnee['prime']['anciennete'] ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Heure Suplemenaires 
                          </td>
                          <td><?php echo $donnee['prime']['heureSup']['nombre']; ?></td>
                          <td><?php echo $donnee['prime']['heureSup']['taux']; ?></td>
                          <td><?php echo $donnee['prime']['heureSup']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                           Majoration pour heures de nuit
                          </td>
                          <td><?php echo $donnee['prime']['travailnuit']['nombre']; ?></td>
                          <td><?php echo $donnee['prime']['travailnuit']['taux']; ?></td>
                          <td><?php echo $donnee['prime']['travailnuit']['montant']; ?></td>
                        </tr><tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Primes diverses
                          </td>
                          <td><?php echo $donnee['prime']['travailnuit']['nombre']; ?></td>
                          <td><?php echo $donnee['prime']['travailnuit']['taux']; ?></td>
                          <td><?php echo $donnee['prime']['travailnuit']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Rappels sur periode anterieur
                          </td>
                          <td><?php echo $donnee['periodeanterieur']['nombre']; ?></td>
                          <td><?php echo $donnee['periodeanterieur']['taux']; ?></td>
                          <td><?php echo $donnee['periodeanterieur']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Droits de Conges
                          </td>
                          <td><?php echo $donnee['droitConge']['nombre']; ?></td>
                          <td><?php echo $donnee['droitConge']['taux']; ?></td>
                          <td><?php echo $donnee['droitConge']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Droit de preavis
                          </td>
                          <td><?php echo $donnee['preavis']['nombre']; ?></td>
                          <td><?php echo $donnee['preavis']['taux']; ?></td>
                          <td><?php echo $donnee['preavis']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Indemnite de licenciement
                          </td>
                          <td><?php echo $donnee['licenciement']['nombre']; ?></td>
                          <td><?php echo $donnee['licenciement']['taux']; ?></td>
                          <td><?php echo $donnee['licenciement']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                          </td>
                          <td></td>
                          <td><strong>Salaire Brute</strong></td>
                          <td><?php echo $donnee['salaire']['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Rendu Cnaps 1%
                          </td>
                          <td></td>
                          <td></td>
                          <td><?php echo $donnee['salaire']['cnaps']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Retenue Sanitaire
                          </td>
                          <td></td>
                          <td></td>
                          <td><?php echo $donnee['salaire']['sanitaire']; ?>9</td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Tranche IRSA INF <?php echo $donnee['irsa'][0]['fin']; ?>
                          </td>
                          <td></td>
                          <td>0%</td>
                          <td>0</td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Tranche IRSA <?php echo $donnee['irsa'][1]['debut']; ?> a <?php echo $donnee['irsa'][1]['fin']; ?>
                          </td>
                          <td></td>
                          <td><?php echo $donnee['irsa'][1]['pourcentage']; ?>%</td>
                          <td><?php echo $donnee['irsa'][1]['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Tranche IRSA <?php echo $donnee['irsa'][2]['debut']; ?> a <?php echo $donnee['irsa'][2]['fin']; ?>
                          </td>
                          <td></td>
                          <td><?php echo $donnee['irsa'][2]['pourcentage']; ?>%</td>
                          <td><?php echo $donnee['irsa'][2]['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Tranche IRSA <?php echo $donnee['irsa'][3]['debut']; ?> a <?php echo $donnee['irsa'][3]['fin']; ?>
                          </td>
                          <td></td>
                          <td><?php echo $donnee['irsa'][3]['pourcentage']; ?>%</td>
                          <td><?php echo $donnee['irsa'][3]['montant']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                            Tranche IRSA <?php echo $donnee['irsa'][4]['debut']; ?>
                          </td>
                          <td></td>
                          <td><?php echo $donnee['irsa'][4]['pourcentage']; ?>%</td>
                          <td><?php echo $donnee['irsa'][4]['montant']; ?></td>
                        </tr>   
                        <!-- <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr> -->
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                          </td>
                          <td><strong>TOTAL IRSA</strong></td>
                          <td></td>
                          <td><?php echo $donnee['irsa']['total']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                          </td>
                          <td></td>
                          <td><strong>Total des Retenues</strong></td>
                          <td><?php echo $donnee['totalRetenus']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                          </td>
                          <td></td>
                          <td><strong>Autres indemnités</strong></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>
                            <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong> -->
                          </td>
                          <td></td>
                          <td><strong>Net a Payer</strong></td>
                          <td><?php echo $donnee['aPaye']; ?></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

        <!-- Retenue -->
        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <!-- <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div> -->
                    <div class="card-body">
                      <p for=""><strong>Avantages en nature : </strong> </p>
                      <p for=""><strong>Reduction IRSA : </strong><?php echo $donnee['employe']->prenom; ?></p>
                      <p for=""><strong>Montant Imposale :</strong> <?php echo $donnee['salaire']['imposable']; ?></p>
                      
                     <p><strong>Mode de payment : </strong></strong><span style="color:blue;">Virement / Cheque</p></span>
                     <br>
                     <p>Arreter ma presente fiche a la somme de <b><?php echo $donnee['aPaye']; ?></b></p>
                     <!-- <p>L'Employeur L'Employe(e)</p> -->
                   </div>
                  </div>
                </div>
        </div>
        </div>

    </div>
    </div>
</div>
