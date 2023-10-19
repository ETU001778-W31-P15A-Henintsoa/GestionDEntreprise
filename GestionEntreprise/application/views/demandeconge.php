<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Demande de</span> Conge</h4>

             <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Formulaire de demande de conge</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <form action="<?php echo site_url("welcome/formulaire"); ?>" method="post">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Matricule de l'Employe</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="matricule" placeholder="Matricule" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Type de Conge</label>
                          <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Date debut du Conge</label>
                            <!-- <div class="col-md-12"> -->
                            <input
                                class="form-control"
                                type="datetime-local"
                                id="html5-datetime-local-input"
                            />
                                <!-- </div> -->
                            <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Date fin du Conge</label>
                            <!-- <div class="col-md-12"> -->
                            <input
                                class="form-control"
                                type="datetime-local"
                                id="html5-datetime-local-input"
                            />
                                <!-- </div> -->
                            <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                        </div>
                        <button type="submit" class="btn btn-primary">Soumetre</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
</div>
</div>