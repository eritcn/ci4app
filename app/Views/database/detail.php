<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"> <b>Detail Sparepart</b> </h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/img/<?= $database['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h5 class="card-title"><b><?= $database['slug']; ?></b></h5>
        <p class="card-text"><b>Detail Sparepart : </b> <?= $database['jenis_pekerjaan']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Jenis Sparepart : </b> <?= $database['tanggal']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Jumlah : </b> <?= $database['status']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Tanggal : </b> <?= $database['date']; ?></p>

       <?php if (in_groups('admin')) : ?>

        <a href="" class="btn btn-primary btn-sm">Edit</a>
        <a href="" class="btn btn-danger btn-sm">Delete</a>
         <br><br>
         
        <?php endif; ?>
      
        <a href="/database"><< back to data sparepart </a>  
      </div>
       <p class="card-title ml-3 mt-4 text-gray-500"><small>Terakhir di update :  <?= $database['created_at']; ?> </small></p>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>