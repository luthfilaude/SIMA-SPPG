<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><i class="fas fa-tags mr-2"></i>@yield('title')</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
                  <li class="breadcrumb-item active"><i class="fas fa-tags mr-1"></i> @yield('title')</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div>
                    <button class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data</button>
                </div>
                <div class="btn-group dropleft">
                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-print mr-1"></i> Cetak
                    </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-danger" href="#"><i class="fas fa-file-pdf mr-2"></i> PDF</a>
                    <a class="dropdown-item text-success" href="#"><i class="fas fa-file-excel mr-2"></i> Excel</a>
                </div>
                </div>

              </div>
            </div>
            <div class="card-body">
              DATA KATEGORI
            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      </div>
</div>
