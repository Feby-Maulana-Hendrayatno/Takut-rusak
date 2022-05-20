
@php
use Carbon\Carbon;
@endphp
@extends("layouts.template")

@section("app_title", "Informasi Login")

@section("content")


<div class="clearfix"></div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>
                <i class="fa fa-book"></i> @yield("app_title")
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box table-responsive">
                        <table id="table-1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Login Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_login as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('dddd, D MMMM Y H:mm:s') }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section("app_scripts")

<script>
$(document).ready(function() {
    $("#table-1").dataTable();
})
</script>

@endsection
