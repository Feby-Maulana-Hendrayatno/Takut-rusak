@extends("layouts.template")

@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Pelatih </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item active"> Data Pelatih </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("alerts")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session("tambah_data"))
		<script>
			Swal.fire(
			'Data Berhasil di Tambahkan',
			'',
			'success'
			)
		</script>
		@elseif(session("update"))
		<script>
			Swal.fire(
			'Data Berhasil di Update',
			'',
			'success'
			)
		</script>
	@endif
@stop

@section('title')
  Data Pelatih
@stop

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
				<a href="{{ url('/admin/pelatih/tambah_data') }}">
					<h3 class="card-title">
						<span class="btn btn-success col fileinput-button dz-clickable">
                        <i class="fas fa-plus"></i>
                        <span >Data Pelatih</span>
                    	</span>
					</h3>
				</a>
				</div>
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama</th>
								<th class="text-center">Jenis Kelamin</th>
								<th class="text-center">No HP</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 0 @endphp
							@foreach($data_pelatih as $dp)
							<tr>
								<td class="text-center">{{ ++$no }}</td>
								<td>{{ $dp->nama_pelatih }}</td>
								<td class="text-center">
									@if($dp->jenis_kelamin == "L")
										Laki - Laki
									@elseif($dp->jenis_kelamin == "P")
										Perempuan
									@else
										Tidak Ada
									@endif
								</td>
								<td class="text-center">{{ $dp->no_hp }}</td>
								<td class="text-center">
									<a href="/admin/pelatih/detail/{{ $dp->id }}" class="btn btn-success text-white btn-sm">
										<i class="fas fa-clipboard"></i> Detail
									</a>
									<a href="/admin/pelatih/edit/{{ $dp->id }}" class="btn btn-warning btn-sm">
										<i class="fas fa-edit"></i> Edit
									</a>
									<form method="POST" action="{{ url('/admin/pelatih/hapus') }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="foto" value="{{  $dp->foto }}">
                                        <input type="hidden" name="id" value="{{ $dp->id }}">
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
@endsection
