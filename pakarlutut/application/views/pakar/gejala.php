 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading --> 
        <h1 class="h3 text-gray-800 d-inline">Master Data Gejala</h1>
        <button id="buka-form-gejala" class="btn btn-success float-right"> TAMBAH DATA </button>
        <button id="tutup-form-gejala" class="btn btn-danger float-right d-none"> TUTUP FORM </button>
    <hr>
    <?=$this->session->flashdata('message')?>


    <div class="bagian-form col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 id="gejala-judul-card" class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
          <form action="<?=base_url('/pakar/gejala/tambah')?>" method="post" enctype="multipart/form-data" id="form-gejala">
            <input type="hidden" name="form-gejala-id" id="form-gejala-id">
            <input type="hidden" name="form-gejala-gambar-lama" id="form-gejala-gambar-lama">
            <div class="form-group row">
                <label for="form-gejala-kode" class="col-2 ml-5"><strong>Kode Gejala</strong></label>
                  <input type="text" class="form-control col-4" id="form-gejala-kode" name="form-gejala-kode" placeholder="Kode Gejala">
            </div>
            <div class="form-group row">
                <label for="form-gejala-nama" class="col-2 ml-5"><strong>Nama Gejala</strong></label>
                  <input type="text" class="form-control col-9" id="form-gejala-nama" name="form-gejala-nama" placeholder="Nama Gejala">
            </div>
            <div id="bagian-gambar" class="form-group row">
                <label for="tampil-gejala-gambar" class="col-2 ml-5 mt-2"></label>
                <img id="tampil-gejala-gambar" src="<?=base_url('/images/default.jpeg')?>" class="img-thumbnail" width="150px">
            </div>
            <div class="form-group row">
                <label for="" class="col-2 ml-5"><strong>Gambar</strong></label>
                <input type="file" id="form-gejala-gambar" name="form-gejala-gambar" class="form-control-file col-5">
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
          <h6 class="m-0 font-weight-bold text-primary">Data Gejala</h6>
        </div>
        <div class="card-body table-responsive">
            <table id="tabelGejala" class="table table-bordered text-center">
              <thead class="thead-light">
                  <tr >
                      <th width="20%">Kode Gejala</th>
                      <th width="40%">Gambar</th>
                      <th width="30%">Nama Gejala</th>
                      <th width="10%">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach( $gejala as $datagejala) : ?>
                  <tr>
                          <td><?=$datagejala->gejala_kode?></td>
                          <td><img src="<?=base_url('/images/').$datagejala->gejala_gambar?>" class="img-thumbnail" width="150px"></td>
                          <td><?=$datagejala->gejala_nama?></td>
                          <td class="text-center"> 
                              <a href="<?=base_url()?>/pakar/gejala/hapus/<?=$datagejala->gejala_id?>" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a> 
                              <button class="btn btn-warning btn-sm btn-block ubah-gejala" data-id="<?=$datagejala->gejala_id?>" data-kode="<?=$datagejala->gejala_kode?>" data-nama="<?=$datagejala->gejala_nama?>" data-gambar="<?=$datagejala->gejala_gambar?>">Edit</button>
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