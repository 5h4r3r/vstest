@extends('layout.zkh')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="float-left">
            <h2>Список должников за ЖКХ</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('zkh.excel')}}"><i class="bi-file-earmark-excel" role="img"></i> Выгрузить в Excel</a>
            <a class="btn btn-success" href="{{ route('zkh.create') }}">Добавить</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <!-- <th>id</th> -->
        <th scope="col">Ф.И.О.</th>
        <th scope="col">Задолжность</th>
        <th scope="col">Пошлина</th>
        <th scope="col">Действия</th>
    </tr>
    @foreach ($entries as $entry)
    <tr>
        <!-- <td>{{ $entry->id }}</td> -->
        <td><a href="{{ route('zkh.show',$entry->id) }}">{{ $entry->lastname}} {{ $entry->firstname }} {{ $entry->secondname }}</a></td>
        <td>{{ $entry->debt }}</td>
        <td>{{ $entry->statefee }}</td>
        <td class="text-center">
            <form action="{{ route('zkh.destroy',$entry->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('zkh.pdf',$entry->id) }}"><i class="bi-file-earmark-pdf" role="img"></i></a>
                <a class="btn btn-info" href="{{ route('zkh.edit',$entry->id) }}"><i class="bi-pencil-square" role="img"></i></a>
                <button class="btn btn-info" type="submit"><i class="bi-trash" role="img"></i></button>
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection