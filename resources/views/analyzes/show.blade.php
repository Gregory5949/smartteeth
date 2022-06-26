@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
        <div class="bg-light m-2 p-2 show_predict">
            <div class="user-select-none m-3"><strong>Результат анализа:</strong><img src="{{$analyze->predict_photo}}"  style="float: right; height:256px"></div>
            <div class="user-select-none m-3"><strong>ФИО:</strong> {{$analyze->patient->name}}</div>
            <div class="user-select-none m-3"><strong>Дата анализа:</strong> {{ date('d.m.Y H:i:s', strtotime($analyze->created_at))}}</div>
            <div class="user-select-none m-3"><strong>Количество распознанных зубов:</strong> {{$analyze->count}}</div>
            <div class="user-select-none m-3"><strong>Количество зубов с кариесом:</strong> {{$analyze->caries_count}}</div>

        @if ($analyze->user_id == Auth::id())
            <form class="d-inline" action="{{ route('analyzes.destroy', $analyze->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger m-3">Архивировать</button>
            </form>
        @endif
    </div>


    </div>

@endsection
