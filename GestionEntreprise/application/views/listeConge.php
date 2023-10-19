<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y" style="width:100%" >
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Listes des Conges</h4>
<div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Employe</th>
                        <th>Nombre Conge</th>
                        <th>Type</th>
                        <th>idDemande</th>
                        <th>dateDebut</th>
                        <th>dateFin</th>
                        <th>reste</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($conge as $conges) { ?>
                      <tr>
                        <td><strong><?php echo $conges['idEmploye']; ?></strong></td>
                        <td><?php echo  $conges['nombreConge']; ?></td>
                        <td><?php echo $conges['type']; ?></td>
                        <td><?php echo $conges['idDemande']; ?></td>
                        <td><?php echo $conges['dateDebut']->format("y-m-d"); ?></td>
                        <td><?php echo $conges['dateFin']->format("y-m-d"); ?></td>
                        <td><?php echo $conges['reste']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
</div>
</div>