<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Detail Pekerjaan </b></h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-3 ml-4 mr-2 mb-4">
      <img src="/uploads/<?= $gsjob['keterangan']; ?>" style=" width: 800px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-1">
        <h6 class="card-title"> <b></b> <b> <?= $gsjob['slug']; ?> </b></h6>
        <p class="card-text"><b>Keterangan - </b> <?= $gsjob['jenis_pekerjaan']; ?> </p>
        <p class="card-title"><b>Tanggal - </b> <?= $gsjob['tanggal']; ?></p>
        
         <p class="card-title"><b>Status - </b> <?= $gsjob['status']; ?></p>

       <?php if (in_groups('admin')) : ?>

        <a href="/gsjob/edit/<?= $gsjob['slug'] ?>" class="btn btn-primary btn-sm">Ubah</a>

         <form action="/gsjob/<?= $gsjob['id'] ?>" method="post" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</button>
         </form>

         <br><br>
    
        <?php endif; ?>
    
        <a href="/gsjob" ><small class="back text"><b><<</b> balik ke halaman list job inst </small></a>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>