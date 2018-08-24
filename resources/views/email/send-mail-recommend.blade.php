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
        <h3> {{$user->user->email}} </h3>
        @foreach($products as $product)
            <div>
                <ul>        
                    <li> {{ __('product.admin.create.name') }}: {{ $product->name }}</li>
                    <li> {{ __('product.admin.create.price') }}: {{ $product->price }}</li>
                    <li> {{ __('product.admin.create.preview') }}: {{ $product->preview }}</li>
                </ul>
            </div>
        @endforeach
    </div>
</body>
</html>
