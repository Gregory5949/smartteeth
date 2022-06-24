@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
        <div class="home_buttons">
        <button class="btn btn-primary">Провести анализ</button>
        <button class="btn btn-primary">Выдать токен для робота</button>
        </div>
        <div class="list-group">
            @foreach (Auth::user()->analyzes as $analyze)
                <a class="list-group-item">
                    {{ $analyze->patient_id }}
                    {{ $analyze->predict_xml }}
                    <button class="btn btn-danger delete">Удалить анализ</button>
                </a>
            @endforeach
        </div>
    </div>
@endsection
