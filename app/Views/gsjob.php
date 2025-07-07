<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid ml-3">

                    <!-- Page Heading -->
                     
                    <h3 class="h4 mb-2 text-dark"><b> List Pekerjaan </b></h3>

                    <div class="row">
                        <div class="col-lg-11"> 

                             <form action="" method="get" class="d-inline">                 
  <div class="input-group mb-3 input-group-sm">
  <input type="text" class="form-control " placeholder="Masukkan keyword pencarian" name="keyword">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fas fa-search"></i></button>
  </div>
</div>
</form>  
 <hr class="sidebar-divider border-secondary">

          <a href="/gsjob/create" class="btn btn-outline-secondary mb-1 btn-sm">Tambah data</a> 
       <?php if(session()->getFlashdata('pesan')) : ?>     
        <div class="alert alert-success" role="alert">
<b> <?= session()->getFlashdata('pesan'); ?> </b>
</div>
 <?php endif ?> 
                 


<table class="table table-striped table-bordered table-sm">
  <thead class="thead outline-dark">
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Dokumentasi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Pekerjaan</th>
      <th scope="col">Status</th>
      <th scope="col">Rincian</th>
    </tr>
    
  </thead> 
  <tbody class="table-group-divider">
    <?php $i =1 + (6 * ($currentPage - 1)); ?>
    <?php foreach($gsjob as $g) : ?>
     <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><img src="/uploads/<?= $g['keterangan']; ?>" alt="" class="doc" ></td>
      <td><?= $g['tanggal']; ?></td>
      <td><?=$g['lokasi']; ?></td>
      <td><?=$g['slug']; ?></td>
      <td><?=$g['status']; ?></td>
      <td>
        <a href="/gsjob/<?= $g['slug']; ?>" class="btn btn-outline-secondary btn-sm text-secondary ">Detail</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $pager->links('gsjob', 'ci4app_pagination'); ?>


                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



