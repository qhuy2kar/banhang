<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang quản trị</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!-- Thanh điều hướng -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Trang quản trị</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.home') }}">Thống kê</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.products') }}">Sản Phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders') }}">Đơn hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users') }}">Người dùng</a>
          </li>
      </ul>
    </div>
  </nav>

  <!-- Nội dung chính -->
    <div class="container">
        <div class="card mt-2">
            <div class="card-body mt-2">
                {{-- @if(Session::has('thongbao'))
                    <div id="thongbao" class="alert alert-success">
                        {{ Session::get('thongbao') }}
                    </div>

                @endif --}}
                <a href="{{ route('products.create') }}" class="btn btn-primary float-end mb-2">Thêm Mới</a>
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Mô Tả</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>IMG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $pr)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pr->name }}</td>
                                <td>{{ $pr->description }}</td>
                                <td>{{ $pr->price }}</td>
                                <td>{{ $pr->quantity }}</td>
                                <td><img src="{{ asset('storage/images/' . $pr->IMG) }}" alt="" width="50"></td>
                                <td>
                                    {{-- <form action="{{ route('sinhvien.destroy', $sv->id) }}" method="POST">
                                        <a href="{{ route('sinhvien.edit',$sv->id) }}" class="btn btn-info">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>