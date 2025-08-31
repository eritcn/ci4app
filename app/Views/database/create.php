<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="my-3 text-dark"><b> Form Tambah Data Sparepart </b></h4>
        
        <form action="/database/save" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

         <hr class="sidebar-divider border-secondary">

          <div class="row mb-3">
    <label for="date" class="col-sm-2 col-form-label text-gray-700">Tanggal</label>
    <div class="col-sm-10">
      <input type="date" class="form-control border-secondary <?= ($validation->hasError('date')) ? 'is-invalid' : '' ?>" id="date" name="date"  placeholder="01/01/2025 [contoh]" autofocus>
        <div id="validationServer03Feedback" class="invalid-feedback">
     Silahkan isi tanggal-bulan-tahun
      </div>
    </div>
  </div>

    <div class="row mb-3">
    <label for="tanggal" class="col-sm-2 col-form-label text-gray-700">Nama Part</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" id="tanggal" name="tanggal" placeholder="IC Final Radio Rig [contoh]">
        <div id="validationServer03Feedback" class="invalid-feedback">
     Silahkan isi nama sparepart
      </div>
    </div>
  </div>

          <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label text-gray-700">Nomor Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-secondary <?= ($validation->hasError('slug')) ? 'is-invalid' : '' ?>" id="slug" name="slug" placeholder="MRF 1550N [contoh] ">
        <div id="validationServer03Feedback" class="invalid-feedback">
     Silahkan isi kode sparepart
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="jenis_pekerjaan" class="col-sm-2 col-form-label text-gray-700">Detail Part</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : '' ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="IC Final Motorola GM338 dengan type MRF 1550N berfungsi sebagai power transmit... [contoh]">
        <div id="validationServer03Feedback" class="invalid-feedback">
     Silahkan isi detail tentang sparepart
      </div>
    </div>
  </div>


  <div class="row mb-3">
    <label for="lokasi" class="col-sm-2 col-form-label text-gray-700">Lokasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('lokasi')) ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi" placeholder="Markas Instrument East Block [contoh]">
        <div id="validationServer03Feedback" class="invalid-feedback">
       Silahkan isi lokasi tempat sparepart
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label text-gray-700">Jumlah </label>

    <div class="col-sm-10">
      <input type="text" class="form-control border-dark text-dark <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" id="status" name="status" placeholder="7 Ea [contoh">
        <div id="validationServer03Feedback" class="invalid-feedback">
      Silahkan isi jumlah stock sparepart
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="keterangan" class="col-sm-2 col-form-label text-gray-700">Dokumentasi</label>
    <div class="col-sm-10">
  <input type="file" class="form-control border-dark <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan">
  
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