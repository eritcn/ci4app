<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Rincian Pekerjaan Instrumentation</b></h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/img/<?= $gsjob['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h6 class="card-title"> <b></b> <b> <?= $gsjob['slug']; ?> </b></h6>
        <p class="card-text"><b>Keterangan - </b> <?= $gsjob['jenis_pekerjaan']; ?> </p>
        <p class="card-title"><b>Tanggal - </b> <?= $gsjob['tanggal']; ?></p>
        
         <p class="card-title"><b>Status - </b> <?= $gsjob['status']; ?></p>

       <?php if (in_groups('admin')) : ?>

        <a href="" class="btn btn-primary btn-sm">Ubah</a>
        <a href="" class="btn btn-danger btn-sm">Hapus</a>
         <br><br>
         
        <?php endif; ?>
      
        <a href="/gsjob" ><small class="back text"><b><<</b> balik ke halaman list job inst </small></a>
      </div>
       <p class="card-title ml-3 mt-5 text-gray-500"><small>Terakhir di update :  <?= $gsjob['created_at']; ?> </small></p>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>