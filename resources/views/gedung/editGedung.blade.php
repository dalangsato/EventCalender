@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Gedung
                </div>

                <div class="card-body">
                    <form action="{{ route('editGedungSave') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $gedung->id }}">
                        <div class="form-group">
                            <label for="">Nama Gedung</label>
                            <input type="text" class="form-control" name="nama_building" value="{{ $gedung->building_name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
