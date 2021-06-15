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
                <div class="col-lg-12">
                    <div class="error-page">
                        <h3>Ooopps :(</h3>
                        <h5>Anda Belum Terdaftar !</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area END -->
@endsection
@section('js')
@endsection
