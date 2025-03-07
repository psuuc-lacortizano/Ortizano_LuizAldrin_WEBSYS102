<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customer($custId, $name, $address){
        return view('Customer', compact('custId', 'name', 'address'));
    }

    public function item($itemNo, $name, $price){
        return view('Item', compact('itemNo', 'name', 'price'));
    }

    public function order($custId, $name, $orderNo, $date){
        return view('Order', compact('custId', 'name', 'orderNo', 'date'));
    }

    public function orderdetails($transNo, $orderNo, $itemId, $name, $price, $qty){
        return view('Order-Details', compact('transNo', 'orderNo', 'itemId', 'name', 'price', 'qty'));
    }
}
