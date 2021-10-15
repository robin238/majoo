<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(4);
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Product::id();
        $kategori = Kategori::all();
        return view('product.input', compact('id', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute sudah ada'
        ];

        $request->validate([
            'product' => 'required|unique:product,nama_product',


        ], $messages);



        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $tujuan_upload = 'upload';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        $id = product::id();

        $product = new product;
        $product->id = $id;
        $product->id_kategori = $request->kategori;
        $product->nama_product = $request->product;
        $product->harga_product = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->path_image = $filename;


        $product->save();

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}