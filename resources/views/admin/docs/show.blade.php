@extends('admin.layouts.master')
@section('title', 'Главная')
@section('content')

    <div class="row">
        <div>
            <table border="1">
                @foreach ($items as $item)
                    <tr>
                        @foreach ($item as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
