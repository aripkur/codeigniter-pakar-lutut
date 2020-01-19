 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading --> 
        <h1 class="h3 text-gray-800 d-inline">Master Data Cedera</h1>
        <button id="buka-form-cedera" class="btn btn-success float-right"> TAMBAH DATA </button>
        <button id="tutup-form-cedera" class="btn btn-danger float-right d-none"> TUTUP FORM </button>
    <hr>
    <?=$this->session->flashdata('message')?>


    <div class="bagian-form col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 id="cedera-judul-card" class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
          <form action="<?=base_url('/pakar/cedera/tambah')?>" method="post" id="form-cedera">
            <input type="hidden" name="form-cedera-id" id="form-cedera-id">
            <div class="form-group row">
                <label for="form-cedera-kode" class="col-2 ml-5"><strong>Kode Cedera</strong></label>
                  <input type="text" class="form-control col-4" id="form-cedera-kode" name="form-cedera-kode" placeholder="Kode Cedera">
            </div>
            <div class="form-group row">
                <label for="form-cedera-nama" class="col-2 ml-5"><strong>Nama Cedera</strong></label>
                  <input type="text" class="form-control col-9" id="form-cedera-nama" name="form-cedera-nama" placeholder="Nama Cedera">
            </div>
            <div class="form-group row">
                <label for="form-cedera-solusi" class="col-2 ml-5"><strong>Solusi</strong></label>
                <textarea name="form-cedera-solusi" id="form-cedera-solusi" class="form-control col-9" rows="5" ></textarea>
            </div>
            <div class="form-group row">
                <label for="form-cedera-nilaicf" class="col-2 ml-5"><strong>Nilai CF</strong></label>
                  <input type="number" class="form-control col-2" id="form-cedera-nilaicf" name="form-cedera-nilaicf" placeholder="0 - 100 %"  min="0" max="100">
            </div>
            <hr>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">TAMBAH DATA</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Cedera</h6>
        </div>
        <div class="card-body table-responsive">
            <table id="tabelCedera" class="table table-bordered text-center">
              <thead class="thead-light">
                  <tr >
                      <th width="10%" >Kode Cedera</th>
                      <th width="20%">Nama Cedera</th>
                      <th width="50%">Solusi</th>
                      <th width="10%">Nilai Cf</th>
                      <th width="10%">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach( $cedera as $datacedera) : ?>
                  <tr>
                          <td><?=$datacedera->cedera_kode?></td>
                          <td><?=$datacedera->cedera_nama?></td>
                          <td><?=$datacedera->cedera_solusi?></td>
                          <td><?=$datacedera->nilai_cf. " %"?></td>
                          <td class="text-center"> 
                              <a href="<?=base_url()?>/pakar/cedera/hapus/<?=$datacedera->cedera_id?>" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a> 
                              <button class="btn btn-warning btn-sm btn-block ubah-cedera" data-id="<?=$datacedera->cedera_id?>" data-kode="<?=$datacedera->cedera_kode?>" data-nama="<?=$datacedera->cedera_nama?>" data-nilaicf="<?=$datacedera->nilai_cf?>" data-solusi="<?=$datacedera->cedera_solusi?>">Edit</button>
                          </td>
                      </tr>
                  <?php endforeach;?>
              </tbody>
          </table>
        </div>
      </div>
    </div>

    
 </div>
 <!-- /.container-fluid -->