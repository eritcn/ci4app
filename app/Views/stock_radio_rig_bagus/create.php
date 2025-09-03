<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3 text-gray-700 font-"><b> Form Tambah Stock Radio Rig Bagus </b></h4>

            <form action="/stock_radio_rig_bagus/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <hr class="sidebar-divider border-secondary">

                <!-- Nama Sparepart -->
                <div class="row mb-3">
                    <label for="merk" class="col-sm-2 col-form-label text-dark font-">Merk</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font- <?= ($validation->hasError('merk')) ? 'is-invalid' : '' ?>"
                            id="merk"
                            name="merk"
                            placeholder="Motorola [ contoh ]"
                            value="<?= old('merk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('merk'); ?>
                        </div>
                    </div>
                </div>

                <!-- Kode Sparepart -->
                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label text-dark font-">Type</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font- <?= ($validation->hasError('type')) ? 'is-invalid' : '' ?>"
                            id="type"
                            name="type"
                            placeholder="GM338 [ contoh ]"
                            value="<?= old('type'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('type'); ?>
                        </div>
                    </div>
                </div>

                <!-- Detail Sparepart -->
                <div class="row mb-3">
                    <label for="serial_number" class="col-sm-2 col-form-label text-dark font-">Serial Number</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font- <?= ($validation->hasError('serial_number')) ? 'is-invalid' : '' ?>"
                            id="serial_number"
                            name="serial_number"
                            placeholder="103ABCD1234 [ contoh ]"
                            value="<?= old('serial_number'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('serial_number'); ?>
                        </div>
                    </div>
                </div>

                <!-- Dokumentasi -->
                <div class="row mb-3">
                    <label for="gambar_dokumen" class="col-sm-2 col-form-label text-dark font-">Dokumentasi</label>
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
                    <label for="keterangan" class="col-sm-2 col-form-label text-dark font-">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font- <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>"
                            id="keterangan"
                            name="keterangan"
                             placeholder="Radio rig bekas DT1234 status ready setelah perbaikan... [ contoh ]"
                            value="<?= old('keterangan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
                        </div>
                    </div>
                </div>

                <!-- Stock East -->
                <div class="row mb-3">
                    <label for="posisi" class="col-sm-2 col-form-label text-dark font-">Posisi</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control border-dark text-dark font- <?= ($validation->hasError('posisi')) ? 'is-invalid' : '' ?>"
                            id="posisi"
                            name="posisi"
                             placeholder="East [ contoh ]"
                            value="<?= old('posisi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('posisi'); ?>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary btn-sm font-">Tambah</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
