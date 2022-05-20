@extends("layouts.template")

@section('title')
  Data Akun
@stop

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/admin/users/tambah/') }}">
            @csrf
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-plus"></span> Tambah Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" >Akun</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Passwords">
                    </div>
                    <div class="form-group">
                        <label for="id"> Role </label>
                        <select required class="form-control" style="width: 100%;" name="id_role">
                            <option value="">- Pilih -</option>
                            @foreach($data_role as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->nama_role }}
                            </option>
                            @endforeach
                        </select>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Akun</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                     @php $no = 0 @endphp
                     @foreach($data_akun as $akun)
                     <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $akun->name }}</td>
                        <td>{{ $akun->email }}</td>
                        <td>
                            @if (empty($akun->getRole->nama_role))
                                <b>
                                    <i>
                                        NULL
                                    </i>
                                </b>
                            @else
                            {{$akun->getRole->nama_role}}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/admin/users/edit') }}/{{ $akun->id }}" class="btn btn-warning btn-sm">
                                <span class="fa fa-edit"></span>
                            </a>
                            <form method="POST" action="{{ url('/admin/users/hapus') }}" style="display: inline;">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $akun->id }}">
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
