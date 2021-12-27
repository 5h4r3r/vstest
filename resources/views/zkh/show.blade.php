@extends('layout.zkh')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">
                <h2>Должник</h2>
            </div>
            <div class="float-right">
            <a class="btn btn-info" href="{{ route('zkh.pdf',$entry->id) }}"><i class="bi-file-earmark-pdf" role="img"></i> Сохранить в PDF</a>
                <a class="btn btn-primary" href="{{ route('zkh.index') }}">Назад</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Фамилия:</strong>
                {{ $entry->lastname}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                {{ $entry->firstname}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Отчество:</strong>
                {{ $entry->secondname}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Задолжность:</strong>
                {{ $entry->debt}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Пошлина:</strong>
                {{ $entry->statefee}}
            </div>
        </div>
    </div>
@endsection