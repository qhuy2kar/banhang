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
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.home') }}">Thống kê</a>
        </li>
        <li class="nav-item">
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
  <div class="container mt-4">
    <h1>Xin chào, đây là trang quản trị</h1>
    <p>Đây là nội dung quản trị của bạn.</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>