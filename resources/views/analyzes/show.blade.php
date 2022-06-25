@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
        <div class="m-3">ФИО: {{$analyze->patient->name}}</div>
        <div class="m-3">Дата анализа: {{ date('d.m.Y', strtotime($analyze->created_at))}}</div>
        <div class="m-3">Результат анализа: {{$analyze->predict_photo}}</div>
        <div class="m-3">Количество зубов с кариесом: {{$analyze->caries_count}}</div>
        <div class="m-3">Ссылка для скачивания: {{$analyze->predict_xml}}</div>
        @if ($analyze->user_id == Auth::id())
            <form class="d-inline" action="{{ route('analyzes.destroy', $analyze->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger m-3">Удалить запись</button>
            </form>
        @endif


    </div>

@endsection
