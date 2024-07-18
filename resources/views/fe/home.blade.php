<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title> FURNITURE KING </title>
</head>

<body>

    @extends('admin.layouts.menu01')
    @section('content')
        <div class="slideshow-container">
            <div class="slide active">
                <img src="{{ asset('image/banner2.jpg') }}" alt="Image 1">
            </div>
        </div>
        <div class="products">
            <h1>Sản phẩm mới nhất</h1>
            <div class="product-row">
                @foreach ($newProducts as $item)
                    <div class="product">
                        <a href="{{ route('detail', $item->slug) }}"><img
                                src="{{ asset('storage/images') }}/{{ $item->image }}"width="400px"
                                alt="Product 3"></a><br><br>
                        <a style=" font-weight:bold;font-size: 20px">{{ $item->name }}</a>
                        <p style="text-decoration: line-through;">Giá gốc: {{ $item->price }}VNĐ</p>
                        <p style="font-weight: bold; color:deeppink">Khuyến mãi: {{ $item->sale_price }}VNĐ</p><br>
                    </div>
                @endforeach
            </div>
            <h1>Sản phẩm nổi bật</h1>
            <div class="product-row">
                @foreach ($featuredproducts as $item)
                    <div class="product">
                        <a href="{{ route('detail', $item->slug) }}"><img
                                src="{{ asset('storage/images') }}/{{ $item->image }}"width="400px"
                                alt="Product 3"></a><br><br>
                        <a style=" font-weight:bold;font-size: 20px">{{ $item->name }}</a>
                        <p style="text-decoration: line-through;">Giá gốc: {{ $item->price }}VNĐ</p>
                        <p style="font-weight: bold; color:deeppink">Khuyến mãi: {{ $item->sale_price }}VNĐ</p><br>
                    </div>
                @endforeach
            </div>
            <h1>Các sản phẩm khác</h1>
            <div class="product-row">
                @foreach ($products as $item)
                    <div class="product">
                        <a href="{{ route('detail', $item->slug) }}"><img
                                src="{{ asset('storage/images') }}/{{ $item->image }}"width="400px"
                                alt="Product 3"></a><br><br>
                        <a style=" font-weight:bold;font-size: 20px">{{ $item->name }}</a>
                        <p style="text-decoration: line-through;">Giá gốc: {{ $item->price }}VNĐ</p>
                        <p style="font-weight: bold; color:deeppink">Khuyến mãi: {{ $item->sale_price }}VNĐ</p><br>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
</body>

</html>
