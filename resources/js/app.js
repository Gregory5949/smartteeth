require('./bootstrap');


function create_token() {
    const data = {
        name: 'Token Name',
        scopes: []
    };

    axios.post('/oauth/personal-access-tokens', data)
        .then(response => {
            $('.modal-body').html(`Не сообщайте данный токен никому, он нужен для подключения робота к анализатору.<br>
             Токен: Bearer ${response.data.accessToken}`)
        })
        .catch(response => {
            console.log(response.data);
            alert('Токен не удалось создать. Обратитесь к системному администратору.');
        });
}

$('.token').on('click', function (){
    create_token();
})

