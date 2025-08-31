<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-dark"><b> My Profile </b></h1>

                    <div class="row">
    <div class="col-lg-10">
        <div class="card mb-5" style="max-width: 940px;">
          <div class="row g-1">
            <div class="col-md-4">
              <img src="<?= base_url('/img/' . user()->user_image);?>" class="img-fluid rounded-start" alt="<?= user()->username; ?>">
           </div>
    <div class="col-md-8">
      <div class="card-body">
        <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <h4><?= user()->username;?></h4>
    </li>

    <?php if (user()->fullname) : ?>
    <li class="list-group-item"><?= user()->fullname;?></li>
    <?php endif; ?>

    <li class="list-group-item"><?= user()->email;?></li>

    <li class="list-group-item"><?= user()->biograph;?></li>
  
  </ul>
      </div>
    </div>
  </div>
</div>
                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>

