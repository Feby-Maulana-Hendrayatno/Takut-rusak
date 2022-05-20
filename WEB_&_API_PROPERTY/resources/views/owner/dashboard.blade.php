@extends("layouts.template_owner")

@section("header")

<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0"> Dashboard </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
</div>

@endsection

@section("content")

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-4 col-5">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          {{-- <h3>{{ $jumlah_pelatih }}</h3> --}}
          <p>Jumlah Property</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-5">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          {{-- <h3>{{ $jumlah_murid}}</h3> --}}
          <p>Jumlah Rumah</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-5">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          {{-- <h3>{{ $jumlah_kategori_tari}}</h3> --}}
          <p>Pengajuan Syarat yg diterima</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>

@stop
