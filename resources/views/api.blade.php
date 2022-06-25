@extends('layouts.app')

@section('content')
    <div class="container-fluid content bg-light">
        <div class="m-3">
        <h2>SmartTeeth API</h2>

            <ol><h5>Роботы-помощники могут быть с легкостью подключены к SmartTeeth, если обладают возможностью выполнять HTTP-запросы.</h5>
                <li>В личном кабинете врача необходимо получить персональный токен для закрепления робота к специалисту, нажав на соответствующую кнопку.<br>Каждый токен доступен только при получении и не хранится на сервере, его следует держать в секрете.</li>
                <li>Токен передаётся в заголовке HTTP-запроса в виде "Bearer eyJ0e...".</li>
                <li>Метод POST принимает на вход изображение и уникальный идентификатор пациента.</li>


        Пример работы с POST на языке Python.<br>
        <div class="code">import requests<br>
        import base64<br>

        token = "Bearer eyJ0e..."<br>
        host = "https://smartteeth.nizamovtimur.ru"<br>

        headers = {<br>
        "Authorization" : token,<br>
        "Accept" : "text/plain",<br>
        "Content" : "application/json"<br>
        }<br>

        req = requests.post(host + "/api/analyzes", data = {"patient_id" : 1}, files = {'photo': open('test.jpg', 'rb')}, headers = headers)<br><br>
                </div>
        <li>Метод GET, принимая уникальный идентификатор анализа, если он был запущен от имени текущего врача, возвращает результаты (дата анализа, количество обнаруженных зубов, количество обнаруженных зубов с кариесом, сведения о пациенте (ФИО, дата рождения, ФИО родителя, e-mail родителя), иллюстрация анализа, XML-отчёт классификатора, иллюстрация).</li>

        Пример работы с GET на языке Python.<br>
                    <div class="code">
        import requests<br>
        import base64<br>

        token = "Bearer eyJ0e..."<br>
        host = "https://smartteeth.nizamovtimur.ru"<br>

        headers = {<br>
        "Authorization" : token,<br>
        "Accept" : "text/plain",<br>
        "Content" : "application/json"<br>
        }<br>

        req = requests.get(host + "/api/analyzes/12", headers = headers)<br>

        print(req.text)
                </div>
            </ol>
        </div>
    </div>
@endsection
