"use strict";

let myFirstName = prompt('Как ваше имя?');
let myLastName = prompt('Как ваша фамилия?');
let myFullName = myLastName + ' ' + myFirstName;
let myBirthYear = prompt('Введите ваш год рождения');

let currentYear = new Date().getFullYear();
let age = currentYear - myBirthYear;

if (age < 20) {
  alert('Привет, ' + myFullName + '!');
}
else if (age >= 20 && age < 40) {
  alert('Добрый день, ' + myFullName + '!');
}
else {
  alert('Здравствуйте, ' + myFullName + '!');
}
