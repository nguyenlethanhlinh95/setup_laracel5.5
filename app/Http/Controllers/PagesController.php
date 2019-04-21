<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function index()
    {
        $new_product = DB::table('products')->take(4)->get();
        //$new_product = DB::table('products')->orderBy('created_at','desc')->get(4);
        return view('front.pages.index', ['new_products' => $new_product]);
    }

    public function product_detail($id)
    {
        $product = DB::table('products')->find($id);
        return view('front.pages.product_detail', ['product' => $product]);
    }

    public function contact()
    {
        return view('front.pages.contact');
    }
}
