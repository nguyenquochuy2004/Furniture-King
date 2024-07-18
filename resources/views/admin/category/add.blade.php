<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Mới Danh Mục</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    @include('admin.layouts.menu')

    <div class="container mt-4">
        <h2>Thêm Mới Danh Mục Của Danh Mục Sản Phẩm</h2>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Tên danh mục">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="parent_id">Chọn danh mục cha</label>
                    <select class="form-control" name="parent_id" id="parent_id" >
                        <option value="">Chọn danh mục cha</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <h3>Trạng thái</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                        <label class="form-check-label" for="status1">
                            Hiển Thị
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                        <label class="form-check-label" for="status0">
                            Tạm Ẩn
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">THÊM MỚI</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
