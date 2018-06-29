<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <div>
        <h1>Welcome To The Website Food-Drink</h1>
        <p>Hello {{$name}}<p>
        @if($status == $pending)
            <p>Your orders status has been changed is <span style="color:#F0FF0F">PENDING</span><p>
        @elseif($status == $accepted)
            <p>Your orders status has been changed is <span style="color:#0FEB16">ACCEPTED</span><p>
        @else
            <p>Your orders status has been changed is <span style="color:#E81B07">REJECTED</span<p>
        @endif
    </div>
</body>
</html>
