<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
         
            <h4 class="my-3 text-dark font-italic"><b> Form Ubah Data Pekerjaan</b></h4>
        
        <form action="/gsjob/update/<?= $gsjob['id'] ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

         <hr class="sidebar-divider border-secondary">

          <div class="row mb-3">
    <label for="tanggal" class="col-sm-2 col-form-label text-dark font-italic">Tanggal</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal"  placeholder="01/01/2025 [ contoh ]" autofocus value="<?= $gsjob['tanggal'] ?>">
        <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan tanggal/bulan/tahun.
      </div>
    </div>
  </div>

      <div class="row mb-3">
    <label for="lokasi" class="col-sm-2 col-form-label text-dark font-italic">Lokasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('lokasi')) ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi" placeholder="East Block [ contoh ]" value="<?= $gsjob['lokasi'] ?>">
        <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan lokasi.
      </div>
    </div>
  </div>
   
          <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label text-dark font-italic">Pekerjaan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" placeholder="Perbaikan Toa Masjid East Block [ contoh ]" value="<?= $gsjob['slug'] ?>">
        <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan jenis pekerjaan yang berbeda dari sebelumnya.
      </div>
    </div>
  </div>

     <div class="row mb-3">
    <label for="jenis_pekerjaan" class="col-sm-2 col-form-label text-dark font-italic">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : '' ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Perbaikan toa pengeras suara adzan di masjid east block.... [ contoh ]" value="<?= $gsjob['jenis_pekerjaan'] ?>">
       <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan detail pekerjaan.
      </div>
    </div>
  </div>

   <div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label text-dark font-italic">Status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" id="status" name="status" placeholder="Close / Pending [ contoh ]" value="<?= $gsjob['status'] ?>">
       <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan status hasil pekerjaan.
      </div>
    </div>
  </div>

      <div class="row mb-2">
    <label for="keterangan" class="col-sm-2 col-form-label text-gray-700 font-italic">Dokumentasi</label>
    <div class="col-sm-10">
      
 <div class="custom-file">
  <input type="file" class="custom-file-input border-dark text-dark font-italic" id="keterangan" name="keterangan">
  <label class="custom-file-label border-dark text-dark font-italic" for="keterangan">  <?php if (!empty($gsjob['keterangan'])) : ?>

    <p class="mt-0  border-dark text-dark font-italic"> <?= $gsjob['keterangan']; ?> </p>
        <img src="<?= base_url('uploads/' . $gsjob['keterangan']); ?>" alt="Dokumentasi" width="80" class="img-thumbnail mt-2">
    <?php endif; ?>
     </label>
</div>
  </div>
  </div>

  <button type="submit" class="btn btn-primary btn-sm font-italic">Ubah</button>
</form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>