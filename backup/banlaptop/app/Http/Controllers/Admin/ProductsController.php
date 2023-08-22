<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    // public function showProductsForm()
    // {
    //     return view('admin.products');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::get();
        return view('admin.products', compact('product'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('IMG')->store('public/images');
        $filename = basename($path);
        product::create([
            'name' => $request->input('ten'),
            'description' => $request->input('mota'),
            'price' => $request->input('gia'),
            'quantity' => $request->input('soluong'),
            'IMG' =>  $filename
        ]);

        // Sinhvien::create($request->all());
        return redirect()->route('admin.products')->with('thongbao','Them san pham thanh cong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
