@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Ruangan
                </div>

                <div class="card-body">
                    <form action="{{ route('editRuangSave') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $ruang->id }}">
                        <div class="form-group">
                            <label for="">Nama Ruangan</label>
                            <input type="text" class="form-control" name="ruang_name" value="{{ $ruang->ruang_name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
