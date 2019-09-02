@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Pilih Ruangan

                    <div style="float:right;">
                        <a href="{{ route('addRuang', $id) }}" class="btn btn-sm btn-success">Tambah Ruang</a>
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
                                    <th>Nama Ruangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruangs as $ruang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ruang->ruang_name }}</td>
                                        <td width="35%">
                                            <a href="{{ route('events', $ruang->id) }}" class="btn btn-primary mr">Detail</a>
                                            <a href="{{ route('editRuang', $ruang->id) }}" class="btn btn-secondary mr">Edit</a>
                                            <a href="{{ route('deleteRuang', $ruang->id) }}" class="btn btn-danger mr">Delete</a>
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
