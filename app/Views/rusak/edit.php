<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-dark font-italic"><b> Form Ubah Data Radio Rig Stock Rusak</b></h4>
        <form action="/rusak/update/<?= $rusak['id'] ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

         <hr class="sidebar-divider border-secondary">

          <div class="row mb-3">
    <label for="date" class="col-sm-2 col-form-label text-dark font-italic">Tanggal Update</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('date')) ? 'is-invalid' : '' ?>" id="date" name="date" placeholder="01/01/2025 [ contoh ]" autofocus value="<?= $rusak['date'] ?>">
         <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan tanggal/bulan/tahun.
      </div>
    </div>
  </div>
          <div class="row mb-3">
    <label for="tanggal" class="col-sm-2 col-form-label text-dark font-italic">Merek</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" placeholder="Motorola [ contoh ]" value="<?= $rusak['tanggal'] ?>">
         <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan merk radio rig.
      </div>
    </div>
  </div>

      <div class="row mb-3">
    <label for="lokasi" class="col-sm-2 col-form-label text-dark font-italic">Tipe</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('lokasi')) ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi" placeholder="GM338 [ contoh ]" value="<?= $rusak['lokasi'] ?>">
         <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan type radio rig.
      </div>
    </div>
  </div>

          <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label text-dark font-italic">Nomor seri</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" placeholder="103ABCD1234 [ contoh ]" value="<?= $rusak['slug'] ?>">
         <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan serial number radio rig.
      </div>
    </div>
  </div>


   <div class="row mb-3">
    <label for="jenis_pekerjaan" class="col-sm-2 col-form-label text-dark font-italic">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : '' ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Bekas radio unit DT1234, Kerusakan TX Abnormal.... [ contoh ]" value="<?= $rusak['jenis_pekerjaan'] ?>">
         <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan history radio rig.
      </div>
    </div>
  </div>

    <div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label text-dark font-italic">Catatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" id="status" name="status" placeholder="Komplit / Ctrlhead rusak... [ contoh ]" value="<?= $rusak['status'] ?>">
         <div id="validationServer03Feedback" class="invalid-feedback">
        Silahkan masukkan status kondisi radio rig.
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="keterangan" class="col-sm-2 col-form-label text-dark font-italic">Dokumentasi</label>
    <div class="col-sm-10">
     <div class="custom-file">
  <input type="file" class="custom-file-input border-dark text-dark font-italic" id="keterangan" name="keterangan">
  <label class="custom-file-label border-dark text-dark font-italic" for="keterangan">  <?php if (!empty($rusak['keterangan'])) : ?>

    <p class="mt-0  border-dark text-dark font-italic"> <?= $rusak['keterangan']; ?> </p>
        <img src="<?= base_url('uploads/' . $rusak['keterangan']); ?>" alt="Dokumentasi" width="80" class="img-thumbnail mt-2">
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