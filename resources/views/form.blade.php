@extends('layouts.master')
@section('title', 'Главная')
@section('content')
    @if ($success != '')
        <p class="alert alert-success">{{ $success }}</p>
    @endif
    @error('*')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form method="post" enctype="multipart/form-data" action="{{ route('form-add') }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlFileCSV">Добавить файл CSV</label>
            <input type="file" name="file" class="form-control-file" id="exampleFormControlFileCSV">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
