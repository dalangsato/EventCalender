@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Gedung
                </div>

                <div class="card-body">
                    <form action="{{ route('addGedungSave') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Gedung</label>
                            <input type="text" class="form-control" name="nama_building" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
