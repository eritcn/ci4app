<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-dark font-italic"><b> Form Ubah Data Sparepart </b></h4>
        <form action="/database/update/<?= $database['id'] ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>
<input type="hidden" name="keteranganLama" value="<?= $database['keterangan'] ?>">
         <hr class="sidebar-divider border-secondary">

          <div class="row mb-3">
    <label for="date" class="col-sm-2 col-form-label text-gray-700 font-italic">Tanggal</label>
    <div class="col-sm-10">
      <input type="date" class="form-control border-secondary font-italic " id="date" name="date" autofocus value="<?= (old('date')) ? old('date') : $database['date']?>">
    </div>
  </div>

    <div class="row mb-3">
    <label for="tanggal" class="col-sm-2 col-form-label text-gray-700 font-italic">Nama Sparepart</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic" id="tanggal" name="tanggal" value="<?= (old('tanggal')) ? old('tanggal') : $database['tanggal']?>">
        <div id="validationServer03Feedback" class="invalid-feedback font-italic">
        Silahkan masukkan nama sparepart.
      </div>
    </div>
  </div>

          <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label text-gray-700 font-italic">Nomor Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-secondary font-italic" id="slug" name="slug" value="<?= (old('slug')) ? old('slug') : $database['slug']?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="jenis_pekerjaan" class="col-sm-2 col-form-label text-gray-700 font-italic">Detail Sparepart</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic" id="jenis_pekerjaan" name="jenis_pekerjaan" value="<?= (old('jenis_pekerjaan')) ? old('jenis_pekerjaan') : $database['jenis_pekerjaan']?>">
    </div>
  </div>


  <div class="row mb-3">
    <label for="lokasi" class="col-sm-2 col-form-label text-gray-700 font-italic">Lokasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic" id="lokasi" name="lokasi"  value="<?= (old('lokasi')) ? old('lokasi') : $database['lokasi']?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label text-gray-700 font-italic">Jumlah </label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark font-italic" id="status" name="status" value="<?= (old('status')) ? old('status') : $database['status']?>">
    </div>
  </div>

    <div class="row mb-2">
    <label for="keterangan" class="col-sm-2 col-form-label text-gray-700 font-italic">Dokumentasi</label>
    <div class="col-sm-10">
     <div class="custom-file">
  <input type="file" class="custom-file-input border-dark text-dark font-italic" id="keterangan" name="keterangan">
  <label class="custom-file-label border-dark text-dark font-italic" for="keterangan">  <?php if (!empty($database['keterangan'])) : ?>

    <p class="mt-0  border-dark text-dark font-italic"> <?= $database['keterangan']; ?> </p>
        <img src="<?= base_url('uploads/' . $database['keterangan']); ?>" alt="Dokumentasi" width="80" class="img-thumbnail mt-2">
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