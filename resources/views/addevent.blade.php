<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>meeting Room Manajemen</title>
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
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" placeholder="Enter Meeting Name" id="" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pic" placeholder="Enter PIC Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="color" class="form-control" name="color" placeholder="enter the color" id="" required>
                                        </div>
                                        <label > Start Date</label></P>
                                        <div class="form-group">
                                            <input type="date"class="form-control date" name="start_date" placeholder="yyyy-mm-dd (space) TT:MM" id="" required>
                                        </div>
                                        <div class="form-group">
                                                <input type="time" min="00:00" max="24:00" class="form-control date" name="start_time" id="" required>
                                            </div>
                                        <label > End Date</label></P>
                                        <div class="form-group">
                                                <input type="date"class="form-control date" name="end_date" id="" required>
                                            </div>
                                            <div class="form-group">
                                                    <input type="time" class="form-control date" name="end_time" id="" required>
                                                </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="ADD">
                                </form>
                            </div>
                </div>
            </div>
        </div>
    

</body>
</html>