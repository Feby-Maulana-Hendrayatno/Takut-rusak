@extends("layouts.template_owner")


@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Tambah Deskripsi </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/owner/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/owner/deskripsi_rumah/deskripsi') }}"> Deskripsi Rumah</a>
                </li>
                <li class="breadcrumb-item active"> Tambah Deskripsi </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/owner/deskripsi_rumah/deskripsi') }}">
                    <h3 class="card-title">
                        <span class="btn btn-secondary col fileinput-button dz-clickable">
                            <i class="fa fa-reply"></i>
                            <span >Kembali</span>
                        </span>
                    </h3>
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/owner/deskripsi_rumah/tambah_data') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" id="" placeholder="Masukan Type Rumah" required>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" id="" placeholder="Masukan harga Rumah" required>
                            <div class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kusen</label>
                            <input type="text" name="kusen" class="form-control" id="" placeholder="Jenis kusen Rumah" required>
                        </div>
                        <div class="form-group">
                            <label>Pintu</label>
                            <input type="text" name="pintu" class="form-control" id="" placeholder="Jenis Pintu Rumah" required>
                        </div>
                        <div class="form-group">
                            <label>Jendela</label>
                            <input type="text" name="jendela" class="form-control" id="" placeholder=" Jenis Jendela Rumah"  required>
                        </div>
                        <div class="form-group">
                            <label>Plafond</label>
                            <input type="text" name="plafond" class="form-control" id="" placeholder=" Jenis Plafond Rumah"  required>
                        </div>
                        <div class="form-group">
                            <label>Air</label>
                            <input type="text" name="air" class="form-control" id="" placeholder=" Jenis Air yabg digunakan"  required>
                        </div>
                        <div class="form-group">
                            <label>Listrik</label>
                            <input type="text" name="listrik" class="form-control" id="" placeholder="Besaran Watt yang digunakan"  required>
                        </div>
                        <div class="form-group">
                            <label>Pondasi</label>
                            <input type="text" name="pondasi" class="form-control" id="" placeholder=" Jenis Pondasi Rumah"  required>
                        </div>
                        <div class="form-group">
                            <label>Dinding</label>
                            <input type="text" name="dinding" class="form-control" id="" placeholder=" Jenis Dinding Rumah"  required>
                        </div>
                        <div class="form-group">
                            <label>Lantai</label>
                            <input type="text" name="lantai" class="form-control" id="" placeholder=" Jenis Lantai Rumah"  required>
                        </div>
                        <div class="form-group">
                            <label>Atap</label>
                            <input type="text" name="atap" class="form-control" id="" placeholder=" Jenis Atap Rumah"  required>
                        </div>
                        <div class="form-group">
                            <label>WC</label>
                            <input type="text" name="wc" class="form-control" id="" placeholder=" Jenis WC yang digunakan"  required>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
