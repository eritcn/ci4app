<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid ml-3">

                    <!-- Page Heading -->
                     
                    <h3 class="h4 mb-2 text-dark"><b> Data Stock Sparepart </b></h3>

                    <hr class="sidebar-divider border-secondary">
          
                    <div class="row">
                        <div class="col-lg-10"> 
                          
       <a href="/database/create" class="btn btn-outline-secondary mb-1 btn-sm"><i class="fas fa-plus text-sm"></i> DATA</a>                 
           <?php if(session()->getFlashdata('pesan')) : ?>     
        <div class="alert alert-success" role="alert">
<b> <?= session()->getFlashdata('pesan'); ?> </b>
</div>
 <?php endif ?>   


<table class="table table-striped table-bordered table-sm">
  <thead>
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Dokumentasi</th>
      <th scope="col">Nama Sparepart</th>
      <th scope="col">Type Sparepart</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Rincian</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php $i =1; ?>
    <?php foreach($database as $d) : ?>
     <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><?= $d['date']; ?></td>
      <td><img src="/img/<?= $d['keterangan']; ?>" alt="" class="doc" ></td>
      <td><?= $d['tanggal']; ?></td>
      <td><?= $d['slug']; ?></td>
      <td><?=$d['lokasi']; ?></td>
      <td><?=$d['status']; ?></td>
      <td>
        <a href="/database/<?= $d['slug']; ?>" class="btn btn-outline-secondary btn-sm text-secondary ">Detail</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



