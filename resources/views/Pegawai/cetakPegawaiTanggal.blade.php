
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pegawai</title>

  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.sitebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
          <div class="card-header">
                <h3>Print Data Pegawai</h3>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
                  <label for="label">Tanggal Awal : </label>
                  <input type="date" name="tglAwal" id="tglAwal" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="label">Tanggal Akhir : </label>
                <input type="date" name="tglAkhir" id="tglAkhir" class="form-control">
            </div>
            <div class="form-group mb-3">
                <a href="" onclick="this.href='/cetakPegawaiTanggal/'+document.getElementById('tglAwal').value+'/'+document.getElementById('tglAkhir').value" 
                  target="_blank" class="btn btn-primary col-md-12" rel="noopener noreferrer">Cetak</a>
            </div>
          </div>
          <div class="card-footer">
          </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  @include('template.scriptjs')
  @include('sweetalert::alert')
</body>
</html>
