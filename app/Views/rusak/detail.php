<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Detail Radio Rig Rusak</b></h4>
            <div class="card mb-3 " style="max-width: 1300px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-2 mr-2 mb-4">
      <img src="/uploads/<?= $rusak['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md  mr-2">
      <div class="card-body mr-2">
        <h6 class="card-title"> <b>TYPE - </b> <b> <?= $rusak['lokasi']; ?> </b></h6>
         <p class="card-title"><b>S/N - </b> <b> <?= $rusak['slug']; ?> </b></p>
        <p class="card-text"><b>Keterangan - </b> <?= $rusak['jenis_pekerjaan']; ?> * <b class="text-danger">radio rig stock rusak.</b></p>
        <p class="card-title"><b>Tanggal Update - </b> <?= $rusak['date']; ?></p>
        <p class="card-title"><b>Catatan - </b> <?= $rusak['status']; ?></p>

       <?php if (in_groups('admin')) : ?>

        <a href="/rusak/edit/<?= $rusak['slug'] ?>" class="btn btn-primary btn-sm">Ubah</a>

          <form action="/rusak/<?= $rusak['id'] ?>" method="post" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</button>
         </form>

         <br><br>
         
        <?php endif; ?>
    
        <a href="/rusak" ><small class="back text"><< balik kehalaman radio rig rusak</small></a> 
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>