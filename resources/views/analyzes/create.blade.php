@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
        <h1 class="m-3 f-">Загрузка фото для анализа</h1>
        <div class="m-3">
            <form class="input-group" enctype="multipart/form-data" method="post">
                <input type="file" id="file-uploader" accept="image/*,image/jpeg">
                <input type="text">
                <input class="btn btn-info" type="submit" value="Отправить">
            </form>
        </div>
        <div id="feedback">

        </div>
    </div>
@endsection
