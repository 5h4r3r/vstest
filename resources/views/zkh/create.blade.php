@extends('layout.zkh')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Добавить запись</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('zkh.index') }}">Назад</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('zkh.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Фамилия:</strong>
                <input type="text" name="lastname" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                <input type="text" name="firstname" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Отчество:</strong>
                <input type="text" name="secondname" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Задолжность:</strong>
                <input type="text" name="debt" class="form-control">
            </div>
        </div>

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="FIRSTNAME" placeholder="Description"></textarea>
            </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
</form>
@endsection