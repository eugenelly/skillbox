'use strict';

let randValue = 0;
let yourValue = 0;

// Практика стрелочный функций
let randIntValue = (startValue, finalValue) => {
  randValue = parseInt(Math.random() * finalValue + startValue);

  return randValue;
}

let enterValue = () => {
  yourValue = prompt('Введите ваше предполагаемое число:');

  if (isNaN(Number(yourValue)) || yourValue == '') {
    alert ('Введите число!');
    enterValue();
  }

  return yourValue;
}

let printGameMessage = yourValue => {
  if (yourValue != null) {
      if (yourValue > randValue) alert ('Меньше!')
      else if (yourValue < randValue) alert ('Больше!')
      else alert ('Правильно!');
    }
}

let cycleRecursion = () => {
  yourValue = enterValue();
  printGameMessage(yourValue);

  if ((yourValue != randValue && yourValue != null)) cycleRecursion();
}

//Main
randValue = randIntValue(1, 1000);
cycleRecursion();
