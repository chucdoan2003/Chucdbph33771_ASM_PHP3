@extends('layout.public.master')
@section('title')
    Đặt hàng thành công
    
@endsection
@section('content')
<div style="background-image:url('{{ asset('image/backgroundlogin2.jpg') }}');background-size: cover; width: 100%; height: 100%; padding: 200px 500px;">
    <div style="width: 500px;box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); padding: 16px;background-color: #fff; border-radius: 10px;" >
        <h1 class="text-2xl text-green-500 font-bold mb-4" style="text-align: center">Đặt hàng thành công  <i class="fa-solid fa-truck ml-2"></i></h1> 
        <div class="flex flex-row justify-center gap-3">
            <a href="{{ route('order.index') }}"><button style="padding: 8px 12px; border: 2px solid rgba(0, 0, 0, 0.3);width: 200px;font-size: 18px;font-weight: 600;border-radius: 8px; background-color:rgb(48, 220, 32);color: #fff;border:none">Xem đơn hàng</button></a>
            <a href="{{ route('product.index') }}"><Button style="padding: 8px 12px; border: 2px solid rgba(0, 0, 0, 0.3); width: 200px;font-size: 18px;font-weight: 600;border-radius: 8px; background-color:rgb(27, 121, 193);color: #fff;border:none">Xem sản phẩm khác</Button></a>
        </div>
    </div>    
</div>
@endsection