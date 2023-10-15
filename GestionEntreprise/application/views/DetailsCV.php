
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100" style="margin-left : 250px">
<?php foreach($cv as $cvs) { ?>
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo site_url('../assets/img/' . $cvs['photo']); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $cvs['nom']." ".$cvs['prenom']; ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Personal Information</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> &nbsp; <?php echo $cvs['prenom']; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?php echo "(261+) ".$cvs['telephone']; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $cvs['email']; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Adresse:</strong> &nbsp; <?php echo $cvs['adresse']." ".$cvs['ville']; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date de naissance:</strong> &nbsp; <?php echo $cvs['datenaissance']; ?></li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Professionnal Information</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Diplome:</strong> &nbsp; <?php echo $cvs['diplome']." en ".$cvs['filiere']; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date d'obtension du diplome:</strong> &nbsp; <?php echo $cvs['datediplome']; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Experience:</strong> &nbsp; <?php echo $cvs['anneeexperience']. "ans d'experience(s)"; ?></li>
              </ul>
            </div>
          </div>
        </div>







        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">Projects</h6>
              <p class="text-sm">Architects design houses</p>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="<?php echo site_url('../assets/img/' . $cvs['diplomefile']); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      
                      <p class="mb-4 text-sm">
                        <?php echo "Diplome de ".$cvs['diplome']." en ".$cvs['filiere']; ?>
                      </p>

                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                  <?php if($cvs['attestation'] == null) { ?>
                    <div class="position-relative">
                    
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="<?php echo site_url('../assets/img/' . $cvs['certificat']); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                        
                      <p class="mb-4 text-sm"><h6>
                        Certificat de travail</h6>
                      </p>
                      </div>
                     <?php }else { ?>
                        <div class="position-relative">
                            
                            <a class="d-block shadow-xl border-radius-xl">
                            <img src="<?php echo site_url('../assets/img/' . $cvs['attestation']); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                        
                      <p class="mb-4 text-sm"><h6>
                        Attestation</h6>
                      </p>
                      </div>
                     <?php } ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
<?php } ?>
</div>
