@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Absen Peserta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Webinar</a></li>
                        <li class="breadcrumb-item active">Absen Peserta</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Peserta {{$kelas->nama_kelas}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $datas)
                                    <tr>
                                        <td>{{$datas['nama']}}</td>
                                        <td>{{$datas['email']}}</td>
                                        <td>{{$datas['fakultas']}}</td>
                                        <td>{{$datas['prodi']}}</td>
                                        <td>
                                            @if($datas->status == '0')
                                            <input type="checkbox" id="absen" data-toggle="toggle" data-on="Hadir" data-off="Absen">
                                            @else
                                            <input type="checkbox" id="absen" data-toggle="toggle" data-on="Hadir" data-off="Absen" checked>
                                            @endif
                                        </td>
                                        <input type="hidden" id="users" value="{{$datas['id']}}">
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('js')
<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "scrollCollapse": true,
        });
        $('#absen').on("change", function(){
            var value;
            var id = $('#users').val();
            var url = "{{ url('/hadir') }}";
            if(document.getElementById("absen").checked) {
                value = '1';
            } else {
                value = '0';
            }
            $.ajax({
                type: 'get',
                url: url + '-' + id + '-' + value,
                success: function (data) {
                    // console.log("price");
                    console.log(data);
                },
                error: function () {

                }
            });
        })

    });

</script>
@endsection
