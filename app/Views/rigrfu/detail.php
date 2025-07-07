<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Detail Radio Rig Rfu</b></h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/uploads/<?= $rigrfu['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h6 class="card-title"> <b>TYPE - </b> <b> <?= $rigrfu['lokasi']; ?> </b></h6>
         <p class="card-title"><b>S/N - </b> <b> <?= $rigrfu['slug']; ?> </b></p>
        <p class="card-text"><b>Keterangan - </b> <?= $rigrfu['jenis_pekerjaan']; ?> [<b>Radio Stock Bagus</b>] </p>
        <p class="card-title"><b>Tanggal Update - </b> <?= $rigrfu['date']; ?></p>
        <p class="card-title"><b>Catatan - </b> <?= $rigrfu['status']; ?></p>

       <?php if (in_groups('admin')) : ?>

        <a href="/rigrfu/edit/<?= $rigrfu['slug'] ?>" class="btn btn-primary btn-sm">Ubah</a>

         <form action="/rigrfu/<?= $rigrfu['id'] ?>" method="post" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</button>
         </form>

         <br>
         
        <?php endif; ?>
      <br><br>
        <a href="/rigrfu" ><small class="back text"><< balik kehalaman radio rig rfu</small></a> 
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>