'use strict';

let text = document.querySelector('#edit');

if (localStorage.getItem('text')) text.innerHTML = localStorage.getItem('text')
else localStorage.setItem('text', text.innerText);

let btn_edit = document.querySelector('#btn_edit');
let btn_save = document.querySelector('#btn_save');
let btn_cancel = document.querySelector('#btn_cancel');

let triggerBtn = () => {
    if (btn_edit.getAttribute('disabled') === null) {
        text.setAttribute('contenteditable', 'true');
        btn_edit.setAttribute('disabled', '');
        btn_save.removeAttribute('disabled');
        btn_cancel.removeAttribute('disabled');
    } else {
        text.setAttribute('contenteditable', 'false');
        btn_edit.removeAttribute('disabled');
        btn_save.setAttribute('disabled', '');
        btn_cancel.setAttribute('disabled', '');
    }
}

btn_edit.addEventListener('click', function () {
    triggerBtn();
});

btn_save.addEventListener('click', function () {
    triggerBtn();
    localStorage.setItem('text', text.innerText);
});

btn_cancel.addEventListener('click', function () {
    triggerBtn();
    text.innerHTML = localStorage.getItem('text');
});
	
