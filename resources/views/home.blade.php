@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Pilih Ruangan

                    <div style="float:right;">
                        <a href="{{ route('addRuang') }}" class="btn btn-sm btn-success">Add Ruangan</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($ruangs as $ruang)
                        <a href="{{ route('events', $ruang->id) }}" class="btn btn-block btn-primary mr">{{ $ruang->ruang_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
