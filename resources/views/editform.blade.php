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
<form action="{{action('EventController@update',$id)}}" method="POST">
    {{csrf_field() }}
    <div class="container">
        <div class="jumbotron" style="margin-top: 5%">
        <h1>Update Your Data</h1>
        <hr>
            <input type="hidden" name="_method" value="UPDATE">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Name" value="{{$events->title}}">
        </div>
        <div class="form-group">
            <label>COLOR</label>
            <input type="color" class="form-control" name="color" value="{{$events->color}}">
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="datetime-local" class="form-control" name="start_date" value="{{$events->start_date}}">
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="datetime-local" class="form-control" name="end_date" value="{{$events->end_date}}">
        </div>
        {{ method_field('PUT') }}
        <button type="submit" name="submit" class="btn btn-success"> Update</button>
        </div>
    </div>
</form>
</body>
</html>