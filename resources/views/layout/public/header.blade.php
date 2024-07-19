<header class="flex gap-2 flex-row h-20 items-center w-full px-3 pr-3 " style="box-shadow: 0 1px 0px rgba(0,0,0,0.3)">
    <div class="">
        <img src="{{ asset('image/logo.jpg') }}" alt="" class="object-cover h-8">
    </div>
    <div class="flex flex-row justify-between flex-1 ml-6 ">
        <div class="flex flex-row gap-6 text-gray-600 font-normal ">
            <div class="hover:text-green-400 hover:font-semibold"> <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Trang chủ</a></div>
            <div class="hover:text-green-400 hover:font-semibold"> <a href="{{ route('product.index') }}"><i class="fa-solid fa-shop"></i>  Sản phẩm</a></div>
            <div class="hover:text-green-400 hover:font-semibold"> <a href=""><i class="fa-solid fa-envelope"></i>  Liên hệ</a></div>
            <div class="hover:text-green-400 hover:font-semibold"> <a href=""><i class="fa-solid fa-ticket"></i>     Khuyến mãi</a></div>
            <div class="hover:text-green-400 hover:font-semibold"><a href="{{ route("cart.list") }}"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a></div>
            <div class="hover:text-green-400 hover:font-semibold"> <a href="{{ route('order.index') }}"><i class="fa-solid fa-tag"></i>  Đơn hàng</a></div>

            <div><input type="text" placeholder="Tìm kiếm" class="border-2 rounded-md pl-2 w-80"></div>
        </div>
        <div class="flex flex-row gap-6 mr-3">
            
            
            <div ><a href="{{ route('auth.login') }}"><i class="fa-solid fa-right-to-bracket text-blue-500 mr-2"></i></i>   Đăng nhập</a></div>
            <div ><a href="{{ route('auth.register') }}"><i class="fa-solid fa-user-plus text-green-500 mr-2"></i>  Đăng ký</a></div>
        </div>
    </div>
</header>