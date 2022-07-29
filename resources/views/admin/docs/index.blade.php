@extends('admin.layouts.master')
@section('title', 'Главная')
@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Тип файла</th>
                <th scope="col">Дата загрузки</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docs as $doc)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$doc->name}}</td>
                    <td>{{$doc->type}}</td>
                    <td>{{$doc->created_at}}</td>
                    <td class="d-flex flex-column">
                        <a href="{{route('docs.show', $doc->id)}}" class="btn btn-primary">Посмотреть</a>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
