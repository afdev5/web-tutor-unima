@extends('layouts.app')

@section('content')
<!-- inner page banner -->
<div class="page-banner ovbl-dark"
    style="background-image: url('{{asset('/assets/home/images/background/bg3.jpg')}}');">
    <div class="container">
        <div class="page-banner-entry">
            <h1 class="text-white">Pencarian Link Kelas Daring UNIMA</h1>
        </div>
    </div>
</div>
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="#">Home</a></li>
            <li>Pencarian Link Kelas Daring UNIMA</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb row END -->
<!-- inner page banner END -->
<div class="content-block">
    <!-- About Us -->
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                    <div class="profile-bx text-center">

                        <div class="profile-tabnav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#exp">Kelas Telah Selesai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kelas">Kelas Akan Datang</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
                    <div class="profile-content-bx">
                        <div class="tab-content">
                            <div class="tab-pane active" id="exp">
                                <div class="profile-head">
                                    <h3>Kelas Yang Telah Selesai</h3>
                                </div>
                                <div class="courses-filter">
                                    <div class="clearfix">
                                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                            
                                            @if($exp->count() <= 0)
                                                <p>Anda Tidak Memiliki Kelas Tutor Daring Yang Telah Selesai.</p>
                                            @else
                                            @foreach($exp as $datas)
                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                <div class="recent-news">
                                                    <div class="info-bx">
                                                        <h5 class="post-title text-center">
                                                            {{$datas->nama_kelas}}</h5>
                                                        <p class="text-center">Narasumber</p>
                                                        <p class="text-center"><b>{{$datas->narasumber}}</b></p>
                                                        <hr />
                                                        <p class="text-center">Nama</p>
                                                        <p class="text-center"><b>{{$datas->nama}}</b></p>
                                                        <p class="text-center">Fakultas</p>
                                                        <p class="text-center"><b>{{$datas->fakultas}}</b></p>
                                                        <p class="text-center">Program Studi</p>
                                                        <p class="text-center"><b>{{$datas->prodi}}</b></p>
                                                        <hr />
                                                        <ul class="media-post">
                                                            <li><a href="#"><i
                                                                        class="fa fa-calendar"></i>{{$datas->tanggal}}</a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                        class="fa fa-clock-o"></i>{{$datas->jam}}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="text-center">
                                                            @if($datas->materi == null)
                                                            <a href="#" class="btn outline black">Materi</a>
                                                            @else
                                                            <a href="{{ url('public/upload/'.$datas->materi) }}" class="btn outline black">Materi</a>
                                                            @endif
                                                            <a href="#" class="btn outline black">Sertifikat</a>

                                                        </div>
                                                        <hr />
                                                        <div class="text-center">
                                                            <a href="#" class="btn" onclick="details('{{ $datas->id_kelas }}');">Detail Kelas</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="kelas">
                                <div class="profile-head">
                                    <h3>Kelas Yang Akan Datang</h3>
                                </div>
                                <div class="courses-filter">
                                    <div class="clearfix">
                                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                            
                                            @if($kelas->count() <= 0)
                                                <p>Anda Tidak Memiliki Kelas Tutor Daring Yang Akan Datang.</p>
                                            @else
                                            @foreach($kelas as $datas)
                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                <div class="recent-news">
                                                    <div class="info-bx">
                                                        <h5 class="post-title text-center">
                                                            {{$datas->nama_kelas}}</h5>
                                                        <p class="text-center">Narasumber</p>
                                                        <p class="text-center"><b>{{$datas->narasumber}}</b></p>
                                                        <hr />
                                                        <p class="text-center">Nama</p>
                                                        <p class="text-center"><b>{{$datas->nama}}</b></p>
                                                        <p class="text-center">Fakultas</p>
                                                        <p class="text-center"><b>{{$datas->fakultas}}</b></p>
                                                        <p class="text-center">Program Studi</p>
                                                        <p class="text-center"><b>{{$datas->prodi}}</b></p>
                                                        <hr />
                                                        <ul class="media-post">
                                                            <li><a href="#"><i
                                                                        class="fa fa-calendar"></i>{{$datas->tanggal}}</a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                        class="fa fa-clock-o"></i>{{$datas->jam}}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="text-center">
                                                        <a href="{{ route('daftar.hasil', ['id'=>$datas->peserta_id,'tipe'=>'0']) }}" class="btn">Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area END -->
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
</script>
@endsection
