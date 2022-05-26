'use strict';

let btn = document.querySelector('button');

let list = document.querySelector('ol');

btn.addEventListener('click', function () {
    let input = document.querySelector('input').value;
    if (input.trim() !== '') {
        let el = document.createElement('li');
        el.innerHTML = `${input}`;
        list.append(el);
    } else alert('Ошибка! Введена пустая строка. Повторите ввод.');
});

list.addEventListener('click', function (ev) {
    ev = ev.target;
    if (ev.style.textDecoration !== 'line-through') {
        ev.style.textDecoration = 'line-through';
    } else ev.removeAttribute('style');
});