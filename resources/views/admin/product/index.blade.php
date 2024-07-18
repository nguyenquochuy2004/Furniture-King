<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Sản Phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    @include('admin.layouts.menu')

    <div>
        <h1>Quản lý sản phẩm</h1>
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-success mb-3">Thêm mới sản phẩm</a>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif        
        <div class="col-md-14">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá</th>
                        <th>Giá khuyến mãi</th>
                        <th>Mô tả chi tiết</th>
                        <th>Danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Sản phẩm nổi bật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{asset('storage/images')}}/{{$item->image}}" alt="" width="100px"></td>
                        <td>{{ $item->price }}$</td>
                        <td>{{ $item->sale_price }}$</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11">Chưa có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
