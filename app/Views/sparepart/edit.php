<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-gray-700 font-italic"><b> Form Ubah Data Sparepart </b></h4>

            <form action="/sparepart/update/<?= $sparepart['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambar_lama" value="<?= $sparepart['gambar_dokumen']; ?>">

                <hr class="sidebar-divider border-secondary">

                <!-- Nama Sparepart -->
                <div class="row mb-3">
                    <label for="nama_sparepart" class="col-sm-2 col-form-label text-dark font-italic">Nama Sparepart</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-dark text-dark font-italic <?= ($validation->hasError('nama_sparepart')) ? 'is-invalid' : '' ?>" 
                               id="nama_sparepart" 
                               name="nama_sparepart" 
                               placeholder="Antenna [ contoh ]" 
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
                               value="<?= old('kode_sparepart', $sparepart['kode_sparepart']); ?>" 
                               <?= $isAdmin ? '' : 'readonly' ?>>
                    </div>
                </div>

                <!-- Detail Part -->
                <div class="row mb-3">
                    <label for="detail_part" class="col-sm-2 col-form-label text-dark font-italic">Detail Sparepart</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-dark text-dark font-italic <?= ($validation->hasError('detail_part')) ? 'is-invalid' : '' ?>" 
                               id="detail_part" 
                               name="detail_part" 
                               placeholder="Transistor Final Type [ contoh ]" 
                               value="<?= old('detail_part', $sparepart['detail_part']); ?>" 
                               <?= $isAdmin ? '' : 'readonly' ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('detail_part'); ?>
                        </div>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div class="row mb-2">
                    <label for="gambar_dokumen" class="col-sm-2 col-form-label text-gray-700 font-italic">Dokumentasi</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" 
                                   class="custom-file-input border-dark text-dark font-italic <?= ($validation->hasError('gambar_dokumen')) ? 'is-invalid' : '' ?>" 
                                   id="gambar_dokumen" 
                                   name="gambar_dokumen" 
                                   <?= $isAdmin ? '' : 'disabled' ?>>
                            <label class="custom-file-label border-dark text-dark font-italic" for="gambar_dokumen">Pilih gambar...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar_dokumen'); ?>
                            </div>
                        </div>
                        <?php if (!empty($sparepart['gambar_dokumen'])) : ?>
                            <p class="mt-1 border-dark text-dark font-italic">Gambar saat ini: <?= $sparepart['gambar_dokumen']; ?></p>
                            <img src="<?= base_url('uploads/' . $sparepart['gambar_dokumen']); ?>" alt="Dokumentasi" width="100" class="img-thumbnail mt-1">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Stock West -->
                <div class="row mb-3">
                    <label for="stok_west" class="col-sm-2 col-form-label text-gray-700 font-italic">Stock West</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-dark text-dark font-italic" 
                               id="stok_west" 
                               name="stok_west" 
                               value="<?= old('stok_west', $sparepart['stok_west']); ?>">
                    </div>
                </div>

                <!-- Stock East -->
                <div class="row mb-3">
                    <label for="stok_east" class="col-sm-2 col-form-label text-gray-700 font-italic">Stock East</label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control border-dark text-dark font-italic" 
                               id="stok_east" 
                               name="stok_east" 
                               value="<?= old('stok_east', $sparepart['stok_east']); ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm font-italic">Update</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
