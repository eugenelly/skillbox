'use strict'

let users = [{
    name: 'Евгений',
    login: 'eugene',
    password: 'qwerty'
  },
  {
    name: 'Ангелина',
    login: 'gelia',
    password: 'ytrewq'
  },
  {
    name: 'Илья',
    login: 'ilya',
    password: 'hgfdsa'
  }
]

let login = '';
let password = '';
let i = 0;
let success = false;

while ((login != null && password != null) && success == false) {
  login = '';
  password = '';

  while (login == '') login = prompt('Логин:');
  while (login != null && password == '') password = prompt('Пароль:');

  for (let prop in users) {
    if (users.hasOwnProperty(prop)) {
      if (login == users[prop]['login'] && password == users[prop]['password']) {
        alert('Здравствуйте, ' + users[prop]['name']);
        success = true;
        break;
      } else if (login != null && password != null) {
        alert('Ошибка авторизации');
        break;
      }
    }
  }
}
