{{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
@csrf
<div class="form-row">
    <div class="form-group">
        <label for="idname">Name</label>
        <input type="text" name="name" class="form-control" id="idname" value="{{ $product->name ?? old('name') }}">
    </div>
    <div class="form-group col-md-2">
        <label for="iddesc">Description</label>
        <input type="text" name="description" class="form-control" id="iddesc" value="{{$product->description ?? old('description')}}">
    </div>
    <div class="form-group">
        <label for="iddesc">Price</label>
        <input type="text" name="price" class="form-control" id="idprice" value="{{$product->price ?? old('price')}}">
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <input type="file" name="photo" class="form-custom" value="{{$product->photo ?? '' ?? old('photo')}}">
    </div>
</div>

<button type="submit" class="form-control btn btn-info">Enviar</button>