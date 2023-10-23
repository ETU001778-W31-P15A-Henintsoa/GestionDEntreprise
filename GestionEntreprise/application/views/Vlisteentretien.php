<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card">
                <h5 class="card-header">Liste des Entretiens</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>Nom Du Candidat</th>
                        <th>Prenom </th>
                        <th>Date de l'entretien</th>
                        <th>Heure de l'entretien</th>
                        <th>Fin de l'entretien</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php 
                            for($i=0;$i<count($entretien);$i++){ ?>
                                 <tr>
                                    <td><?php echo $entretien[$i]['candidat']->nom; ?></td>
                                    <td><?php echo $entretien[$i]['candidat']->prenom; ?></td>
                                    <td><?php echo $entretien[$i]['date']->format("Y-m-d"); ?></td>
                                    <td><?php echo $entretien[$i]['heureDebut']; ?></td>
                                    <td><?php echo $entretien[$i]['heureFin']; ?></td>
                                </tr>
                            <?php }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div>
</body>
</html>