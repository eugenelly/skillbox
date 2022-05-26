'use strict';

window.onload = function () {

    // Создаем объект XMLHttpRequest, при помощи которого будем отправлять запрос
    let req = new XMLHttpRequest();

    // Сохраняем ключ API, полученный со страницы https://tech.yandex.ru/keys/get/?service=trnsl
    // (с примером ниже работать не будет, нужно получить и вставить свой!)
    let API_KEY = 'trnsl.1.1.20200422T123553Z.dfceedf16d26b199.e6453a255a21f6f7dfcb39835a7be55f68027982';

    let url = '';

    let inputText = '';
    let btnTranslate = document.querySelector('button')
    let translate = '';
    let response = '';

    btnTranslate.addEventListener('click', function () {

        inputText = document.querySelector('input').value;
        translate = document.querySelector('.translate');

        url = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
        url += '?key=' + API_KEY; // добавляем к запросу ключ API
        url += '&text=' + inputText; // текст для перевода
        url += '&lang=ru-en'; // направление перевода: с русского на английский

        // Назначаем обработчик события load
        req.addEventListener('load', function () {
            response = JSON.parse(req.response); // парсим его из JSON-строки в JavaScript-объект

            // Проверяем статус-код, который прислал сервер
            // 200 — это ОК, остальные — ошибка или что-то другое
            if (response.code !== 200) {
                translate.innerHTML = 'Произошла ошибка при получении ответа от сервера:\n\n' + response.message;
                return;
            }

            // Проверяем, найден ли перевод для данного слова
            if (response.text.length === 0) {
                translate.innerHTML = 'К сожалению, перевод для данного слова не найден';
                return;
            }

            // Если все в порядке, то отображаем перевод на странице
            translate.innerHTML = 'Перевод: ' + response.text.join('<br>'); // вставляем его на страницу
        });

        // Обработчик готов, можно отправлять запрос
        // Открываем соединение и отправляем
        req.open('get', url);
        req.send();
    });
}