<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-dark font-italic"><b> Form Ubah Data Perbaikan Radio HT</b></h4>
        <form action="/ht/update/<?= $ht['id'] ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

         <hr class="sidebar-divider border-secondary">

          <div class="row mb-3">
    <label for="date" class="col-sm-2 col-form-label text-dark font-italic">Tanggal</label>
    <div class="col-sm-10">
      <input type="date" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('date')) ? 'is-invalid' : '' ?>" id="date" name="date" placeholder="01/01/2005 [ contoh ]" autofocus value="<?= $ht['date'] ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan tanggal/bulan/tahun.
      </div>
    </div>
  </div>
          <div class="row mb-3">
    <label for="tanggal" class="col-sm-2 col-form-label text-dark font-italic">Merk</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" placeholder="Motorola [ contoh ]" value="<?= $ht['tanggal'] ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan merk radio ht.
      </div>
    </div>
  </div>

      <div class="row mb-3">
    <label for="lokasi" class="col-sm-2 col-form-label text-dark font-italic">Type</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('lokasi')) ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi" placeholder="GP 2000 [ contoh ]" value="<?= $ht['lokasi'] ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan type radio ht.
      </div>
    </div>
  </div>

          <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label text-dark font-italic">Serial Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" placeholder="246ABC123 [ contoh ]" value="<?= $ht['slug'] ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan serial number radio ht.
      </div>
    </div>
  </div>


   <div class="row mb-3">
    <label for="jenis_pekerjaan" class="col-sm-2 col-form-label text-dark font-italic">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : '' ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Radio HT GS Dept, Kerusakan mati, Perbaikan ganti Sparepart.... [ contoh ]" value="<?= $ht['jenis_pekerjaan'] ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan rincian user / dept user, kerusakan dan perbaikan.
      </div>
    </div>
  </div>

    <div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label text-dark font-italic">Catatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" id="status" name="status" placeholder="Rfu / Pending [ contoh ]" value="<?= $ht['status'] ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan status hasil perbaikan.
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="keterangan" class="col-sm-2 col-form-label text-dark font-italic">Dokumentasi</label>
    <div class="col-sm-10">
     <div class="custom-file">
  <input type="file" class="custom-file-input border-dark text-dark font-italic" id="keterangan" name="keterangan">
  <label class="custom-file-label border-dark text-dark font-italic" for="keterangan">  <?php if (!empty($ht['keterangan'])) : ?>

    <p class="mt-0  border-dark text-dark font-italic"> <?= $ht['keterangan']; ?> </p>
        <img src="<?= base_url('uploads/' . $ht['keterangan']); ?>" alt="Dokumentasi" width="80" class="img-thumbnail mt-2">
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