<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y" style="width:100%" >
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Listes des Conges</h4>
<div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>idEmploye</th>
                        <th>Type</th>
                        <th>idDemande</th>
                        <th>dateDebut</th>
                        <th>dateFin</th>
                        <th>total prix</th>
                        <th>reste</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($conge as $conges) { ?>
                      <tr>
                        <td><strong><?php echo $conges['idemploye']; ?></strong></td>
                        <td><?php echo  $conges['idtypeconge']; ?></td>
                        <td><?php echo $conges['iddemandeconge']; ?></td>
                        <td><?php echo $conges['debutconge']; ?></td>
                        <td><?php echo $conges['finconge'];?></td>
                        <td><?php echo $conges['totalpris']; ?></td>
                        <td><?php echo $conges['resteconge']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
</div>
</div>