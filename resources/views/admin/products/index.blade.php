@extends('admin.layouts.master')
@section('title', 'Товары')
@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Картинка</th>
                <th scope="col">Название</th>
                <th scope="col">Код</th>
                <th scope="col">Категории</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата обновления</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><img src="{{ Storage::url($product->image) }}" alt="{{$product->name}}"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->lvl_1}} / {{$product->lvl_2}} / {{$product->lvl_3}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td class="d-flex flex-column">
                        
                        
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Посмотреть</a>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning">Изменить</a>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                       

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}

@endsection
