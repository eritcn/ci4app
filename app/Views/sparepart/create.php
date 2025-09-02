<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-gray-700 font-italic"><b> Form Tambah Sparepart </b></h4>

            <form action="/sparepart/save" method="post" enctype="multipart/form-data">
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
                            placeholder="Antenna [ contoh ]"
                            value="<?= old('nama_sparepart'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_sparepart'); ?>
                        </div>
                    </div>
                </div>

                <!-- Kode Sparepart -->
                <div class="row mb-3">
                    <label for="kode_sparepart" class="col-sm-2 col-form-label text-dark font-italic">Kode Sparepart</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font-italic <?= ($validation->hasError('kode_sparepart')) ? 'is-invalid' : '' ?>"
                            id="kode_sparepart"
                            name="kode_sparepart"
                            value="<?= old('kode_sparepart'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode_sparepart'); ?>
                        </div>
                    </div>
                </div>

                <!-- Detail Sparepart -->
                <div class="row mb-3">
                    <label for="detail_part" class="col-sm-2 col-form-label text-dark font-italic">Detail Sparepart</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font-italic <?= ($validation->hasError('detail_part')) ? 'is-invalid' : '' ?>"
                            id="detail_part"
                            name="detail_part"
                            placeholder="Transistor Final Type MRF1550N [ contoh ]"
                            value="<?= old('detail_part'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('detail_part'); ?>
                        </div>
                    </div>
                </div>

                <!-- Dokumentasi -->
                <div class="row mb-3">
                    <label for="gambar_dokumen" class="col-sm-2 col-form-label text-dark font-italic">Dokumentasi</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= ($validation->hasError('gambar_dokumen')) ? 'is-invalid' : '' ?>"
                                id="gambar_dokumen"
                                name="gambar_dokumen">
                            <label class="custom-file-label" for="gambar_dokumen">Pilih gambar...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar_dokumen'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stock West -->
                <div class="row mb-3">
                    <label for="stok_west" class="col-sm-2 col-form-label text-dark font-italic">Stock West</label>
                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control border-dark text-dark font-italic <?= ($validation->hasError('stok_west')) ? 'is-invalid' : '' ?>"
                            id="stok_west"
                            name="stok_west"
                            value="<?= old('stok_west'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_west'); ?>
                        </div>
                    </div>
                </div>

                <!-- Stock East -->
                <div class="row mb-3">
                    <label for="stok_east" class="col-sm-2 col-form-label text-dark font-italic">Stock East</label>
                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control border-dark text-dark font-italic <?= ($validation->hasError('stok_east')) ? 'is-invalid' : '' ?>"
                            id="stok_east"
                            name="stok_east"
                            value="<?= old('stok_east'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_east'); ?>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary btn-sm font-italic">Tambah</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
