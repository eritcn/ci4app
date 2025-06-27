<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Detail Radio Rig </b></h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/img/<?= $rusak['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h6 class="card-title"> <b>TYPE - </b> <b> <?= $rusak['lokasi']; ?> </b></h6>
         <p class="card-title"><b>S/N - </b> <b> <?= $rusak['slug']; ?> </b></p>
        <p class="card-text"><b>Keterangan - </b> <?= $rusak['jenis_pekerjaan']; ?> [<b>Radio Stock Rusak</b>] </p>
        <p class="card-title"><b>Tanggal Update - </b> <?= $rusak['date']; ?></p>
        <p class="card-title"><b>Catatan - </b> <?= $rusak['status']; ?></p>

       <?php if (in_groups('admin')) : ?>

        <a href="" class="btn btn-primary btn-sm">Edit</a>
        <a href="" class="btn btn-danger btn-sm">Delete</a>
         <br><br>
         
        <?php endif; ?>
      
        <a href="/rusak" ><small class="back text"><< back to ready stock</small></a> 
      </div>
       <p class="card-title ml-3 mt-4 text-gray-500"><small>Terakhir di update :  <?= $rusak['created_at']; ?> </small></p>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>