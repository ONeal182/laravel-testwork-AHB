@extends('layouts.master')
@section('title', 'Главная')
@section('content')
<form>
    <div class="form-group">
      <label for="exampleFormControlFileCSV">Добавить файл CSV</label>
      <input type="file" class="form-control-file" id="exampleFormControlFileCSV">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFileXML">Добавить файл XML</label>
      <input disabled type="file" class="form-control-file" id="exampleFormControlFileXML">
    </div>
    
    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
@endsection