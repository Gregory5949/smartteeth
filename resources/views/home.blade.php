@extends('layouts.app')

@section('content')
    <div class="container-fluid content">

        <div class="alert alert-success" role="alert">
            @if ($message = Session::get('success'))
            {{ $message }}
            @endif
        </div>

        <div class="container-fluid d-lg-flex flex-row home_nav">
        <button class="btn btn-info m-3" onclick="window.location.href='/analyzes/create'">Провести анализ</button>
        <button class="btn btn-info m-3" onclick="create_token()">Выдать токен для робота</button>

        <div class="input-group m-3 d-flex w-auto">
            <input type="search" id="form1" class="form-control d-block" placeholder="Поиск по ФИО"/>
            <button type="button" class="btn btn-info search">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </button>
        </div>
        </div>


        <div class="list-group m-3 list_pat">
            @foreach (Auth::user()->analyzes as $analyze)
                <a href="#" class="list-group-item d-flex flex-column justify-content-end">
                    ФИО: {{ $analyze->patient->name }},
                    Дата рождения: {{ $analyze->patient->date_of_birth }}
                    {{ $analyze->created_at }}
                    <button class="btn btn-outline-danger btn-sm delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </a>
            @endforeach
            </div>
    </div>

    <script>
        function create_token() {
            const data = {
                name: 'Token Name',
                scopes: []
            };

            axios.post('/oauth/personal-access-tokens', data)
                .then(response => {
                    console.log(response.data.accessToken);
                    alert('Токен создан');
                    jw = document.getElementsByClassName('alert')[0];
                    jw.innerHTML = `<p><b>Не сообщайте данный токен никому, он нужен для подключения робота к анализатору.</b><br>
                    Токен: <i>Bearer ${response.data.accessToken}</i></p>`;
                })
                .catch(response => {
                    console.log(response.data);
                    alert('Токен не удалось создать');
                });
        }
    </script>
@endsection
