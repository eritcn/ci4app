<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-4"><b> Detail Radio HT </b></h4>
            <div class="card mb-3 " style="max-width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7 mt-4 ml-4 mr-4 mb-4">
      <img src="/uploads/<?= $ht['keterangan']; ?>" style=" width: 600px; height: 400px;" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-4">
      <div class="card-body mr-2">
        <h6 class="card-title"> <b>TYPE - </b> <b> <?= $ht['lokasi']; ?> </b></h6>
         <p class="card-title"><b>S/N - </b> <b> <?= $ht['slug']; ?> </b></p>
        <p class="card-text"><b>Keterangan - </b> <?= $ht['jenis_pekerjaan']; ?> </p>
        <p class="card-title"><b>Tanggal - </b> <?= $ht['date']; ?></p>
        <p class="card-title"><b>Status - </b> <?= $ht['status']; ?></p>
       

       <?php if (in_groups('admin')) : ?>

        <a href="/ht/edit/<?= $ht['slug'] ?>" class="btn btn-primary btn-sm">Ubah</a>

         <form action="/ht/<?= $ht['id'] ?>" method="post" class="d-inline">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</button>
         </form>

         <br><br>
         
        <?php endif; ?>
      
        <a href="/ht" ><small class="back text"><< balik kehalaman perbaikan ht</small></a> 
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>