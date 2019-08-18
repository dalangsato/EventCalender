<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

body{
	padding: 50px;
}

label{
	position: relative;
	cursor: pointer;
	color: #666;
	font-size: 30px;
}

input[type="checkbox"], input[type="radio"]{
	position: absolute;
	right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
	content: "\f096";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="checkbox"]:checked + .label-text:before{
	content: "\f14a";
	color: #2980b9;
	animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
	color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
	content: "\f0c8";
	color: #ccc;
}
}

@keyframes effect{
	0%{transform: scale(0);}
	25%{transform: scale(1.3);}
	75%{transform: scale(1.4);}
	100%{transform: scale(1);}
}
</style>
</head>
<body>
    <div class="container">
        <div class="jumbotron"></div>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead">
                <tr class="warning">
                    <th>id</th>
                    <th>Nama Rapat</th>
                    <th>Nama PIC</th>
                    <th>Ruangan</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>setujui</th>
                    <th>update / edit</th>
                    <th>Delete</th>               
                </tr>
            </thead>
            @foreach ($events as $event)
            <tbody>
                <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->pic}}</td>
                <td>{{$ruang->ruang_name}}</td>
                <td>{{$event->start_date}}</td>
                <td>{{$event->end_date}}</td>
                <th>
                    <div class="form-check" align="middle">
                    <label>
                        <input type="checkbox" name="check"> <span class="label-text"></span>
                    </label>
                    </div>
                </th>
                <th><div align="middle"><a href="{{ route('edit', $event->id) }}" class="btn btn-success">
                        Edit</a></div>
                    </th>
                <th>
                    <div align="middle">
                <form method="POST" action="{{ route('delete', $event->id) }}">
                @csrf
                <input type="hidden" name="_method" value="Delete">
                <button type="submit" class="btn btn-danger">
                   Delete</button>
                </form></div>
                </th>
                </tr>
            </tbody>
                
            @endforeach
        </table>
    </div>
</body>
</html>