<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
         
            <h4 class="my-3 text-dark"><b> Form Tambah Data Pekerjaan</b></h4>
        
        <form action="/gsjob/save" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

         <hr class="sidebar-divider border-secondary">

          <div class="row mb-3">
    <label for="tanggal" class="col-sm-2 col-form-label text-dark">Tanggal</label>
    <div class="col-sm-10">
      <input type="date" class="form-control border-dark text-dark <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal"  placeholder="01/01/2025 [ contoh ]" autofocus >
        <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan tanggal/bulan/tahun.
      </div>
    </div>
  </div>

      <div class="row mb-3">
    <label for="lokasi" class="col-sm-2 col-form-label text-dark">Lokasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('lokasi')) ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi" placeholder="East Block [ contoh ]">
        <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan lokasi.
      </div>
    </div>
  </div>
   
          <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label text-dark">Pekerjaan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" placeholder="Perbaikan Toa Masjid East Block [ contoh ]">
        <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan jenis pekerjaan yang berbeda dari sebelumnya.
      </div>
    </div>
  </div>

     <div class="row mb-3">
    <label for="jenis_pekerjaan" class="col-sm-2 col-form-label text-dark">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : '' ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Perbaikan toa pengeras suara adzan di masjid east block.... [ contoh ]">
       <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan detail pekerjaan.
      </div>
    </div>
  </div>

   <div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label text-dark">Status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" id="status" name="status" placeholder="Close / Pending [ contoh ]">
       <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan status hasil pekerjaan.
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="keterangan" class="col-sm-2 col-form-label text-dark">Dokumentasi</label>
    <div class="col-sm-10">
      <input type="file" class="form-control border-dark text-dark <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" >
      
       <div id="validationServer03Feedback" class="invalid-feedback">
        <?= $validation->getError('keterangan') ?>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>