
<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <div class="layout-page">
                <h2 style="text-align:center">Listes des annonces</h2>
          <!-- <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          > -->
            <!-- <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div> -->
<!-- 
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
          </nav> -->
          
            <div class="col-md mb-4 mb-md-0" style="width:90%; margin-left:30px">
                  <?php foreach($annonces as $annonce) { ?>
                  <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item active">
                      <h2 class="accordion-header" id="headingOne">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionOne"
                          aria-expanded="true"
                          aria-controls="accordionOne"
                        >
                        <?php echo "Departement ".$annonce->departement ?>
                        </button>
                      </h2>

                      <div
                        id="accordionOne"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          <?php 
                             echo $annonce->texte;
                          ?>
                        <div>
                            <b>Date Fin de Depot</b>: <?php echo $annonce->datefindepot ;?>
                        </div>
                        </div>
                        <div><a class="badge bg-label-primary me-1" href="<?php echo site_url('Candidat/FormulaireCV/' . $annonce->idannonce) ?>" style="margin-left:90%;">Postuler</a></div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
            </div>

        </div>
      </div>
</div>

