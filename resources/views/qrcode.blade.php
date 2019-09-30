<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="card text-center" style="width:50%;margin: auto;background: white; padding: 10px;margin-top:15%;">
            <img src="{{ asset('image/logo_ipc.png') }}" width="300px" height="150px" style="max-width: 500px;margin: auto;background: white;padding: 10px;"> <br>
            <h1 class="text-center">Scan Me to See Room Availability!</h1>
               <div class="card-body" style="max-width: 500px;margin: auto;background: white;padding: 10px;">
            <img class="card-img-top" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->errorCorrection('H')->generate(url('/events/'.$id))) !!}" alt="...">
        </div>
    </div><br>
    <h5 class="text-center">How to booking: <br>
        1. See the room availability by time that you wanna book by scanning the barecode<br>
        2. if you see the room is availabel, you can contact the administrator for booking <br>
    </h5>
</body>
</html>