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
      
      {{-- <div class="col-md-4">
        <div class="card">
          <img src="" class="card-img-top" alt="Laptop 1">
          <div class="card-body">
            <h5 class="card-title">Laptop 1</h5>
            <p class="card-text">Description of Laptop 1</p>
            <a href="#" class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="" class="card-img-top" alt="Laptop 2">
          <div class="card-body">
            <h5 class="card-title">Laptop 2</h5>
            <p class="card-text">Description of Laptop 2</p>
            <a href="#" class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      </div> --}}

      @foreach ($product as $pr)
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="{{ asset('storage/images/' . $pr->IMG) }}" alt="" width="300"></td>
            <div class="card-body">
              <h5 class="card-title">{{ $pr->name }}</h5>
              <p class="card-text">{{ $pr->description }}</p>
              <a href="{{ route('order.product', $pr->id) }}"  class="btn btn-primary">Đặt Ngay</a>
            </div>
          </div>  
        </div>
      @endforeach  
    </div>
  </div>

  <!-- Modal Đăng Nhập -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <!-- Nội dung của modal đăng nhập -->
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Đăng Nhập</h5>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  
  <!-- Modal Đăng Ký -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <!-- Nội dung của modal đăng ký -->
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerModalLabel">Đăng Ký</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="mb-3">
                <label for="fullname" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="fullname" name="name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
               
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input type="tel" class="form-control" id="phone" name="phone">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password">
                </div>
              <div class="mb-3">
                <label for="password" class="form-label">Nhập Lại Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password_confirmation">
                </div>
              <div class="mb-3">
                  <label for="diachi" class="form-label">Địa chỉ </label>
                  <input type="text" class="form-control" id="diachi" name="diachi">
                </div>
              <button type="submit" class="btn btn-primary">Đăng Ký</button>
            </form>

            {{-- <form method="POST" action="{{ route('home') }}" class="mx-1 mx-md-4">
                @csrf
                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="text" id="form3Example1c" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập địa tên của bạn" required autofocus/>
                  </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="email" id="form3Example3c" class="form-control" name="email" placeholder="Nhập địa chỉ Email" value="{{ old('email') }}" required/>
                  </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="tel" id="form3Example7c" class="form-control" name="phone" placeholder="Nhập sdt" value="{{ old('tel') }}" required/>
                  </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="password" id="form3Example4c" class="form-control" name="password" placeholder="Nhập mật khẩu" required/>
                  </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" required/>
                  </div>
                </div>
                <div class="text-center mx-4 mb-3 mb-lg-4">
                  <button type="submit" class="btn btn-primary btn-lg">Đăng Ký</button>
                    <a class="link-danger text-decoration-none">Đăng Nhập</a></p>
                </div>
              </form> --}}
          </div>
        </div>
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
</body>
</html>