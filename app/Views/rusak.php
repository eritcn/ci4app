<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

   <!-- Page Heading -->
                     
    <h3 class="h4 mb-2 text-dark"><b> Radio Rig Stock Rusak </b></h3>
          
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
                          
       <a href="/rusak/create" class="btn btn-outline-secondary mb-1 btn-sm">Tambah data</a>                 
             <?php if(session()->getFlashdata('pesan')) : ?>     
        <div class="alert alert-success" role="alert">
            <b> <?= session()->getFlashdata('pesan'); ?> </b>
        </div>
             <?php endif ?>   
<div class="table-responsive">
<table class="table table-striped table-bordered table-sm">
  <thead class="thead-striped-dark">
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal Update</th>
      <th scope="col">Merek</th>
      <th scope="col">Tipe</th>
      <th scope="col">Nomor seri</th>
      <th scope="col">Kelengkapan</th>
       <th scope="col">Dokumentasi</th>
      <th scope="col">Rincian</th>
    </tr>
    
  </thead> 
  <tbody class="table-group-divider">
   <?php $i =1 + (5 * ($currentPage - 1)); ?>
    <?php foreach($rusak as $k) : ?>
     <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><?= $k['date']; ?></td>
      <td><?= $k['tanggal']; ?></td>
      <td><?=$k['lokasi']; ?></td>
      <td><?= $k['slug']; ?></td>
      <td><?=$k['status']; ?></td>
       <td><img src="/uploads/<?= $k['keterangan']; ?>" alt="" class="doc" ></td>
      <td>
        <a href="/rusak/<?= $k['slug']; ?>" class="btn btn-outline-secondary btn-sm text-secondary ">Detail</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
<?= $pager->links('rusak', 'ci4app_pagination'); ?>
                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



