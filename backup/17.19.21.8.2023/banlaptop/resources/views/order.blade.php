<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laptop</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="navbar-nav ml-auto">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                  <a href="#" class="btn border border-dark">Xin chào: <strong>{{ Auth::user()->name }}</strong></a>
                  {{-- <a href="{{ route('logout') }}" class="btn btn-danger ml-2">Đăng Xuất</a> --}}
                </div>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                {{-- <img src="{{ $product->IMG }}" alt="{{ $product->name }}" class="img-fluid"> --}}
                <img src="{{ asset('storage/images/' . $product->IMG) }}" alt="" width="300"></td>
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Giá: {{ $product->price }}</p>
                <form method="POST" action="{{ route('orders.store')}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" name="quantity" id="quantity" required>
                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </form>
            </div>
        </div>
    </div>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>