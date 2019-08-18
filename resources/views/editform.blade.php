<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<form action="{{ route('update') }}" method="POST">
    @csrf
    <div class="container">
        <div class="jumbotron" style="margin-top: 5%">
        <h1>Update Your Data</h1>
        <hr>
        <input type="hidden" name="id" value="{{ $events->id }}">
        <input type="hidden" name="ruang_id" value="{{ $events->ruang_id }}">
        <div class="form-group">
            <label>Meeting Name</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Meeting Name" value="{{$events->title}}">
        </div>
        <div class="form-group">
            <label for="">PIC Name</label>
            <input type="text" class="form-control" name="pic" placeholder="Enter PIC Name" value="{{ $events->pic }}">
        </div>
        <div>
            <label for="institusion">Ruangan</label>
                <select name="ruang_id" id="ruang_id" class="form-control">
                    <option value="" selected disabled>{{$events->ruang_id}}</option>
                    {{-- @foreach ($events as $event )
                        <option value="{{ $event->id }}">{{ $event->ruang_id }} - {{ $attend->bagian->name }}</option>
                    @endforeach --}}
                </select>
        </div>
        <div class="form-group">
            <label>COLOR</label>
            <input type="color" class="form-control" name="color" value="{{$events->color}}">
        </div>
        <div class="form-group">
            <label for="">Start Date</label>
            <input type="text" class="form-control" name="start_date" value="{{ $events->start_date }}" readonly>
        </div>
        <div class="form-group">
            <label>New Start Date</label>
            <input type="datetime-local" class="form-control" name="start_date_new">
        </div>
        <div class="form-group">
            <label for="">End Date</label>
            <input type="text" class="form-control" name="end_date" value="{{ $events->end_date }}" readonly>
        </div>
        <div class="form-group">
            <label>New End Date</label>
            <input type="datetime-local" class="form-control" name="end_date_new">
        </div>
        <button name="submit" class="btn btn-success"> Update</button>
        </div>
    </div>
</form>
</body>
</html>