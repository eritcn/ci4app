<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"> <b>Detail Sparepart</b> </h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/uploads/<?= $database['keterangan']; ?>" style=" width: 800px; height: 400px;" class="img-fluid" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h5 class="card-title"><b><?= $database['slug']; ?></b></h5>
        <p class="card-text"><b>Detail Sparepart : </b> <?= $database['jenis_pekerjaan']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Jenis Sparepart : </b> <?= $database['tanggal']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Jumlah : </b> <?= $database['status']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Lokasi : </b> <?= $database['lokasi']; ?></p>
        <p class="card-text" class="text-body-secondary"><b> Tanggal : </b> <?= $database['date']; ?></p>
        

       <?php if (in_groups('admin')) : ?>

        <a href="/database/edit/<?= $database['slug'] ?>" class="btn btn-primary btn-sm">Ubah</a>

         <form action="/database/<?= $database['id'] ?>" method="post" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</button>
         </form>

         <br><br>
         
        <?php endif; ?>
     
        <a href="/database"><small> << balik ke halaman data </small></a>  
      </div>
      
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>