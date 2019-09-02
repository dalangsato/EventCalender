@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Lantai
                </div>

                <div class="card-body">
                    <form action="{{ route('editLantaiSave') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $floor->id }}">
                        <div class="form-group">
                            <label for="">Nama Lantai</label>
                            <input type="text" class="form-control" name="floor_name" value="{{ $floor->floor_name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
