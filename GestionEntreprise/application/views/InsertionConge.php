

            <div class="container-xxl flex-grow-1 container-p-y" style="margin-left:25%">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Insertion conge</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form action="<?php echo site_url("listeController/insertionConge/") ?>" method="post">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Demande</label>
                          <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" /> -->
                            <select name="iddemande" id="basic-default-phone" class="form-control phone-mask">
                                  <option>iddemande</option>
                                  <?php foreach($demande as $demandes) { ?>
                                  <option value="<?php echo $demandes['iddemandeconge'] ?>"><?php echo $demandes['iddemandeconge']; ?></option>
                                  <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Type</label>
                          <div class="col-sm-10">
                            <select name="typeconge" id="basic-default-phone" class="form-control phone-mask">
                                  <option>typeConge</option>
                                  <?php foreach($typeConge as $typeConges) { ?>
                                  <option value="<?php echo $typeConges['idtypeconge'] ?>"><?php echo $typeConges['libelle']; ?></option>
                                  <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date debut</label>
                        <div class="col-md-10">
                          <input
                            class="form-control"
                            type="datetime-local"
                            value="2021-06-18T12:30:00"
                            id="html5-datetime-local-input"
                            name="debut"
                          />
                        </div>
                      </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Date Fin</label>
                          <div class="col-md-10">
                            <input
                              class="form-control"
                              type="datetime-local"
                              value="2021-06-18T12:30:00"
                              id="html5-datetime-local-input"
                              name="fin"
                            />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
