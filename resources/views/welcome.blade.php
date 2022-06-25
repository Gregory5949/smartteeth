@extends('layouts.app')

@section('content')
    <div class="container-fluid content d-flex flex-row">
        <div class="info m-4">
            <h1 class="m-3 user-select-none">SmartTeeth: на страже зубов</h1>
            <h4 class="m-3 user-select-none">Интеллектуальная технология распознавания стоматологических заболеваний у детей</h4>
            <button class="btn btn-info m-3 to_analysis" type="button" onclick="window.location.href='/home'">Начать диагностику</button>
        </div>
        <img src="foto/5507734.svg" class="img-fluid d-none d-lg-block  teeth">
    </div>
@endsection

