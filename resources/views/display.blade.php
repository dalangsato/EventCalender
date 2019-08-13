<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron"></div>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead">
                <tr class="warning">
                    <th>id</th>
                    <th>title</th>
                    <th>Color</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>update / edit</th>
                    <th>Delete</th>               
                </tr>
            </thead>
            @foreach ($events as $event)
            <tbody>
                <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->color}}</td>
                <td>{{$event->start_date}}</td>
                <td>{{$event->end_date}}</td>
                <th><a href="{{ route('edit', $event->id) }}" class="btn btn-success">
                        Edit</a>
                    </th>
                <th>
                <form method="POST" action="{{ route('delete', $event->id) }}">
                @csrf
                <input type="hidden" name="_method" value="Delete">
                <button type="submit" class="btn btn-danger">
                   Delete</button>
                </form>
                </th>
                </tr>
            </tbody>
                
            @endforeach
        </table>
    </div>
</body>
</html>