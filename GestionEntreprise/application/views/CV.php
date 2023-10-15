
<div class="wrapper">

  <div class="content-wrapper">
    <section class="content">
        <h2 style="margin-left:10px;">Listes CV</h2>
      <?php if($cv == null) { ?>
        <p> Aucun CV pour le moment! </p>
        <?php }else { ?>
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php foreach($cv as $cvs) { ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0 lead">
                    <?php echo $cvs['nom'];?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> <?php echo $cvs['prenom']; ?></b></h2>
                      <p class="text-muted text-sm"><b>Email: </b> <?php echo $cvs['email'];?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?php echo $cvs['adresse']; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : + 261 <?php echo $cvs['telephone']; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?php echo site_url('../assets/img/' . $cvs['photo']); ?>" alt="user-avatar" class="img-circle img-fluid" style="width:100%;height:70%;margin-top:20px">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <a href="<?php echo site_url('Candidat/detailsCV/') . $cvs['idcandidat']; ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <?php } ?>

    </section>
  </div>
</div>


