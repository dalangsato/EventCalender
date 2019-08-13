@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Ruangan
                </div>

                <div class="card-body">
                    <form action="{{ route('addRuang') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruang" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
