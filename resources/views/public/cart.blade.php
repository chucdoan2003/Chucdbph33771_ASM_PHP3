@extends('layout.public.master')
@section('title')
    Giỏ hàng  
@endsection
@section('content')
    <div class="px-16" style="background-color:#F7F7F7; padding: 16px  64px 16px">
        <form action="{{ route('thanhtoan') }}" method="POST">
            @csrf
            <div class="flex flex-row gap-4">
                <div class="mainx px-3 py-4 flex-1 rounded-md" style="background-color: #fff">
                    <div class="" style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                        <h3 class="text-2xl text-red-500 font-semibold pb-2">Giỏ hàng của bạn</h3>
                    </div>
                    <div class="my-3">Bạn đang có {{ $countProduct }} sản phẩm trong giỏ</div>
                    <div style="border: 1px solid rgba(0, 0, 0, 0.3) " class="flex flex-col">
                        @foreach ($data as $item)
                             <div class="flex flex-row items-center gap-2 my-2" style="box-shadow:0 1px 0 rgba(0, 0, 0, 0.2)"> 
                            <div >
                                <img src="{{ Storage::url($item->image) }}" style="width: 150px;" class="object-cover" alt="">
                            </div>
                            <div class="flex flex-row gap-3 items-center">
                                
                                    <h3 class="text-lg font-semibold text-blue-500">{{ $item->name }}</h3>
                                    <div>Giá: <span class="text-red-600 font-semibold">{{ $item->price }} VNĐ</span></div>
                                    <div>Số lượng:<span class="text-red-600 font-semibold">{{ $item->quantity }}</span></div>
                                <div>
                                    
                                    <a href="{{ route('cart.destroy', $item->id) }}"><button type="button" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(134, 134, 134); border: none"
                                        onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                                        >Xóa</button>  </a>  
                                   
                                </div>  
                                <div><input type="checkbox" name="id_pr[]" value="{{ $item->id }}" checked></div>
                                <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                
                            </div>
                        </div>
                        @endforeach
                       
                        
                       
                        
                       
                    </div>
                </div>
                <div class="aside px-3 py-4 rounded-md" style="width: 436px; background-color: #fff;">
                    <div style="box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)">
                      <h3 class="text-2xl text-red-500 font-semibold pb-2">Thông tin đơn hàng</h3>
                    </div>
                    <div class="flex justify-between my-1">
                        <p>Tổng tiền hàng:</p>
                        <p class="text-red-500 font-semibold">{{ $sumPrice }} VNĐ</p>
                    </div>
                    <div class="flex justify-between my-1">
                        <p>Giảm giá sản phẩm:</p>
                        <p class="text-gray-500 font-semibold">0 vnđ</p>
                    </div>
                    <div class="flex justify-between my-1 pb-2" style="box-shadow: 0 1px rgba(0, 0, 0, 0.2)">
                        <p>Phí giao hàng:</p>
                        <p class="text-gray-500 font-semibold">0 vnđ</p>
                    </div>
                    <div class="flex justify-between my-1">
                        <p>Số tiền thanh toán:</p>
                        <p class="text-red-500 font-semibold">{{ $sumPrice }} vnđ</p>
                    </div>
                    <div>
                        <div>
                            <b >Phương thức thanh toán</b>
                        </div>
                        <div>
                            <div><input type="radio" name="a"> <span>Thanh toán khi nhận hàng</span></div>
                            <div><input type="radio" name="a"> <span>Thanh toán online</span></div>
                        </div>
                        <input type="hidden" name="id_user" value="1">
                        <input type="hidden" name="sumPrice" value="{{ $sumPrice }}">
                         <input type="hidden" name="sumQuantity" value="{{ $sumQuantity }}">
                        <div class="mt-3"><button type="submit" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(218, 60, 60); border: none; width: 100%;">Thanh toán</button></div>
                    </div>


                </div>
            </div>
        

        </form>
      

    </div>
@endsection