<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        .mb-10 {
            margin-bottom: 10px;
        }
        
        .fr {
            float: right;
        }
    </style>
</head>
<body>
    <div calss="container">
        <div class="jumbotron">
            <div calss="row">  
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (\Session::has('success'))
                <div class="alert alert-success">
                <p>{{\Session::get('success' )}}</p>
                </div>
                @endif
                
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background: #2e6da4; color: white;">
                                full calendar example
                        </div>
                    </div>
                    @if (\Auth::user())
                    <a href="/addeventurl/{{ $id }}" class="btn btn-lg btn-success"> ADD </a>
                    <a href="{{ route('show', $id) }}" class="btn btn-lg btn-primary"> Update </a>
                    <a href="{{ route('home') }}" class="btn btn-lg btn-info fr">Home</a>
                    <div class="mb-10"></div>
                    @endif
                    <div class="panel body">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>