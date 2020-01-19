<section class="main">
    <div class="wrap-konsultasi">
        <div class="konsul-usernama text-center">
            <p class="font-italic"><span class="font-weight-bold">nama / umur :</span> <span id="tampilNama"></span> - <span id="tampilUmur"></span></p>
        </div>
        <div class="konsul-gambar">
            <img id="pertanyaan-gambar" src="" class="img-fluid">
        </div>
        <div class="konsul-pertanyaan">
            <p>Apakah <span id="pertanyaan">pertanyaan</span> ?</p>
        </div>
        <div class="konsul-jawaban">
          <div class="row">
              <div class="tombol-ya col-6">
                <div class="btn btn-success btn-block text-uppercase">
                  <input class="form-check-input" type="checkbox" id="ya" disabled>
                  <label class="m-auto">Ya</label>
                </div>
              </div>
              <div class="tombol-tidak col-6">
                <div class="btn btn-danger btn-block text-uppercase">
                  <input class="form-check-input" type="checkbox" id="tidak" disabled>
                  <label class="m-auto">Tidak</label>
                </div>
              </div>
          </div>
        </div>
        <div class="konsul-nilaiCf">
            <div class="form-group">
                <input type="number" id="nilaiCf" min=0 max=100 placeholder="Nilai Cf 0 - 100" class="form-control">
            </div>
        </div>
        <div class="konsul-lanjut">
            <button class="lanjut btn btn-info btn-block text-uppercase" >Lanjut</button>
        </div>
    </div>
    <div class="wrap-kesimpulan d-none">
      <div class="kesimpulan-indetitas text-uppercase">
        <h6><span class="font-weight-bold">Nama :</span>  <span class="kesimpulan-nama"> </span></h6>
        <h6><span class="font-weight-bold">Umur :</span> <span class="kesimpulan-umur"></span> Tahun</h6>
      </div>
      <div class="kesimpulan-diagnosa text-uppercase text-center">
        <div class="wrap-diagnosa">
          <h4 class="font-weight-bold kesimpulan-cedera"></h4>
          <p><span class="font-weight-bold">Nilai CF :</span> <span class="kesimpulan-nilaicf"> </span> %</p>
        </div>
      </div>
      <div class="kesimpulan-solusi">
        <div class="row">
          <p class="text-uppercase font-weight-bold col-2 ml-4 mt-2">solusi :</p>
          <div class="wrap-solusi col-9">
            <div class="table-responsive">

            <p class="text-justify solusi"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- ================= MODAL POPUP TAMBAH NAMA ================== -->
<div class="modal fade" id="modalNama" tabindex="-1" role="dialog" aria-labelledby="modalNamaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNamaTitle">Tambah Nama</h5>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="nama" class="col-2 p-2">Nama</label>
          <input type="text" id="nama" class="form-control col-9" placeholder="Masukan nama anda" required >
        </div>
        <div class="form-group row">
          <label for="nama" class="col-2 p-2">Umur</label>
          <input type="number" id="umur" class="form-control col-9" placeholder="Masukan Umur anda" required >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="tambahNama" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ================= MODAL POPUP CEDERA TIDAK DITEMUKAN ================== -->



