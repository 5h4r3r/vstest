@extends('layout.zkh')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Должник</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('zkh.index') }}">Назад</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Фамилия:</strong>
                {{ $post->lastname}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                {{ $post->firstname}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Отчество:</strong>
                {{ $post->secondname}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Задолжность:</strong>
                {{ $post->debt}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Пошлина:</strong>
                {{ $post->statefee}}
            </div>
        </div>
    </div>
@endsection