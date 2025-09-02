<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-gray-700 font-italic"><b> Form Ubah Data Sparepart </b></h4>
            
            <form action="/sparepart/update/<?= $sparepart['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <hr class="sidebar-divider border-secondary">

                <!-- Nama Sparepart -->
                <div class="row mb-3">
                    <label for="nama_sparepart" class="col-sm-2 col-form-label text-dark font-italic">Nama Sparepart</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-dark text-dark font-italic <?= ($validation->hasError('nama_sparepart')) ? 'is-invalid' : '' ?>" 
                               id="nama_sparepart" 
                               name="nama_sparepart" 
                               placeholder="Antenna [contoh]" 
                               value="<?= old('nama_sparepart', $sparepart['nama_sparepart']); ?>" 
                               <?= $isAdmin ? '' : 'readonly' ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_sparepart'); ?>
                        </div>
                    </div>
                </div>

                <!-- Kode Sparepart -->
                <div class="row mb-3">
                    <label for="kode_sparepart" class="col-sm-2 col-form-label text-gray-700 font-italic">Kode Sparepart</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-secondary font-italic" 
                               id="kode_sparepart" 
                               name="kode_sparepart" 
                               valu
