@extends('layout.zkh')
@section('content')

 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список должников за ЖКХ</h2>
            </div>
            <div class="pull-right">
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
            <th>id</th>
            <th>Ф.И.О.</th>
            <th>Задолжность</th>
            <th>Пошлина</th>
            <th>Действия</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('zkh.show',$post->id) }}">{{ $post->lastname}} {{ $post->firstname }} {{ $post->secondname }}</a></td>
            <td>{{ $post->debt }}</td>
            <td>{{ $post->statefee }}</td>
            <td>
                    <a class="btn btn-info" href="{{ route('zkh.pdf',$post->id) }}"><i class="material-icons">&#xE03B;</i></a>
                    <a href="{{ route('zkh.edit',$post->id) }}"><i class="material-icons">&#xE254;</i></a>
                <form action="{{ route('zkh.destroy',$post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="material-icons">&#xE872;</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection