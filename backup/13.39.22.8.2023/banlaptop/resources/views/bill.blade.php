<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        {{-- <h1>Bill</h1> --}}

        <div class="card mt-4">
            <div class="card-body text-center">
                {{-- <p><strong>Order ID:</strong> {{ $order->id }}</p>   --}}
                {{-- <p><strong>User:</strong> {{ $order->user->name }}</p>
                <p><strong>Product:</strong> {{ $order->product->name }}</p> --}}
                {{-- <p><strong>Product:</strong> {{ $productName }}</p>
                @if ($order->user)
                    <p><strong>User:</strong> {{ $order->user->name }}</p>
                @endif
                <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                <p><strong>Total Price:</strong> {{ $order->total_price }}</p> --}}
                {{-- <p><strong>User:</strong> {{ $userName }}</p>
                <p><strong>Product:</strong> {{ $productName }}</p> --}}
                {{-- <p>Order ID: {{ $order->id }}</p> --}}
                {{-- <p>User Name: {{ $userName }}</p> --}}
                <h1 >Chúc mừng bạn đã đặt hàng thành công</h1>
                <a href="{{ route('home.index') }}" class="btn btn-danger mt-4">Trang Chủ</a>

            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>