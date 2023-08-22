<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
    public function edit(string $id,product $product)
    {
        $product = Product::find($id);
        return view('admin.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // dd($id); 
        if ($request->hasFile('IMG')) {
            Storage::delete('public/images/' . $product->IMG);
            $path = $request->file('IMG')->store('public/images');
            $filename = basename($path);
            $product->update([
                'name' => $request->input('ten'),
                'description' => $request->input('mota'),
                'price' => $request->input('gia'),
                'quantity' => $request->input('soluong'),
                'IMG' =>  $filename
            ]);
        } else {
            $product->update([
                'name' => $request->input('ten'),
                'description' => $request->input('mota'),
                'price' => $request->input('gia'),
                'quantity' => $request->input('soluong'),
            ]);
        }
        $product->save();
        return redirect()->route('admin.products')->with('thongbao','Cap nhap thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('thongbao','Xoa san pham thanh cong');
    }
}
