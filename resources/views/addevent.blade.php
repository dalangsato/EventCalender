<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-heading" style="background: #2e6da4; color: white;">
                    Add Event To Calender
                        </div>
                            <div class="panel-body">
                                <h1>Task: Add Data</h1>
                            <form method="POST" action="{{ route('addEvent') }}">
                                    @csrf
                                    <input type="hidden" name="ruang_id" value="{{ $id }}">
                                    {{-- {{csrf_field() }} --}}
                                        <input type="text" class="fom-control" name="title" placeholder="enter the name" id=""> <br><br>
                                        <input type="color" class="fom-control" name="color" placeholder="enter the color" id=""> <br><br>
                                        <input type="datetime-local" class="fom-control date" name="start_date" placeholder="enter the name" id=""> <br><br>
                                        <input type="datetime-local" class="fom-control date" name="end_date" placeholder="enter the name" id=""> <br><br>                           
                                        <input type="submit" class="btn btn-primary" name="submit" value="ADD">
                                </form>
                            </div>
                </div>
            </div>
        </div>
    

</body>
</html>