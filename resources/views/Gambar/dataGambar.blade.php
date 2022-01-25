
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Gambar</title>

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
            <div class="card-tools">
              <a href="{{url('gambar/create')}}" class="btn btn-success">Tambah Gambar <i class="fas fa-plus-square"></i></a>
              <a href="{{url('cetakPegawai')}}" target="_blank" class="btn btn-primary">Cetak Data Gambar <i class="fas fa-book"></i></a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>Nama</th>
                <th>Gambar</th>

                <th>Aksi</th>
              </tr>
              @foreach($data as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td><a href="{{ asset('img/'.$item->gambar) }}" target="_blank">{{ $item->gambar }}</a></td>

                <td>
                  <a href="{{url('gambar/'.$item->id.'/edit')}}"><i class="far fa-edit"></i></a> |
                  <a href="{{url('gambar/'.$item->id)}}" onclick="return confirm('Yakin Ingin Menghapus {{ $item->nama }}?');" ><i class="far fa-trash-alt" style="color:red;"></i></a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
          <div class="card-footer">
            {{-- {{ $data->links( )}} --}}
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
