<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Detail Radio HT </b></h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/img/<?= $ht['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h6 class="card-title"> <b>TYPE - </b> <b> <?= $ht['lokasi']; ?> </b></h6>
         <p class="card-title"><b>S/N - </b> <b> <?= $ht['slug']; ?> </b></p>
        <p class="card-text"><b>Keterangan - </b> <?= $ht['jenis_pekerjaan']; ?> </p>
        <p class="card-title"><b>Tanggal - </b> <?= $ht['date']; ?></p>
        <p class="card-title"><b>Status - </b> <?= $ht['status']; ?></p>
         <p class="card-title text-gray-500"><small>Terakhir di update :  <?= $ht['created_at']; ?> </small></p>

       <?php if (in_groups('admin')) : ?>

        <a href="" class="btn btn-primary btn-sm">Edit</a>
        <a href="" class="btn btn-danger btn-sm">Delete</a>
         <br><br>
         
        <?php endif; ?>
      
        <a href="/ht" ><small class="back text"><< back to repair ht</small></a> 
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>