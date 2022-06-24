@extends('layouts.app')

@section('content')
    <div class="container-fluid content">
        <div>
            <form enctype="multipart/form-data" method="post">
                <h1>Загрузка</h1>
                <input type="file" id="file-uploader" multiple accept="image/*,image/jpeg">
                <input type="submit" value="Отправить">
            </form>
        </div>
        <div id="feedback">

        </div>
    </div>
@endsection
