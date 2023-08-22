<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laptop</title>
  <style>
    @keyframes slideIn {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    @keyframes slideOut {
      0% {
        transform: translateX(0);
        opacity: 1;
      }
      100% {
        transform: translateX(100%);
        opacity: 0;
      }
    }
    @keyframes slideOut {
      0% {
        transform: translateX(0);
        opacity: 1;
      }
      100% {
        transform: translateX(100%);
        opacity: 0;
      }
    }

    #thongbao {
      position: fixed;
      top: 60px;
      right: 20px;
      padding: 15px;
      z-index: 9999;
      transition: opacity 0.8s ease-in-out;
      animation: slideIn 0.8s ease-in-out;
    }
    .hide {
      animation: slideOut 0.8s ease-in-out;
    }
  </style>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav ml-auto">
        @if(Auth::check())
            <!-- Hiển thị tên người dùng -->
            {{-- <p>Xin chào, {{ Auth::user()->name }}</p> --}}

            {{-- <div class="row">
                <a href="" class="btn border border-dark col-md-8 ">Xin chào : {{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}" class="btn btn-danger float-end col-md-4">Đăng Xuất</a>
            </div> --}}

            <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="#" class="btn border border-dark">Xin chào: <strong>{{ Auth::user()->name }}</strong></a>
                  <a href="{{ route('logout') }}" class="btn btn-danger ml-2">Đăng Xuất</a>      
                </div>
              </div>
        @else
            <!-- Button Đăng Nhập -->
            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-toggle="modal" data-target="#loginModal">
                Đăng Nhập
            </button>
            
            <!-- Button Đăng Ký -->
            <button type="button" class="btn btn-outline-dark shadow-none ml-2" data-toggle="modal" data-target="#registerModal">
                Đăng Ký
            </button>
        @endif

      </div>
    </div>
  </nav>

  {{-- Content --}}
  @if(session('error'))
    <div id="thongbao" class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif
  <div class="container mt-4">
    <div class="row">
        @foreach ($orders as $order)
            <div class='col-md-4 px-4 mb-4'>
                <div class='bg-white p-3 rounded shadow-sm'>
                    <h5 class='fw-bold'>Name Product</h5>
                    <p>Đơn giá:  vnđ</p>
                    <p>
                        <b>Ngày Đăt: {{ $order->created_at }}</b> <br>
                    </p>
                    <p>
                        <b>Tổng:{{ $order->total_price }} </b> vnđ <br>
                    </p>
                    <p>
                        <span class='badge'>Trang Thai</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script>
    setTimeout(function() {
        document.getElementById("thongbao").style.display = "none";
        // document.getElementById("thongbao").classList.add("hide");
    }, 2000); // Ẩn thông báo sau 2 giây
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>