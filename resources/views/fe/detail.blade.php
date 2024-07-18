<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    @extends('admin.layouts.menu01')
    @section('content')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-images">
                        <img src="{{ asset('storage/images') }}/{{ $product->image }}" class="main-image" id="mainImage"
                            alt="Main Product Image">
                        <div class="navigation-buttons">
                            <a href="#" class="prev" onclick="changeSlide(event, -1)">&#10094;</a>
                            <a href="#" class="next" onclick="changeSlide(event, 1)">&#10095;</a>
                        </div>
                        <div class="thumbnail-images">
                            <img src="{{ asset('storage/images') }}/{{ $product->image }}" class="img-thumbnail active"
                                alt="Product Thumbnail" onclick="changeImage(event, this)">
                            @foreach ($product->images as $item)
                                <img src="{{ asset('storage/images') }}/{{ $item->image }}" class="img-thumbnail"
                                    alt="Product Thumbnail" onclick="changeImage(event, this)">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="d-flex align-items-center mb-3" style="color: deeppink;">
                            <p style="margin-right: 20px">1,5k Đánh Giá</p>
                            <p>2,3k Lượt Bán</p>
                        </div>
                        <h2>{{ $product->name }}</h2><br>
                        <p style="font-size:20px;text-decoration: line-through;">Giá gốc: {{ $product->price }}VNĐ</p>
                        <p style="font-size:25px;font-weight: bold; color: deeppink;">Giá khuyến mãi:
                            {{ $product->sale_price }} VNĐ</p><br>
                        <p style="color: deeppink"><i class="fa-solid fa-truck-fast"></i>Miễn phí vận chuyển 0đ</p><br>
                        <div class="d-flex align-items-center mb-3">
                            <input name="quantity" type="number" class="form-control quantity-selector mr-2" value="1" min="1">
                            <button type="submit" class="mr-2 btn btn-primary"><i class="fa-solid fa-cart-plus"></i>Thêm Vào Giỏ Hàng</button>
                            <button  class="btn btn-danger">Mua Ngay</button>
                        </div>
                    </form>
                </div>
            </div><br><br>
            <p style="margin-left: 55px; font-size:25px;font-weight: bold;">Mô tả chi tiết sản phẩm:</p><br>
            <p style="margin-left: 55px; ">{{ $product->description }}</p><br>
        </div>
        <div class="container mt-5">
            <h1>Sản phẩm liên quan:</h1><br>
            <div class="product-row">
                @foreach ($related as $item)
                    <div class="product">
                        <a href="{{ route('detail', $item->slug) }}">
                            <img src="{{ asset('storage/images') }}/{{ $item->image }}"width="400px"
                                alt="Product 3"></a><br><br>
                        <a style=" font-weight:bold;font-size: 20px">{{ $item->name }}</a>
                        <p style="text-decoration: line-through;">Giá gốc: {{ $item->price }}VNĐ</p>
                        <p style="font-weight: bold; color:deeppink">Khuyến mãi: {{ $item->sale_price }}VNĐ</p><br>
                    </div>
                @endforeach
            </div>
            <script>
                let slideIndex = 0;
                const thumbnails = document.querySelectorAll('.thumbnail-images img');
                const mainImage = document.getElementById('mainImage');

                function changeImage(event, element) {
                    event.preventDefault();
                    mainImage.src = element.src;
                    thumbnails.forEach(thumb => thumb.classList.remove('active'));
                    element.classList.add('active');
                }

                function changeSlide(event, n) {
                    event.preventDefault();
                    slideIndex += n;
                    if (slideIndex < 0) {
                        slideIndex = thumbnails.length - 1;
                    } else if (slideIndex >= thumbnails.length) {
                        slideIndex = 0;
                    }
                    mainImage.src = thumbnails[slideIndex].src;
                    thumbnails.forEach(thumb => thumb.classList.remove('active'));
                    thumbnails[slideIndex].classList.add('active');
                }
            </script>
        @endsection
</body>
</html>