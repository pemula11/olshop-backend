@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-black">
            <form action="{{route('product-galleries.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="products_id" class="form-control-label">Nama Barang</label>
                    <select name="products_id" id="" class="form-control @error('products_id') is-invalid @enderror">
                      
                        @foreach ($products as $product)
                            <option value="{{$product->id}}"> {{$product->name}} </option>
                        @endforeach
                        
                    </select>
                    @error('products_id') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                
              
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input type="file" name="photo" id="" value="{{old('photo')}}"
                    accept="image/*" class="form-control @error('photo') is-invalid @enderror" required>
                    @error('photo') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">is default</label> <br>
                    
                    
                    <label >
                        <input type="radio" name="is_default" id="" value="1"
                        class=" @error('is_default') is-invalid @enderror"/> Ya   
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" id="" value="0"
                        class=" @error('is_default') is-invalid @enderror"/> Tidak
                    </label>

                    @error('is_default') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-black" type="submit">
                        Tambah foto Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection