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
        <div class="card">
            {{-- <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Them Sinh Vien</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('sinhvien.index') }} " class="btn btn-primary fload-end"> Danh sach sinh vien</a>
                    </div>
                </div>
            </div> --}}
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên sản phẩm</strong>
                                <input type="text" name="ten" value="{{ $product->name }}" class="form-control" placeholder="Nhap tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <strong>Mô tả</strong>
                                <input type="text" name="mota" value="{{ $product->description }}" class="form-control" placeholder="Nhap mô tả">
                            </div>
                            <div class="form-group">
                                <strong>Giá</strong>
                                <input type="text" name="gia" value="{{ $product->price }}" class="form-control" placeholder="Nhap giá sản phẩm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Số lượng</strong>
                                <input type="text" name="soluong" value="{{ $product->quantity }}" class="form-control" placeholder="Nhap so lượng sản phẩm">

                            </div>  
                            <div class="form-group">
                                <strong>Chọn ảnh</strong>
                                <input type="file" name="IMG" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>