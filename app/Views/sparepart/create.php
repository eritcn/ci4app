<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="my-3 text-gray-700"><b> Form Tambah Data Sparepart </b></h4>
        
            <form action="/sparepart/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <hr class="sidebar-divider border-secondary">

                <!-- Nama Sparepart -->
                <div class="row mb-3">
                    <label for="nama_sparepart" class="col-sm-2 col-form-label text-gray-700">Nama Part</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-dark text-dark <?= ($validation->hasError('nama_sparepart')) ? 'is-invalid' : '' ?>" 
                               id="nama_sparepart" 
                               name="nama_sparepart" 
                               placeholder="IC Final Radio Rig [contoh]" 
                               value="<?= old('nama_sparepart'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_sparepart') ?>
                        </div>
                    </div>
                </div>

                <!-- Kode Sparepart -->
                <div class="row mb-3">
                    <label for="kode_sparepart" class="col-sm-2 col-form-label text-gray-700">Kode Part</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-secondary <?= ($validation->hasError('kode_sparepart')) ? 'is-invalid' : '' ?>" 
                               id="kode_sparepart" 
                               name="kode_sparepart" 
                               placeholder="MRF 1550N [contoh]" 
                               value="<?= old('kode_sparepart'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode_sparepart') ?>
                        </div>
                    </div>
                </div>

                <!-- Detail Part -->
                <div class="row mb-3">
                    <label for="detail_part" class="col-sm-2 col-form-label text-gray-700">Detail Part</label>
                    <div class="col-sm-10">
                        <textarea class="form-control border-dark text-dark <?= ($validation->hasError('detail_part')) ? 'is-invalid' : '' ?>" 
                                  id="detail_part" 
                                  name="detail_part" 
                                  placeholder="IC Final Motorola GM338 dengan type MRF 1550N berfungsi sebagai power transmit..."><?= old('detail_part'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('detail_part') ?>
                        </div>
                    </div>
                </div>

                <!-- Stock West -->
                <div class="row mb-3">
                    <label for="stok_west" class="col-sm-2 col-form-label text-gray-700">Stock West</label>
                    <div class="col-sm-10">
                        <input type="number" 
                               class="form-control border-dark text-dark <?= ($validation->hasError('stok_west')) ? 'is-invalid' : '' ?>" 
                               id="stok_west" 
                               name="stok_west" 
                               placeholder="1 [contoh]" 
                               value="<?= old('stok_west'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_west') ?>
                        </div>
                    </div>
                </div>

                <!-- Stock East -->
                <div class="row mb-3">
                    <label for="stok_east" class="col-sm-2 col-form-label text-gray-700">Stock East</label>
                    <div class="col-sm-10">
                        <input type="number" 
                               class="form-control border-dark text-dark <?= ($validation->hasError('stok_east')) ? 'is-invalid' : '' ?>" 
                               id="stok_east" 
                               name="stok_east" 
                               placeholder="2 [contoh]" 
                               value="<?= old('stok_east'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_east') ?>
                        </div>
                    </div>
                </div>

                <!-- Gambar Dokumen -->
                <div class="row mb-3">
                    <label for="gambar_dokumen" class="col-sm-2 col-form-label text-gray-700">Dokumen Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" 
                               class="form-control border-dark <?= ($validation->hasError('gambar_dokumen')) ? 'is-invalid' : '' ?>" 
                               id="gambar_dokumen" 
                               name="gambar_dokumen">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar_dokumen') ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
