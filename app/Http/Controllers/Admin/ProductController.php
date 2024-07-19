<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW= 'admin.products.';
    public function index()
    {   
        $data = Product::query()->latest('id')->paginate(5);
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $categories = Category::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data= $request->except('image');
        if($request->hasFile('image')){
            $data['image']=Storage::put('products',$request->file('image'));
        }else{
            $data['image']="";
        }
        Product::query()->create($data);
        return redirect()->route(self::PATH_VIEW.'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        dd($product);
        return view('public.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        $categories = Category::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data= $request->except('image');
        if($request->hasFile('image')){
            $data['image']=Storage::put('products',$request->file('image'));
        }else{
            $data['image']= $product->image;
        }
        $product->update($data);
        return redirect()->route(self::PATH_VIEW.'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
