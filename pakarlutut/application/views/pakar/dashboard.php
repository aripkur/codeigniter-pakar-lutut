 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="h5 font-weight-bold text-success text-uppercase mb-1">Data Cedera</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalcedera?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-notes-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="text-center text-uppercase mr-4 mt-3">
                        <a href="<?=base_url('pakar/cedera')?>" class="btn btn-light"> Lihat data</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="h5 font-weight-bold text-success text-uppercase mb-1">Data Gejala</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalgejala?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-laptop-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="text-center text-uppercase mr-5 mt-3">
                        <a href="<?=base_url('pakar/gejala')?>" class="btn btn-light"> Lihat data</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="h5 font-weight-bold text-success text-uppercase mb-1">Data Kaidah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$totalkaidah?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="text-center text-uppercase mr-4 mt-3">
                        <a href="<?=base_url('pakar/kaidah')?>" class="btn btn-light"> Lihat data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <!-- /.container-fluid -->