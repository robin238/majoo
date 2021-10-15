@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header card-no-border">
                <a class="btn" style="background-color: rgb(51, 247, 51)" href="/inputproduct"> Tambah Product</a>
          </div>
            <div class="col-12 mt-2">
                @include('alert.success')
                @include('alert.errors')
            </div>
            <h2 style="text-align: left; ">Produk</h2>

            <div style="width: 100%;">
                @foreach ($product as $prd)
                <span class="card" style="width: 24%; height: 500px;float:left; margin: 5px; border: 1px solid">
                <img class="card-img-top" src="/upload/{{ $prd->path_image }}" alt="Card image cap" style="content-align:center; width:100%;height:200px ;padding :20px">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{ $prd->nama_product }}</h5>
                    <h4 class="card-text" style="text-align:center;">Rp. {{ number_format($prd->harga_product) }}</h4>
                    <p class="card-text" style="text-align: justify;font-size: 10px;">{{ $prd->deskripsi }}</p>
                </div>
                <div class="card-footer text-center" style="border: none;background:none">
                        <button type="submit" class="btn btn-primary"  style="width:100px;text-align: center;">Beli</button>
                </div>
                </span>

                @endforeach

            </div>

            <br>


        </div>
        <div style="margin-left:10px">
            {{ $product->links() }}
        </div>
    </div>
</div>
@endsection
