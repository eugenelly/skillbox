'use strict';

let date = new Date();
let dateText = '';

let user = new User('', '');

let fullName = '';

let firstName = '';
let lastName = '';

let UserList = {
  users: [],
  add: function(user) {
    this.users.push(user.firstName + ' ' + user.lastName + ' ' + user.regDate);
  },
  getAllUsers: function() {
    for (let i = 0; i < this.users.length; i++) {
      console.log(this.users[i]);
    }
  }
}

function User(firstName, lastName) {
  this.firstName = firstName;
  this.lastName = lastName;
  this.regDate = (() => {
    date = new Date();
    dateText = date.getDate() + '.' +
               date.getMonth() + '.' +
               date.getFullYear() + ' ' +
               date.getHours() + ':' +
               date.getMinutes();
    return dateText;
  })();
}

let enterValue = () => {
  fullName = prompt('Имя и фамилия пользователя:\n(через пробел)');
  if (fullName != null) {
    fullName = fullName.trim();
    if (fullName.split(' ').length == 2) {
      fullName = fullName.split(' ');
      firstName = fullName[0];
      lastName = fullName[1];
      user = new User(firstName, lastName);
      UserList.add(user);
    } else alert('Некорректный ввод');
    fullName = '';
  }
}

while (fullName != null) {
  while (fullName == '') {
    enterValue();
  }
}

if (UserList.users.length != 0) {
  UserList.getAllUsers();
}
