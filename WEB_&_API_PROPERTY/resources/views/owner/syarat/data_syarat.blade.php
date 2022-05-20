@extends("layouts.template_owner")

@section('title')
Data Deskripsi Rumah
@stop

@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Syarat</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/owner/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item active"> Syarat </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if(session("tambah"))
            <div class="alert alert-success" role="alert">
                {{  session("tambah")  }}
            </div>
            @elseif(session("update"))
            <div class="alert alert-warning" role="alert">
                {{ session("update") }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <button type="button" class="btn btn-success col fileinput-button dz-clickable" data-toggle="modal" data-target="#modal-default" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Syarat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 0 @endphp
                            @foreach($syarat as $desk)
                            <tr>
                                <td class="text-center">{{ ++$no }}</td>
                                <td>{{ $desk->syarat }}</td>
                                <td class="text-center">
                                    <button onclick="editSyarat({{ $desk->id }})" type="button" class="btn btn-success text-white btn-sm" data-toggle="modal" data-target="#modal-default-edit" title="Detail Data">
                                        <i class="fa fa-clipboard"> Edit </i>
                                    </button>
                                    <form method="POST" action="{{ url('/owner/syarat/hapus') }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $desk->id }}">
                                        <button onclick="return confirm('Yakin ? Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/owner/syarat/tambah_syarat') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rsyarat"> Syarat </label>
                        <input type="text" class="form-control" name="syarat" placeholder="Masukkan Syarat - Syarat yang diperlukan">
                    </div>
                    {{-- <div class="form-group">
                        <label for="syarat"> Syarat </label>
                        <textarea class="form-control" id="syarat" name="syarat" rows="5" placeholder="Masukkan Syarat - Syarat yang diperlukan" ></textarea>
                    </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-success btn-flat bt-sm" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END -->


<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/owner/syarat/simpan') }}">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END -->

@endsection

@section("scripts_js")

<script type="text/javascript">
    function editSyarat(id)
    {
        $.ajax({
            url : "{{ url('/owner/syarat/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }
</script>

@endsection
