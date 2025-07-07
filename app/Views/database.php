<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid ml-3">

                    <!-- Page Heading -->
                     
                    <h3 class="h4 mb-2 text-dark"><b> Data Stock Sparepart </b></h3>

                  
          
                    <div class="row">
                        <div class="col-lg-11"> 
                          <form action="" method="get" class="d-inline">   
                              <div class="input-group mb-3 input-group-sm">
  <input type="text" class="form-control " placeholder="Masukkan keyword pencarian" name="keyword">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="submit" ><i class="fas fa-search"></i></button>
  </div>
</div>
</form>     
  <hr class="sidebar-divider border-secondary">                     
       <a href="/database/create" class="btn btn-outline-secondary mb-1 btn-sm">Tambah data</a>                 
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
      <th scope="col">Nama sparepart</th>
      <th scope="col">Nomor sparepart</th>
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
      <td><img src="/uploads/<?= $d['keterangan']; ?>" alt="" class="doc" ></td>
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

<?= $pager->links('database', 'ci4app_pagination'); ?>

                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



