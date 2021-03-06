<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/showT_restaurant.css">

    <title>Document</title>
</head>
<body>
<!-- @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif -->
<div class="Create">
    <a role="button" href="/Create" class="btn btn-primary" onclick="return confirm('Bạn có muốn thêm mới!')">Create</a>
</div>
@foreach($t_restaurants as $t_restaurant)
    <div class="cart-cars">
        <div class="">
            <img class="img" src="/image/{{ $t_restaurant->image }}" alt="...">
        </div>
        <div class="cart-content">
            <p>{{ $t_restaurant->name_food }}</p>
            <p>Price: {{ $t_restaurant->price }}</p>
            <button class="button">Buy Now</button>
        </div>
    </div>
@endforeach
</body>
</html>
