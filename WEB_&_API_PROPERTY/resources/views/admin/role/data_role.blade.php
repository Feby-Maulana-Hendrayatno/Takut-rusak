@extends("layouts.template")

@section('title')
  Data Role
@stop

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/admin/role/tambah/') }}">
            {{ csrf_field() }}
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-plus"></span> Tambah Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_role" name="nama_role" placeholder="Role">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm">
                        <span class="fa fa-plus"></span>
                        Tambah
                    </button>
                    <button type="reset" class="btn btn-default btn-sm float-right">
                        <span class="fa fa-refresh"></span>
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Data Role
                </h3>
            </div>
            <div class="card-body">
                <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach($data_role as $role)
                        <tr>
                            <td class="text-center">{{ ++$no }}.</td>
                            <td class="text-center">{{ $role->nama_role }}</td>
                            <td class="text-center">
                                <a href="{{ url('/admin/role/edit') }}/{{ $role->id }}" class="btn btn-warning btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <form method="POST" action="{{ url('/admin/role/hapus') }}" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $role->id }}">
                                    <button onclick="return confirm('Ingin di Hapus ?')" type="submit" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
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

@endsection