 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading --> 
        <h1 class="h3 text-gray-800 d-inline">Master Data Kaidah</h1>
        <button id="buka-form-kaidah" class="btn btn-success float-right"> TAMBAH DATA </button>
        <button id="tutup-form-kaidah" class="btn btn-danger float-right d-none"> TUTUP FORM </button>
    <hr>
    <?=$this->session->flashdata('message')?>
    <div class="bagian-form col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 id="kaidah-judul-card" class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
          <form action="<?=base_url('/pakar/kaidah/tambah')?>" method="post" id="form-kaidah">
            <input type="hidden" name="form-kaidah-kode-hidden" id="form-kaidah-kode-hidden">
            <div class="form-group row">
                <label for="form-kaidah-kode" class="col-2 ml-5"><strong>Kode Kaidah</strong></label>
                <input type="text" class="form-control col-4 ml-2" id="form-kaidah-kode" name="form-kaidah-kode" placeholder="Kode Kaidah">
            </div>
            <div class="form-group row">
                <label for="form-kaidah-fkcidera" class="col-2 ml-5"><strong>Nama Cedera</strong></label>
                <select id="form-kaidah-fkcidera" name="form-kaidah-fkcidera" class="form-control ml-2 col-3">
                  <option value="">Pilih Cedera</option>
                  <?php foreach( $cedera as $datacedera) : ?>
                    <option value="<?=$datacedera->cedera_id?>"><?=$datacedera->cedera_nama?></option>
                  <?php endforeach;?>

                </select>
            </div>
            <div class="form-group row">
                <label for="form-kaidah-fkgejala" class="col-2 ml-5"><strong>Gejala</strong></label>
                <select id="form-kaidah-fkgejala" name="form-kaidah-fkgejala[]" class="selectpicker col-9" multiple data-selected-text-format="count">
                  <?php foreach( $gejala as $datagejala) : ?>
                    <option value="<?=$datagejala->gejala_id?>"><?=$datagejala->gejala_nama?></option>
                  <?php endforeach;?>
                </select>
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
          <h6 class="m-0 font-weight-bold text-primary">Data Kaidah</h6>
        </div>
        <div class="card-body table-responsive">
            <table id="tabelKaidah" class="table table-bordered text-center">
              <thead class="thead-light">
                  <tr >
                      <th width="10%">Kode Kaidah</th>
                      <th width="20%">Nama Cedera</th>
                      <th width="50%">Gejala</th>
                      <th width="10%">Nilai CF</th>
                      <th width="10%">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach( $kaidah as $datakaidah) : ?>
                  <tr>
                          <td><?=$datakaidah->kaidah_kode?></td>
                          <td><?=$datakaidah->cedera_nama?></td>
                          <td><?=$datakaidah->gejala?></td>
                          <td><?=$datakaidah->nilai_cf." %"?></td>
                          <td class="text-center"> 
                              <a href="<?=base_url()?>/pakar/kaidah/hapus/<?=$datakaidah->kaidah_kode?>" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a> 
                              <button class="btn btn-warning btn-sm btn-block ubah-kaidah" data-kaidah="<?=$datakaidah->kaidah_kode?>" data-gejala="<?=$datakaidah->gejala_id?>" data-cedera="<?=$datakaidah->cedera_id?>">Edit</button>
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