
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah - Data Gambar</title>

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
              <li class="breadcrumb-item active">Data Gambar</li>
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
          <h3>Tambah Data Gambar</h3>
        </div>
          <div class="card-body">
            <form class="" action="{{ url('gambar') }}" method="post" enctype="multipart/form-data" >
              @csrf
              <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pegawai" value="">
                @foreach($errors->get('nama') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              </div>
              <div class="form-group">
                <input class="form-control" name="gambar" type="file" id="gambar">
                @foreach($errors->get('gambar') as $msg)
                  <p class="text-danger">{{ $msg }}</p>
                @endforeach
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan Data</button>
              </div>
            </form>
          </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  @include('template.scriptjs')
</body>
</html>
