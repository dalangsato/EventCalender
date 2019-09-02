@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Pilih Gedung

                    <div style="float:right;">
                        <a href="{{ route('addGedung') }}" class="btn btn-sm btn-success">Tambah Gedung</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gedung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($builds as $build)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $build->building_name }}</td>
                                        <td width="35%">
                                            <a href="{{ route('detailGedung', $build->id) }}" class="btn btn-primary mr">Detail</a>
                                            <a href="{{ route('editGedung', $build->id) }}" class="btn btn-secondary mr">Ubah</a>
                                            <a href="{{ route('deleteGedung', $build->id) }}" class="btn btn-danger mr">Hapus</a>
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
</div>
@endsection

@section('js')
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> --}}
    <script>
        $(document).ready(function(){
            $("table").DataTable();
        });
    </script>
@endsection
