@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h5>Form Product</h5>
                </div>

                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                <form class="form theme-form" action="/inputproduct" method="post" enctype="multipart/form-data">
                    {{-- {{ csrf_field() }} --}}
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >ID product</label><sup style="color: red"></sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="id"  value="{{ $id }}" readonly>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >Kategori</label><sup style="color: red">* wajib diisi</sup>
                                <select class="form-control form-control-inverse btn-square select-kategori" name="kategori"  style="border: 1px solid black">
                                    @foreach($kategori as $kat)
                                      <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                          </div>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label >Nama Product</label><sup style="color: red">* wajib diisi</sup>
                              <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="text" name="product"  value="{{ old('product') }}">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >Harga</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" name="harga" value="{{ old('harga') }}">

                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >Deskripsi</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="textarea" name="deskripsi"  value="{{ old('deskripsi') }}">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label >Image</label><sup style="color: red">* wajib diisi</sup>
                                <input class="form-control" style="border: 1px solid rgb(2, 2, 2)" type="file" name="image"  value="{{ old('image') }}">
                              </div>
                            </div>
                          </div>


                          <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                </form>
              </div>
        </div>
    </div>
</div>


<script type="application/javascript">
   $(document).ready(function() {
    $('.select-kategori').select2();
    });
</script>

@endsection
