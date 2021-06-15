@extends('layouts.app')

@section('content')
<!-- Start -->
<!-- inner page banner -->
<div class="page-banner ovbl-dark"
    style="background-image: url('{{asset('/assets/home/images/background/bg3.jpg')}}');">
    <div class="container">
        <div class="page-banner-entry">
            <h1 class="text-white">Data Kelas & Peserta</h1>
        </div>
    </div>
</div>
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="#">Home</a></li>
            <li>Data Kelas & Peserta</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb row END -->

<!-- inner page banner -->
<div class="page-banner contact-page section-sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 m-b30">
                <div class="bg-primary text-white contact-info-bx">
                    <h2 class="m-b10 title-head"><span>{{$link->kelas['nama_kelas']}}</span></h2>
                    <div class="widget widget_getintuch">
                        <ul>
                            <li>Narasumber : {{$link->kelas['narasumber']}}</li>
                            <li>Moderator : {{$link->kelas['moderator']}}</li>
                            <li>Host : {{$link->kelas['host']}}</li>
                            <li>Link Zoom : {{$link['link_zoom']}}</li>
                            <li>Meeting ID : {{$link['meeting_id']}}</li>
                            <li>Password : {{$link['password']}}</li>
                            <li>Tanggal : {{$link->kelas['tanggal']}}</li>
                            <li>Jam : {{$link->kelas['jam']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <form class="contact-bx ajax-form"
                    action="http://educhamp.themetrades.com/demo/assets/script/contact.php">
                    <div class="ajax-message"></div>
                    <div class="heading-bx left">
                        <h2 class="title-head">Data <span>Peserta</span></h2>
                    </div>
                    <div class="row placeani">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Lengkap & Gelar</label>
                                <input type="text" name="nama"
                                    class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                    value="{{ $data->nama }}" readonly required placeholder="Nama Lengkap & Gelar">
                                @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ $data->email }}" readonly required placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip"
                                    class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}"
                                    value="{{ $data->nip }}" readonly required placeholder="NIP">
                                @if ($errors->has('nip'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nip') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>NIDN</label>
                                <input type="text" name="nidn"
                                    class="form-control{{ $errors->has('nidn') ? ' is-invalid' : '' }}"
                                    value="{{ $data->nidn }}" readonly required placeholder="NIDN">
                                @if ($errors->has('nidn'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nidn') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Fakultas</label>
                                <input type="text" name="fakultas"
                                    class="form-control{{ $errors->has('fakultas') ? ' is-invalid' : '' }}"
                                    value="{{ $data->fakultas }}" readonly placeholder="Fakultas" required>
                                @if ($errors->has('fakultas'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fakultas') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" name="prodi"
                                    class="form-control{{ $errors->has('prodi') ? ' is-invalid' : '' }}"
                                    value="{{ $data->prodi }}" readonly required placeholder="Program Studi">
                                @if ($errors->has("prodi"))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first("prodi") }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="no_hp"
                                    class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}"
                                    value="{{ $data->no_hp }}" readonly required placeholder="No HP">
                                @if ($errors->has('no_hp'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_hp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No WA</label>
                                <input type="text" name="no_wa"
                                    class="form-control{{ $errors->has('no_wa') ? ' is-invalid' : '' }}"
                                    value="{{ $data->no_wa }}" readonly placeholder="Kosongkan Jika Sama Dengan No HP">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_wa') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- End -->
@endsection
@section('js')
@endsection
