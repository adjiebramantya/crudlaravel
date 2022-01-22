
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
            <div class="card-tools">
              <a href="{{url('pegawai/create')}}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
              </tr>
              @foreach($data as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->jabatan->jabatan }}</td>
                <td>{{ date('d-m-Y', strtotime( $item->tanggal_lahir)) }}</td>
                <td>
                  <a href="{{url('pegawai/'.$item->id.'/edit')}}"><i class="far fa-edit"></i></a> |
                  <a href="{{url('pegawai/'.$item->id)}}" onclick="return confirm('Yakin Ingin Menghapus {{ $item->nama }}?');" ><i class="far fa-trash-alt" style="color:red;"></i></a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
          <div class="card-footer">
            {{ $data->links( )}}
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
