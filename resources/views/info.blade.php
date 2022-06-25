@extends('layouts.app')

@section('content')
    <div class="container-fluid content bg-light d-flex flex-column justify-content-around ">
        <h1 class="mt-2">О проекте</h1>
        <div class="m-3">Веб-ресурс <strong>SmartTeeth</strong> призван определить больные кариесом зубы у детей по фото ротовой полости.<br><br>
            Врачу не нужно беспокоиться об обработке фотографий: робот-помощник может отправить на сайт изображение автоматически через API и после обработки нейронной сетью результат будет доступен в личном кабинете специалиста и отправлен на e-mail родителя.<br><br>
            <strong>Стек решения:</strong> RCNN Detecto, Laravel, REST API, Bootstrap.<br><br>
            <strong>Уникальность:</strong> адаптивный веб-интерфейс для удобной работы с гаджета врача; оперативный результат в личном кабинете специалиста и на электронной почте родителя.
        </div>
        <h2 class="mt-3">Команда</h2>
        <div class=" container-fluid">
        <div class="row text-center">
            <div class="col m-3">
                <img src="/foto/s.png">
                <h4 class="mt-2">Владислав Сайфулин</h4>
                <h5>программист</h5>
            </div>
            <div class="col m-3">
                <img src="/foto/kh.png">
                <h4 class="mt-2">Даниил Хижняков</h4>
                <h5>front-end разработчик</h5>
            </div>
            <div class="col m-3">
                <img src="/foto/n.png">
                <h4 class="mt-2">Тимур Низамов</h4>
                <h5>back-end разработчик</h5>
            </div>
            <div class="col m-3">
                <img src="/foto/d.png">
                <h4 class="mt-2">Григорий Дрожащих</h4>
                <h5>аналитик данных</h5>
            </div>
        </div>
        </div>

    </div>
@endsection
