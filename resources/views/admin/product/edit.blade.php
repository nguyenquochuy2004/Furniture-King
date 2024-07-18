<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh Sửa Sản Phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('admin.layouts.menu')

    <div class="container mt-2">
        <h2>Chỉnh Sửa Sản Phẩm</h2>
        <form action="{{ route('product.update', $product) }}" method="POST" role="form"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ? old('name') : $product->name }}" name="name" id="name"
                    placeholder="Nhập tên danh mục">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ? old('name') : $product->name }}" name="name" id="name"
                    placeholder="Nhập tên danh mục">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Ảnh sản phẩm</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    src="{{ asset('storage/images') }}/" value="{{ $product->image }}" name="name" id="name"
                    placeholder="Nhập tên danh mục">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">anh mo ta sp</label>
                <input type="text" multiple class="form-control @error('name') is-invalid @enderror" value=""
                    name="photo[]" id="name">
                <div class="row">   
                    {{-- @foreach ($img_product->image as $photos)
                        <div class="col-md-3">
                            <a href="" class="thumbnail">
                                <img src="wallpaperflare.com_wallpaper (1).jpg" alt="">
                                <a href="" style=""><i class="fa-duotone fa-trash-can fa-sm" style="--fa-primary-color: #ff0000; --fa-secondary-color: #f11313;"></i></a>
                            </a>
                        </div>
                    @endforeach --}}

                </div>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ? old('name') : $product->name }}" name="name" id="name"
                    placeholder="Nhập tên danh mục">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label for="parent_id">Danh Mục Cha</label>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="">Chọn danh mục cha</option>

                    @foreach ($product as $item)
                        <option value="{{ $item->id }}" {{ $product->parent_id === $item->id ? 'selected' : '' }}> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div> --}}


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
