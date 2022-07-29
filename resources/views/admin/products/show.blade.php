@extends('admin.layouts.master')
@section('title', $product->name)
@section('content')

<div class="card col-12">
  <img class="card-img-top" src="@if ($product->image){{ Storage::url($product->image) }}
@else https://серебро.рф/img/placeholder.png @endif" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">Код: {{$product->code}}</p>
    <p class="card-text">Цена: {{$product->price}}</p>
    <p class="card-text">ЦенаСП: {{$product->priceSP}}</p>
    <p class="card-text">Колличество: {{$product->count}}</p>
    <p class="card-text">Описание: {{$product->description}}</p>
  </div>
</div>
@endsection
