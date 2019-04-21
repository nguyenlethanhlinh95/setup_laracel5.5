<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::table('products')->get();
        return view('admin.pages.product.list', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // insert product
        $formInput = $request->except('pro_image');
        $this->validate($request, [
            'pro_name' => 'required',
            'pro_code' => 'required',
            'pro_price' => 'required',
            'pro_info' => 'required',
            'pro_image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:10000',
            'splPrice' => 'required',
        ]);
//            var_dump($formInput);
        $image = $request->pro_image;
        $imageName = '';
        if ($image){
            $imageName = $image->getClientOriginalName();
            $imageName = str_random(4) . "_" . $imageName;
            while(file_exists('upload/images/products' . $imageName)){
                $imageName = str_random(4) . "_" . $imageName;
            }
            $image->move('upload/images/products/', $imageName);
        }
        DB::table('products')->insert([
            'pro_name' => $request->pro_name,
            'pro_code' => $request->pro_code,
            'pro_price' => $request->pro_price,
            'pro_info' => $request->pro_info,
            'spl_price' => $request->splPrice,
            'pro_image' => $imageName
        ]);
        return redirect()->back()->with('success', 'Add new success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = DB::table('products')->find($id);
        return view('admin.pages.product.edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
