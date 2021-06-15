@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelas Tutor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kelas Tutor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Create Kelas Tutor
            </a>
        </div>

        <!-- Kelas Yang Akan Datang box -->
        <div class="card card-solid">
            <div class="card-header">
                <h3 class="card-title">Kelas Yang Akan Datang</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @if($data->count() > 0)
                    @foreach($data as $datas)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header">
                                {{ $datas->nama_kelas }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-muted text-sm"><b>Narasumber: </b> {{$datas->narasumber}}</p>
                                        <p class="text-muted text-sm"><b>Moderator: </b> {{$datas->moderator}}</p>
                                        <p class="text-muted text-sm"><b>Host: </b> {{$datas->host}}</p>
                                        <p class="text-muted text-sm"><b>Hari & Tanggal: </b> {{$datas->tanggal}}</p>
                                        <p class="text-muted text-sm"><b>Jam: </b> {{$datas->jam}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{ route('kelas.destroy', $datas->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm bg-danger delete-btn"><i
                                                class="fas fa-trash"></i></button>
                                        <a onclick="edit('{{ $datas->id }}');" class="btn btn-sm bg-yellow">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" onclick="serti('{{ $datas->id }}');" class="btn btn-sm bg-teal">
                                            <i class="fas fa-user"></i> Sertifikat
                                        </a>
                                        <a href="#" onclick="detail('{{ $datas->id }}');"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Lihat Detail
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="error-page">
                        <div class="headline text-warning">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        </div>
                        <div class="error-content">
                            <h3> Oops! Tidak Ada Data Kelas Tutor Yang Akan Datang.</h3>
                        </div>
                        <!-- /.error-content -->
                    </div>
                    @endif
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{$data->links()}}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->


        <!-- Kelas Selesai box -->
        <div class="card card-solid">
            <div class="card-header">
                <h3 class="card-title">Kelas Yang Telah Selesai</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @if($exp->count() > 0)
                    @foreach($exp as $datas)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header">
                                {{ $datas->nama_kelas }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-muted text-sm"><b>Narasumber: </b> {{$datas->narasumber}}</p>
                                        <p class="text-muted text-sm"><b>Moderator: </b> {{$datas->moderator}}</p>
                                        <p class="text-muted text-sm"><b>Host: </b> {{$datas->host}}</p>
                                        <p class="text-muted text-sm"><b>Hari & Tanggal: </b> {{$datas->tanggal}}</p>
                                        <p class="text-muted text-sm"><b>Jam: </b> {{$datas->jam}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{ route('kelas.destroy', $datas->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm bg-danger delete-btn"><i
                                                class="fas fa-trash"></i></button>
                                        <a href="#" onclick="edits('{{ $datas->id }}');" class="btn btn-sm bg-teal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('kelas.peserta', $datas->id) }}" class="btn btn-sm bg-yellow">
                                            <i class="fas fa-edit"></i> Absen
                                        </a>
                                        <a href="#" onclick="details('{{ $datas->id }}');"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Lihat Detail
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="error-page">
                        <div class="headline text-warning">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        </div>
                        <div class="error-content">
                            <h3> Oops! Tidak Ada Data Kelas Tutor Yang Telah Selesai.</h3>
                        </div>
                        <!-- /.error-content -->
                    </div>
                    @endif

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{$exp->links()}}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas Tutor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('kelas.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Kelas Tutor</label>
                                <input type="text" name="nama_kelas"
                                    class="form-control{{ $errors->has('nama_kelas') ? ' is-invalid' : '' }}"
                                    value="{{ old('nama_kelas') }}" required placeholder="Kelas Tutor">
                                @if ($errors->has('nama_kelas'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_kelas') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Narasumber</label>
                                <input type="text" name="narasumber"
                                    class="form-control{{ $errors->has('narasumber') ? ' is-invalid' : '' }}"
                                    value="{{ old('narasumber') }}" required placeholder="Narasumber">
                                @if ($errors->has('narasumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('narasumber') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Host</label>
                                <input type="text" name="host"
                                    class="form-control{{ $errors->has('host') ? ' is-invalid' : '' }}"
                                    value="{{ old('host') }}" required placeholder="Host">
                                @if ($errors->has('host'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('host') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Moderator</label>
                                <input type="text" name="moderator"
                                    class="form-control{{ $errors->has('moderator') ? ' is-invalid' : '' }}"
                                    value="{{ old('moderator') }}" required placeholder="Moderator">
                                @if ($errors->has('moderator'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('moderator') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}"
                                    value="{{ old('tanggal') }}" required>
                                @if ($errors->has('tanggal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tanggal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jam</label>
                                <input type="text" name="jam"
                                    class="form-control{{ $errors->has('jam') ? ' is-invalid' : '' }}"
                                    value="{{ old('jam') }}" required placeholder="Contoh : 08:00:00 s.d 10:00:00">
                                @if ($errors->has('jam'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jam') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Link Zoom</label>
                                <input type="text" name="link_zoom"
                                    class="form-control{{ $errors->has('link_zoom') ? ' is-invalid' : '' }}"
                                    value="{{ old('link_zoom') }}" required placeholder="Link Zoom">
                                @if ($errors->has('link_zoom'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link_zoom') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Meeting ID Zoom</label>
                                <input type="text" name="meeting_id"
                                    class="form-control{{ $errors->has('meeting_id') ? ' is-invalid' : '' }}"
                                    value="{{ old('meeting_id') }}" required placeholder="Meeting ID Zoom">
                                @if ($errors->has('meeting_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('meeting_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password Meeting Zoom</label>
                                <input type="text" name="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    value="{{ old('password') }}" required placeholder="Password Meeting Zoom">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kelas Tutor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="post" action="">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Kelas Tutor</label>
                                <input type="text" name="nama_kelas"
                                    class="form-control{{ $errors->has('nama_kelas') ? ' is-invalid' : '' }}"
                                    value="{{ old('nama_kelas') }}" id="nama_edit" required placeholder="Kelas Tutor">
                                @if ($errors->has('nama_kelas'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_kelas') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Narasumber</label>
                                <input type="text" name="narasumber"
                                    class="form-control{{ $errors->has('narasumber') ? ' is-invalid' : '' }}"
                                    value="{{ old('narasumber') }}" id="narasumber_edit" required
                                    placeholder="Narasumber">
                                @if ($errors->has('narasumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('narasumber') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Host</label>
                                <input type="text" name="host"
                                    class="form-control{{ $errors->has('host') ? ' is-invalid' : '' }}"
                                    value="{{ old('host') }}" id="host_edit" required placeholder="Host">
                                @if ($errors->has('host'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('host') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Moderator</label>
                                <input type="text" name="moderator"
                                    class="form-control{{ $errors->has('moderator') ? ' is-invalid' : '' }}"
                                    value="{{ old('moderator') }}" id="moderator_edit" required placeholder="Moderator">
                                @if ($errors->has('moderator'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('moderator') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}"
                                    value="{{ old('tanggal') }}" id="tanggal_edit" required
                                    placeholder="Contoh : Selasa, 30-Juni-2020">
                                @if ($errors->has('tanggal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tanggal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jam</label>
                                <input type="text" name="jam"
                                    class="form-control{{ $errors->has('jam') ? ' is-invalid' : '' }}"
                                    value="{{ old('jam') }}" id="jam_edit" required
                                    placeholder="Contoh : 08:00:00 s.d 10:00:00">
                                @if ($errors->has('jam'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jam') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Link Zoom</label>
                                <input type="text" name="link_zoom"
                                    class="form-control{{ $errors->has('link_zoom') ? ' is-invalid' : '' }}"
                                    value="{{ old('link_zoom') }}" id="link_edit" required placeholder="Link Zoom">
                                @if ($errors->has('link_zoom'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link_zoom') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Meeting ID Zoom</label>
                                <input type="text" name="meeting_id"
                                    class="form-control{{ $errors->has('meeting_id') ? ' is-invalid' : '' }}"
                                    value="{{ old('meeting_id') }}" id="meeting_edit" required
                                    placeholder="Meeting ID Zoom">
                                @if ($errors->has('meeting_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('meeting_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password Meeting Zoom</label>
                                <input type="text" name="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    value="{{ old('password') }}" id="password_edit" required
                                    placeholder="Password Meeting Zoom">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-detail"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted text-sm">Narasumber : <b id="narasumber"></b>
                            <p class="text-muted text-sm">Moderator : <b id="moderator"></b>
                                <p class="text-muted text-sm">Host : <b id="host"></b>
                                    <p class="text-muted text-sm">Hari & Tanggal : <b id="tgl"></b>
                                        <p class="text-muted text-sm">Jam : <b id="jam"></b>
                                            <p class="text-muted text-sm">Link Zoom : <b id="link_detail"></b>
                                                <p class="text-muted text-sm">Meeting ID : <b id="meeting_detail"></b>
                                                    <p class="text-muted text-sm">Password : <b
                                                            id="password_detail"></b>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <h5>Total Peserta</h5>
                <h5><b id="peserta"></b></h5>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-edits">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukan Materi & Link Youtube Kelas Tutor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edits" method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="tipe" value="1">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Link Youtube</label>
                                <input type="text" name="link_yt"
                                    class="form-control{{ $errors->has('link_yt') ? ' is-invalid' : '' }}"
                                    value="{{ old('link_yt') }}" id="link_yt" required placeholder="Link Youtube">
                                @if ($errors->has('link_yt'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link_yt') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Materi</label>
                                <input type="file" name="materi"
                                    class="form-control{{ $errors->has('materi') ? ' is-invalid' : '' }}"
                                    value="{{ old('materi') }}" id="materi" required>
                                @if ($errors->has('materi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('materi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-details">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-details"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted text-sm">Narasumber : <b id="narasumber_"></b>
                            <p class="text-muted text-sm">Moderator : <b id="moderator_"></b>
                                <p class="text-muted text-sm">Host : <b id="host_"></b>
                                    <p class="text-muted text-sm">Hari & Tanggal : <b id="tgl_"></b>
                                        <p class="text-muted text-sm">Jam : <b id="jam_"></b>
                                            <p class="text-muted text-sm">Link Youtube : <b id="link_yts"></b>
                                                <p class="text-muted text-sm">Materi : <a href="" id="materiug"
                                                        target="_blank">Download Materi</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <h5>Total Peserta</h5>
                <h5><b id="pesertas"></b></h5>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-serti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-detail"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edits" method="post" action="{{ route('kelas.serti') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id_form_serti">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6><b>Informasi Sertifikat</b></h6>
                            <p>1.Pastikan Menyediakan key dengan format <b>${nama}</b> di File Sertifikat</p>
                            <p>2.Pastikan Menyediakan key dengan format <b>${tgl}</b> di File Sertifikat</p>
                            <p>Contoh Sertifikat : <a href="{{ asset('assets/sertifikat2.docx') }}" target="_blank">Download</a></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sertifikat (.docx)</label>
                                <input type="file" name="sertifikat"
                                    class="form-control{{ $errors->has('sertifikat') ? ' is-invalid' : '' }}"
                                    value="{{ old('sertifikat') }}" id="sertifikat" required>
                                @if ($errors->has('sertifikat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sertifikat') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('js')
<script>
    function detail(id) {
        var url = "{{ url('/kelas') }}";
        $.ajax({
            type: 'get',
            url: url + '/' + id,
            success: function (data) {
                // console.log("price");
                console.log(data);
                $("#title-detail").text(data.kelas.nama_kelas);
                $("#narasumber").text(data.kelas.narasumber);
                $("#moderator").text(data.kelas.moderator);
                $("#host").text(data.kelas.host);
                $("#tgl").text(data.kelas.tanggal);
                $("#jam").text(data.kelas.jam);
                $("#link_detail").text(data.link_zoom);
                $("#meeting_detail").text(data.meeting_id);
                $("#password_detail").text(data.password);
                $("#peserta").text(data.peserta);

                $("#modal-detail").modal('show');
            },
            error: function () {

            }
        });
    }

    function edit(id) {
        var url = "{{ url('/kelas') }}";
        $.ajax({
            type: 'get',
            url: url + '/' + id,
            success: function (data) {
                // console.log("price");
                console.log(data);
                $("#nama_edit").val(data.kelas.nama_kelas);
                $("#narasumber_edit").val(data.kelas.narasumber);
                $("#moderator_edit").val(data.kelas.moderator);
                $("#host_edit").val(data.kelas.host);
                $("#tanggal_edit").val(data.kelas.tanggal);
                $("#jam_edit").val(data.kelas.jam);
                $("#link_edit").val(data.link_zoom);
                $("#meeting_edit").val(data.meeting_id);
                $("#password_edit").val(data.password);
                $("#form-edit").attr('action', url + '/' + id);

                $("#modal-edit").modal('show');
            },
            error: function () {

            }
        });
    }

    function edits(id) {
        var url = "{{ url('/kelas') }}";
        $.ajax({
            type: 'get',
            url: url + '/' + id,
            success: function (data) {
                // console.log("price");
                console.log(data);
                $("#form-edits").attr('action', url + '/' + id);

                $("#modal-edits").modal('show');
            },
            error: function () {

            }
        });
    }

    function details(id) {
        var url = "{{ url('/kelas') }}";
        var materiu = "{{ url('public/upload') }}";
        $.ajax({
            type: 'get',
            url: url + '/' + id,
            success: function (data) {
                // console.log("price");
                console.log(data);
                $("#title-details").text(data.kelas.nama_kelas);
                $("#narasumber_").text(data.kelas.narasumber);
                $("#moderator_").text(data.kelas.moderator);
                $("#host_").text(data.kelas.host);
                $("#tgl_").text(data.kelas.tanggal);
                $("#jam_").text(data.kelas.jam);
                $("#pesertas").text(data.peserta);
                if (data.link_yt != null) {
                    $("#link_yts").text(data.link_yt);
                } else {
                    $("#link_yts").text('Link Youtube Tidak Tersedia');
                }

                if (data.materi != null) {
                    $("#materiug").attr('href', materiu + '/' + data.materi).text('Download Materi');
                } else {
                    $("#materiug").text('Materi Tidak Tersedia');
                }

                $("#modal-details").modal('show');
            },
            error: function () {

            }
        });
    }

    function serti(id) {
        var url = "{{ url('/kelas') }}";
        var materiu = "{{ url('public/upload') }}";
        $("#id_form_serti").val(id);
        $("#modal-serti").modal('show');
    }

    $('.delete-btn').on('click', function (e) {
        e.preventDefault();
        swal({
                title: "Menghapus Kelas!",
                text: "Apakah Anda Yakin ?",
                icon: "warning",
                dangerMode: true,
                buttons: {
                    cancel: "Tidak",
                    confirm: "Ya",
                },
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).closest("form").submit();
                }
            });
    });

</script>
@endsection
