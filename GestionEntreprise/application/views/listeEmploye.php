
<style>
    #listeEmp{
        width:75%;
       margin-left:300px;
       margin-right:auto;
    }
</style>
    <div class="card" id="listeEmp">
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
            </div>
          </nav>
                <h5 class="card-header">Liste des employes</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>Nom </th>
                        <th>Prenom </th>
                        <th>Adresse</th>
                        <th>Jour de retraite</th>
                        <th>Departement et branche</th>
                        <th> Fiche de poste </th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php 
                            for($i=0;$i<count($employe);$i++){ ?>
                                 <tr>
                                    <td><?php echo $employe[$i]['employe']->nom; ?></td>
                                    <td><?php echo $employe[$i]['employe']->prenom; ?></td>
                                    <td><?php echo $employe[$i]['employe']->adresse; ?></td>
                                    <td><?php echo $employe[$i]['dateRetraite']->format("Y-m-d"); ?></td>
                                    <td><?php echo $employe[$i]['employe']->departement ." ". $employe[$i]['employe']->branche; ?></td>
                                    <td><?php echo $employe[$i]['messageRetraite']; ?></td>
                                    <td><a href="<?php echo site_url('listeController/versFichePoste?idemploye=' . $employe[$i]['employe']->idemploye) ?>">voir</a></td>
                                </tr>
                            <?php }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
