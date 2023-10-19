

<div class="container-xxl flex-grow-1 container-p-y" style="margin-left:25%">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Demande conge</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Matricule</label>
                          <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" /> -->
                            <select name="iddemande" id="basic-default-phone" class="form-control phone-mask">
                                  <option>matricule</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Type</label>
                          <div class="col-sm-10">
                            <select name="typeconge" id="basic-default-phone" class="form-control phone-mask">
                                  <option>typeConge</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-email">Debut</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                    type="date"
                                  id="basic-default-phone"
                                  class="form-control phone-mask"
                                  name="debut"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Fin</label>
                          <div class="col-sm-10">
                            <input
                                    type="date"
                                  id="basic-default-phone"
                                  class="form-control phone-mask"
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
