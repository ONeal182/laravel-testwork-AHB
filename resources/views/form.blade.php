@extends('layouts.master')
@section('title', 'Главная')
@section('content')
<form>
    <div class="form-group">
      <label for="exampleFormControlFile1">Example file input</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
@endsection