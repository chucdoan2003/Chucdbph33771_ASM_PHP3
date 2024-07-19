<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $yourOrders=[];
        $orders= DB::table('orders')->where('id_user', 1)->get();
        $sumOrder = count($orders);
        // for($i=0; $i<count($orders); $i++){
        //     $yourOrders[$i] = DB::table('productorders')
        //                     ->select('productorders.id_order', 'products.*')
        //                     ->join('products', 'productorders.id_product', 'products.id')
        //                     ->where('id_order', $orders[$i]->id)->get();
        //     $sumPrice = DB::table('productorders')
        //             ->join('products', 'productorders.id_product', 'products.id')
        //             ->where('id_order', $orders[$i]->id)
        //             ->sum('products.price');
        //     $yourOrders[$i]['sumPrice']=$sumPrice;
        // }
        foreach ($orders as $order) {
            $yourOrders[] = DB::table('productorders')
                            ->select('productorders.id_order', 'products.*')
                            ->join('products', 'productorders.id_product', 'products.id')
                            ->where('id_order', $order->id)->get();
            //  $sumPrice = DB::table('productorders')
            //         ->join('products', 'productorders.id_product', 'products.id')
            //         ->where('id_order', $order->id)
            //         ->sum('products.price');
            // $yourOrders[]['sumPrice']=$sumPrice;

            // // Thêm trường sumPrice vào mỗi đơn hàng trong mảng $yourOrders
            // $order->sumPrice = $sumPrice;

            // // Thêm danh sách sản phẩm vào mảng $yourOrders
            // $order->products = $yourOrders;

            // // Thêm đơn hàng vào mảng $yourOrders
            // $yourOrders[] = $order;
            
        }
        $i =1;
        // dd($yourOrders);
        return view('public.orders', compact('yourOrders', 'sumOrder', 'i'));
    }
}
