@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
                @foreach (Auth::user()->analyzes as $analyze)
                    <div>{{ $analyze->user_id }}</div>
                @endforeach
    </div>
@endsection
