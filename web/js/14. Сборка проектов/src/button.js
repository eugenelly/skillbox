'use strict';

import 'button.css';

let btn = document.querySelector('.btn');
let num_clicks = document.querySelector('.num_clicks');

let num = 0;
btn.addEventListener('click', () => {
    num_clicks.textContent = String(++num);
});