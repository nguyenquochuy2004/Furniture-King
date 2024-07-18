<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh Sửa Danh Mục</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('admin.layouts.menu')

    <div class="container mt-2">
        <h2>Chỉnh Sửa Danh Mục</h2>
        <form action="{{ route('category.update', $category) }}" method="POST" role="form">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $category->id}}">
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $category->name }}" name="name" id="name" placeholder="Nhập tên danh mục">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="parent_id">Danh Mục Cha</label>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="">Chọn danh mục cha</option>

                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $category->parent_id === $item->id ? 'selected' : '' }}> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Trạng Thái</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ $category->status == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="status1">
                        Hiển Thị
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status0" value="0" {{ $category->status == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="status0">
                        Tạm Ẩn
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
