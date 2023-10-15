<div class="layout-page">
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row" >
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Envoyer vos cv ici</h5>
                    </div>
                    <div class="card-body">
                      <form action="<?php echo site_url("Candidat/traitementForm"); ?>" id="multistep-form" enctype="multipart/form-data" method="post">
                        <div id="step1">
                          <div><input type="text" name="idannonce" value="<?php echo $idannonce; ?>" hidden></div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="nom " name="nom"/>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="basic-default-company"
                                  placeholder="prenom"
                                  name="prenom"
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                  <input
                                    type="text"
                                    id="basic-default-email"
                                    class="form-control"
                                    placeholder="Email"
                                    aria-label="john.doe"
                                    aria-describedby="basic-default-email2"
                                    name="email"
                                  />
                                  <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="basic-default-company"
                                  placeholder="Adreese"
                                  name="adresse"
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                                  <label for="formFile" class="form-label">Date de naissance</label>
                              <div class="col-sm-10">
                              <input
                                  type="date"
                                  id="basic-default-phone"
                                  class="form-control phone-mask"
                                  name="dtn"
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input
                                  type="text"
                                  id="basic-default-phone"
                                  class="form-control phone-mask"
                                  placeholder="telephone ex:+236 033 00 000 00"
                                  aria-label="+236 033 00 000 00"
                                  aria-describedby="basic-default-phone"
                                  name="phone"
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="nationnalite" id="basic-default-phone" class="form-control phone-mask">
                                  <option>Nationnalite</option>
                                  <?php foreach($nationnalite as $nationnalites) { ?>
                                  <option value="<?php echo $nationnalites['idnationnalite'] ?>"><?php echo $nationnalites['libelle']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="sexe" id="basic-default-phone" class="form-control phone-mask">
                                  <option>Sexe</option>
                                  <option value="1">homme</option>
                                  <option value="0">femme</option>
                                </select>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="ville" id="basic-default-phone" class="form-control phone-mask">
                                  <option> Ville</option>
                                  <?php foreach($ville as $villes) { ?>
                                  <option value="<?php echo $villes['idville'] ?>"><?php echo $villes['ville']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="situation" id="basic-default-phone" class="form-control phone-mask">
                                  <option> Situation matrimoniale</option>
                                  <?php foreach($situation as $situations) { ?>
                                  <option value="<?php echo $situations['idsituation'] ?>"><?php echo $situations['libelle']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="filiere" id="basic-default-phone" class="form-control phone-mask">
                                  <option>Filiere</option>
                                  <?php foreach($filiere as $filieres) { ?>
                                  <option value="<?php echo $filieres['idfiliere'] ?>"><?php echo $filieres['libelle']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="formFile" class="form-label">Photo d'identite</label>
                              <div class="col-sm-10">
                              <input class="form-control" type="file" id="formFile" name="image" />
                            </div>
                            </div>
                        
                        </div>
                        <div id="step2" style="display: none;">
                            <div class="form-check mt-3">
                              <label for="formFile" class="form-label">Langue</label>
                                <?php foreach($langue as $langues) { ?><p>
                                    <input class="form-check-input" type="checkbox" value="<?php echo $langues['idlangue']; ?>" id="defaultCheck1" name="langue[]" />
                                    <label class="form-check-label" for="defaultCheck1"><?php echo $langues['libelle']; ?> </label></p>
                                <?php } ?>
                            </div>
                            
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="diplome" id="basic-default-phone" class="form-control phone-mask">
                                  <option>Diplome</option>
                                  <?php foreach($diplome as $diplomes) { ?>
                                  <option value="<?php echo $diplomes['iddiplome']; ?>"><?php echo $diplomes['libelle']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="formFile" class="form-label">diplome</label>
                              <div class="col-sm-10">
                              <input class="form-control" type="file" id="formFile" name="certificat" />
                              </div>
                            </div>
                            <div class="row mb-3">
                            <label for="formFile" class="form-label">Date d'obtension du Diplome:</label>
                              <div class="col-sm-10">
                              <input
                                  type="date"
                                  id="basic-default-phone"
                                  class="form-control phone-mask"
                                  name="date"
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <select name="experience" id="basic-default-phone" class="form-control phone-mask">
                                  <option> Experience</option>
                                  <?php foreach($experience as $experiences) { ?>
                                    <option value="<?php echo $experiences['idexperience'] ?>"><?php echo $experiences['anneeexperience']; ?>an(s) d'experience</option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class=" row mb-3">
                              <label for="formFile" class="form-label">Attestation d'emploi</label>
                              <div class="col-sm-10">
                              <input class="form-control" type="file" id="formFile" name="attestation" />
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="formFile" class="form-label">Certifiact de travail</label>
                              <div class="col-sm-10">
                              <input class="form-control" type="file" id="formFile" name="certificat" />
                              </div>
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="button" id="prevBtn" onclick="prevStep()" class="btn btn-primary">Précédent</button>
                            <button type="button" id="nextBtn" onclick="nextStep()" class="btn btn-primary">Suivant</button>
                            <input type="submit" class="btn btn-primary" id="submitBtn" value="Envoyer" style="display: none;">
                          </div>
                        </div>
                      </form>

                      <script>
                            let currentStep = 1;
                            const form = document.getElementById("multistep-form");
                            const prevBtn = document.getElementById("prevBtn");
                            const nextBtn = document.getElementById("nextBtn");
                            const submitBtn = document.getElementById("submitBtn");

                            function showStep(step) {
                              const steps = document.querySelectorAll('[id^="step"]');
                              steps.forEach(s => s.style.display = "none");
                              document.getElementById(`step${step}`).style.display = "block";

                              if (step === 1) {
                                prevBtn.style.display = "none";
                              } else {
                                prevBtn.style.display = "inline-block";
                              }

                              if (step === steps.length) {
                                nextBtn.style.display = "none";
                                submitBtn.style.display = "inline-block";
                              } else {
                                nextBtn.style.display = "inline-block";
                                submitBtn.style.display = "none";
                              }
                            }

                            function nextStep() {
                              if (currentStep < 4) {
                                currentStep++;
                                showStep(currentStep);
                              }
                            }

                            function prevStep() {
                              if (currentStep > 1) {
                                currentStep--;
                                showStep(currentStep);
                              }
                            }

                            // Appeler showStep pour afficher l'étape actuelle lors du chargement de la page
                            showStep(currentStep);
                      </script>
                    </div>
                  </div>
                </div>
              </div>
                        </div>
                        </div>
                        </div>
