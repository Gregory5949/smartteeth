@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
        <div class="m-3">ФИО: {{$analyze->patient->name}}</div>
        <div class="m-3">Дата анализа: {{ date('d.m.Y', strtotime($analyze->patient->created_at))}}</div>
        <div class="m-3">Результат анализа: {{$analyze->predict_photo}}</div>
        <div class="m-3">Количество зубов с кариесом: {{$analyze->caries_count}}</div>
        <div class="m-3">Ссылка для скачивания: {{$analyze->predict_xml}}</div>
        <button class="btn btn-outline-danger m-3">Удалить запись</button>
    </div>

@endsection
