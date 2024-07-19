<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addnewPr(Request $request){
        $data= $request->all();
        DB::table('cartProducts')->insert([
            'id_user'=>$data['id_user'],
            'id_product'=>$data['id_product'],
            'quantity'=>$data['quantity']
        ]);
        $id_user= 1;
        $data= DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
            ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
            ->where('cartproducts.id_user','=', 1)
            ->get();
        ;
        $countProduct= count($data);
        $sumPrice = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
            ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
            ->where('cartproducts.id_user','=', 1)->sum('price');
        $sumQuantity = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
            ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
            ->where('cartproducts.id_user','=', 1)->sum('quantity');
        
        return view('public.cart',compact('data','sumPrice', "sumQuantity", 'countProduct'));
    }
    public function listProduct(){
        $id_user= 1;
        $data= DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
            ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
            ->where('cartproducts.id_user','=', 1)
            ->get();
        ;
        $countProduct= count($data);
        $sumPrice = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
            ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
            ->where('cartproducts.id_user','=', 1)->sum('price');
        $sumQuantity = DB::table('cartproducts')->join('products','cartproducts.id_product', 'products.id')
            ->select('cartproducts.id as cart_id', 'cartproducts.quantity', 'products.*')
            ->where('cartproducts.id_user','=', 1)->sum('quantity');
        
        return view('public.cart',compact('data','sumPrice', "sumQuantity", 'countProduct'));
    }
    public function deleteCartPr($id){
        dd($id);
    }
    Public function thanhtoan(Request $request){
        $dulieu= $request->all();
        $order=DB::table('orders')->insertGetId([
            'id_user'=>$dulieu['id_user'],
            'sumprice'=>$dulieu['sumPrice'],
            'sumquantity'=>$dulieu['sumQuantity']

        ]);

        for($i= 0; $i< count($dulieu['id_pr']); $i++){
            DB::table('productorders')->insert([
                'id_order'=>$order,
                'id_product'=>$dulieu['id_pr'][$i],
                'quantity'=>$dulieu['quantity'][$i]
            ]);
            DB::table('cartproducts')->where('id_product', $dulieu['id_pr'][$i])->delete();
        }
        return view('public.thanhtoan');
    }
    public function destroyCart($id){
        DB::table('cartproducts')->where('id_product', $id)->delete();
        return redirect()->route('cart.list');

        
    }

}
