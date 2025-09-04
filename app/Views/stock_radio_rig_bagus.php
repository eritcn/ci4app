<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h4 mb-2 text-gray-700"><b> List Stock Radio Rig Bagus </b></h3>

    <div class="row">
        <div class="col-lg-11"> 
            <!-- Search -->
            <form action="" method="get" class="d-inline">   
                <div class="input-group mb-3 input-group-sm">
                    <input type="text" class="form-control" 
                           placeholder="Cari info stock radio rig bagus, ketik disini ndan..." 
                           name="keyword" value="<?= esc($keyword ?? '') ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>     

            <hr class="sidebar-divider border-secondary">   

            <!-- Tombol tambah -->
            <!-- <a href="/stock_radio_rig_bagus/create" class="btn bg-success text-white mb-1 btn-sm"><b> Tambah List </b></a>   -->
<div class="d-flex justify-content-between mb-3">
    <a href="<?= base_url('stock-radio-rig-bagus/create'); ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah List
    </a>

    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-export"></i> Export
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="<?= base_url('stock-radio-rig-bagus/export-excel'); ?>">
                <i class="fas fa-file-excel text-success"></i> Export Excel
            </a>
            <a class="dropdown-item" href="<?= base_url('stock-radio-rig-bagus/export-pdf'); ?>">
                <i class="fas fa-file-pdf text-danger"></i> Export PDF
            </a>
        </div>
    </div>
</div>



            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('pesan')) : ?>     
                <div class="alert alert-success" role="alert">
                    <b><?= session()->getFlashdata('pesan'); ?></b>
                </div>
            <?php endif ?>   
            <?php if(session()->getFlashdata('error')) : ?>     
                <div class="alert alert-danger" role="alert">
                    <b><?= session()->getFlashdata('error'); ?></b>
                </div>
            <?php endif ?>   

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <!-- <th>Dokumen Gambar</th> -->
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Serial Number</th>
                            <!-- <th>Keterangan</th> -->
                            <th>Posisi</th>
                            <th>Rincian</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                        <?php foreach($stock_radio_rig_bagus as $sb) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <!-- <td>
                                    <?php if(!empty($sb['gambar_dokumen'])): ?>
                                        <img src="/uploads/<?= esc($sb['gambar_dokumen']); ?>" alt="" class="doc">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td> -->
                                <td><?= esc($sb['merk']); ?></td>
                                <td><?= esc($sb['type']); ?></td>
                                <td><?= esc($sb['serial_number']); ?></td>
                                <!-- <td><?= esc($sb['keterangan']); ?></td> -->
                                <td><?= esc($sb['posisi']); ?></td>

                                <!-- <td><?= $sb['updated_at'] ?? '-' ?></td> -->
                                <td>
                                    <a href="/stock_radioRig_bagus/<?= $sb['id']; ?>" class="btn bg-dark btn-sm text-gray-300">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?= $pager->links('stock_radio_rig_bagus', 'ci4app_pagination'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
