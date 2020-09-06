@extends('layouts.app')
@section('title', 'Dashboard')
@section('breadcrumb')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $surat }}</h3>

            <p>Data Surat</p>
          </div>
          <div class="icon">
            <i class="fas fa-file-signature"></i>
          </div>
          <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $jenis }}</h3>

            <p>Jenis Surat</p>
          </div>
          <div class="icon">
            <i class="fas fa-file-signature"></i>
          </div>
          <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $penduduk }}</h3>

            <p>Data Penduduk</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $pengguna }}</h3>

            <p>Pengguna</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection