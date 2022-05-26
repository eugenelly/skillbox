'use strict';

let randValue = 0;
let yourValue = 0;

//Function Declaration
function randIntValue(startValue, finalValue) {
  let randValue = parseInt(Math.random() * finalValue + startValue);
  //Альтернатива parseInt():
  //Math.trunc() - усечение числа;
  //Math.floor() - округление в сторону меньшего целого числа;
  //Math.ceil() - округление в сторону большего целого числа;
  //Math.round() - округление до ближайшего целого числа.

  return randValue;
}

//Function Expression
let enterValue = function() {
  let yourValue = 0;

  while (isNaN(Number(yourValue)) || yourValue == '') {
     yourValue = prompt('Введите ваше предполагаемое число:');

     if (isNaN(Number(yourValue)) || yourValue == '') alert ('Введите число!');
   }

   return yourValue;
}

//Function Arrow
let printGameMessage = yourValue => {
  if (yourValue != null) {
      if (yourValue > randValue) alert ('Меньше!')
      else if (yourValue < randValue) alert ('Больше!')
      else alert ('Правильно!');
    }
}

//Main
randValue = randIntValue(1, 1000);
do {
  yourValue = enterValue();
  printGameMessage(yourValue);
} while (yourValue != randValue && yourValue != null);

// Без использования функций
// let randValue = parseInt(Math.random() * 1000 + 1);
// let yourValue = 0;
//
// while (yourValue != randValue && yourValue != null) {
//   yourValue = 0;
//
//   while (isNaN(Number(yourValue)) || yourValue == '') {
//     yourValue = prompt('Введите ваше предполагаемое число:');
//
//     if (isNaN(Number(yourValue)) || yourValue == '') alert ('Введите число!');
//   }
//
//   if (yourValue != null) {
//     if (yourValue > randValue) alert ('Меньше!')
//     else if (yourValue < randValue) alert ('Больше!')
//     else alert ('Правильно!');
//   }
// }
