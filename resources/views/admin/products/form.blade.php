@extends('admin.layouts.master')
@section('title', 'Товары')
@section('content')
    <form method="POST" enctype="multipart/form-data"
        @isset($product) action="{{ route('products.update', $product) }}"
    @else
    action="{{ route('products.store') }}" @endisset>
        @isset($product)
            @method('PUT')
        @endisset
        @csrf
        <img src="src.png" alt="">
        <div class="form-group">
            <label for="exampleInputText">Имя</label>
            <input name="name" value="@isset($product) {{ $product->name }} @endisset" type="text"
                class="form-control" id="exampleInputText" placeholder="Название">
        </div>
        <div class="form-group">
            <label for="exampleInputCode">Код</label>
            <input name="code" value="@isset($product) {{ $product->code }} @endisset" type="text"
                class="form-control" id="exampleInputCode" placeholder="Код">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
@isset($product)
{{ $product->description }}
@endisset
</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputCode">Цена</label>
            <input value="@isset($product) {{ $product->price }} @endisset" name="price" type="text"
                class="form-control" id="exampleInputCode" placeholder="Цена">
        </div>
        <div class="form-group">
            <label for="exampleInputCode">ЦенаСП</label>
            <input name="priceSP" value="@isset($product) {{ $product->priceSP }} @endisset"
                type="text" class="form-control" id="exampleInputCode" placeholder="цена сп">
        </div>
        <div class="">
            <label class="btn btn-info btn-file">
                Загрузить картинку <input type="file" style="display: none;" name="image" id="image">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
