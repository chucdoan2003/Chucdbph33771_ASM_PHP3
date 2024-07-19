@extends('layout.admin.master')
@section('title')
   Edit  
@endsection
@section('link')
   Product > Edit
@endsection
@section('content')

    {{-- <div class="" style="background-color:#fff;margin: 16px 16px 16px 16px;padding: 16px"> --}}
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Name</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="name" value="{{ $product->name }}">
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Price</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="price" value="{{ $product->price }}">
            </div>
            
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Image</label>
                <input type="file" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; " name="image" >
            </div>

            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="">Old Image</label>
                <img src="{{ Storage::url($product->image) }}" class="object-cover" alt="" style="width: 250px;">
            </div>

            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px; display:flex; flex-direction: column">
                <label for="" class="" style="font-size: 18px;">Category</label>
                <select name="category_id" id="" style="border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px;padding: 3px 8px;" >
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $product->category_id) @checked(true)
                            
                        @endif>{{ $item->name }}</option>
                    @endforeach    
                </select>
            </div>
            <div style="background-color: #fff; margin: 16px; padding: 16px; border-radius: 10px;">
                <label for="" class="" style="font-size: 18px;">Description</label>
                <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px; padding: 3px 8px;" name="description" value="{{ $product->description }}">
            </div>
            
                <button type="submit" style="padding: 8px; background-color: rgb(48, 238, 31); width: 120px; border-radius: 10px;margin-bottom: 12px; margin: 0 0 0 16px;">Update</button>
            
        </form>
        
    {{-- </div>    --}}
@endsection