@extends('layouts.app')

@section('content')
<!-- Start -->
<!-- Main Slider -->
<!-- Main Slider -->
<div class="section-area section-sp1 ovpr-dark bg-fix online-cours"
    style="background-image: url('{{asset('/assets/home/images/background/bg3.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center text-white">
                <h2>Selamat Datang di Situs Pendaftaran Webinar</h2>
                <h4>Universitas Negeri Manado</h4><br>
                <h5>Masukan Email Untuk Mencari Link Webinar UNIMA</h5>
                <form class="cours-search" method="post" action="{{ route('cari') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email Anda ?	">
                        <div class="input-group-append">
                            <button class="btn" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mw800 m-auto">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="cours-search-bx m-b30">
                        <div class="icon-box">
                            <h3><i class="ti-book"></i><span class="counter">{{$data['total']}}</span></h3>
                        </div>
                        <span class="cours-search-text">Total Webinar</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="cours-search-bx m-b30">
                        <div class="icon-box">
                            <h3><i class="ti-check-box"></i><span class="counter">{{$data['exp']}}</span></h3>
                        </div>
                        <span class="cours-search-text">Telah Selesai</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="cours-search-bx m-b30">
                        <div class="icon-box">
                            <h3><i class="ti-time"></i><span class="counter">{{$data['kelas']}}</span></h3>
                        </div>
                        <span class="cours-search-text">Akan Datang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-block">
    <!-- Kelas Akan Datang -->
    <div id="coming" class="section-area section-sp2 popular-courses-bx">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    <h2 class="title-head">Kelas Webinar <span>Yang Akan Datang</span></h2>
                    <p>Jangan sampai ketinggalan mengikuti Kelas Webinar UNIMA, Silahkan Daftar, Catat Tanggal &
                        Waktu Kelas Berlangsung!</p>
                </div>
            </div>
            <div class="row">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                    @if($kelas->count() <= 0)
                    <div class="error-page">
                        <h3>Ooopps :(</h3>
                        <h5>Tidak Ada Data Kelas.</h5>
                    </div>
                    @else
                    @foreach($kelas as $data)
                    <div class="item">
                        <div class="post action-card">
                            <div class="recent-news">
                                <div class="info-bx">
                                    <h5 class="post-title text-center">{{$data->nama_kelas}}</h5>
                                    <hr />
                                    <p class="text-center">Narasumber</p>
                                    <p class="text-center"><b>{{$data->narasumber}}</b></p>
                                    <hr />
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{$data->tanggal}}</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i>{{$data->jam}}</a></li>
                                    </ul>
                                    <div class=" text-center">
                                        <a href="#" class="btn"
                                            onclick="daftar('{{ $data->id }}', '{{ $data->nama_kelas }}');">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Kelas Akan Datang END -->
    <!-- Cara Pendaftaran -->
    <div id="pendaftaran" class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center"
        style="background-image: url('{{asset('/assets/home/images/background/bg3.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="join-content-bx text-white">
                        <h2>Cara Mendaftar Kelas Webinar <br> Universitas Negeri Manado</h2><br>
                        <p><span>1.</span> Pilih Kelas Webinar</p>
                        <p><span>2.</span> Masukan Data - Data Yang Diperlukan</p>
                        <p><span>3.</span> Lihat Link Zoom, Meeting ID & Password Kelas yang dipilih</p>
                        <a href="#" class="btn button-md">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cara Pendaftaran END -->
    <!-- Kelas Selesai -->
    <div id="exp" class="section-area section-sp2 popular-courses-bx">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    <h2 class="title-head">Kelas Webinar <span>Yang Telah Selesai</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                    @if($exp->count() <= 0)
                    <div class="error-page">
                        <h3>Ooopps :(</h3>
                        <h5>Tidak Ada Data Kelas.</h5>
                    </div>
                    @else
                    @foreach($exp as $data)
                    <div class="item">
                        <div class="post action-card">
                            <div class="recent-news">
                                <div class="info-bx">
                                    <h5 class="post-title text-center">{{$data->nama_kelas}}</h5>
                                    <hr />
                                    <p class="text-center">Narasumber</p>
                                    <p class="text-center"><b>{{$data->narasumber}}</b></p>
                                    <hr />
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{$data->tanggal}}</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i>{{$data->jam}}</a></li>
                                    </ul>
                                    <div class=" text-center">
                                        <a href="#" class="btn-link" onclick="details('{{ $data->id }}');">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Kelas Akan Datang END -->
</div>
<!-- Modal Daftar -->
<div class="modal fade" id="modal-daftar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('daftar.post') }}">
                    @csrf
                    <input type="hidden" name="id_kelas" id="id_kelas">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lengkap & Gelar</label>
                                <input type="text" name="nama"
                                    class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                    value="{{ old('nama') }}" required placeholder="Nama Lengkap & Gelar">
                                @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip"
                                    class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}"
                                    value="{{ old('nip') }}" required placeholder="NIP">
                                @if ($errors->has('nip'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nip') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIDN</label>
                                <input type="text" name="nidn"
                                    class="form-control{{ $errors->has('nidn') ? ' is-invalid' : '' }}"
                                    value="{{ old('nidn') }}" required placeholder="NIDN">
                                @if ($errors->has('nidn'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nidn') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fakultas</label>
                                <input type="text" name="fakultas"
                                    class="form-control{{ $errors->has('fakultas') ? ' is-invalid' : '' }}"
                                    value="{{ old('fakultas') }}" placeholder="Fakultas" required>
                                @if ($errors->has('fakultas'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fakultas') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" name="prodi"
                                    class="form-control{{ $errors->has('prodi') ? ' is-invalid' : '' }}"
                                    value="{{ old('prodi') }}" required placeholder="Program Studi">
                                @if ($errors->has("prodi"))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first("prodi") }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="no_hp"
                                    class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}"
                                    value="{{ old('no_hp') }}" required placeholder="No HP">
                                @if ($errors->has('no_hp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_hp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No WA</label>
                                <input type="text" name="no_wa"
                                    class="form-control{{ $errors->has('no_wa') ? ' is-invalid' : '' }}"
                                    value="{{ old('no_wa') }}" placeholder="Kosongkan Jika Sama Dengan No HP">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_wa') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <h5 class="modal-title">Pendaftaran <b id="topik"></b></h5>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal daftar end -->

<!-- Modal Detail -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="bg-primary text-white contact-info-bx">
                    <h2 class="m-b10 title-head"><span id="kelas_detail"></span></h2>
                    <div class="widget widget_getintuch">
                        <ul>
                            <li>Narasumber : <span id="narasumber_detail"></span></li>
                            <li>Moderator : <span id="moderator_detail"></span></li>
                            <li>Host : <span id="host_detail"></span></li>
                            <li>Link Youtube : <span id="link_detail"></span></li>
                            <li>Materi : <a href="#" id="materi_detail" class="text-white"></a></li>
                            <li>Tanggal : <span id="tgl_detail"></span></li>
                            <li>Jam : <span id="jam_detail"></span></li>
                        </ul>
                    </div>
                    <h2 class="m-b10 title-head">Total Peserta <span id="peserta_detail"></span></h2>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal detail end -->
@endsection
@section('js')
<script>
    function details(id) {
        var url = "{{ url('/kelas') }}";
        var materiu = "{{ url('public/upload') }}";
        $.ajax({
            type: 'get',
            url: url + '/' + id,
            success: function (data) {
                // console.log("price");
                console.log(data);
                $("#kelas_detail").text(data.kelas.nama_kelas);
                $("#narasumber_detail").text(data.kelas.narasumber);
                $("#moderator_detail").text(data.kelas.moderator);
                $("#host_detail").text(data.kelas.host);
                $("#tgl_detail").text(data.kelas.tanggal);
                $("#jam_detail").text(data.kelas.jam);
                $("#peserta_detail").text(data.peserta);
                if(data.link_yt != null){
                    $("#link_detail").text(data.link_yt);
                } else {
                    $("#link_detail").text('Link Youtube Tidak Tersedia');
                }
                
                if(data.materi != null){
                    $("#materi_detail").attr('href', materiu + '/' + data.materi).text('Download Materi');
                } else {
                    $("#materi_detail").text('Materi Tidak Tersedia');
                }
                
                $("#modal-detail").modal('show');
            },
            error: function () {

            }
        });
    }


    function daftar(id, topik) {
        $("#topik").text(topik);
        $("#id_kelas").val(id);
        $("#modal-daftar").modal('show');
    }

</script>
@endsection
