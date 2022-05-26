'use strict';

(function() {
  window.start = () => {

    let randValue = 0;
    let yourValue = 0;
    let attempt = 0;

    //Функция генерации
    let randIntValue = (startValue, finalValue) => {
      randValue = parseInt(Math.random() * finalValue + startValue);
      return randValue;
    }

    //Функция ввода
    let enterValue = () => {
      let yourValue = 0;

      while (isNaN(Number(yourValue)) || yourValue == '') {
        yourValue = prompt('Введите ваше предполагаемое число:');

        if (isNaN(Number(yourValue)) || yourValue == '') alert('Введите число!');
      }

      return yourValue;
    }

    //Функция вывода сообщения
    let printGameMessage = yourValue => {
      if (yourValue != null) {

        if (attempt < 10) {
          if (yourValue > randValue) {
            alert('Меньше!\n(Количество попыток: ' + (++attempt) + ')');
          } else if (yourValue < randValue) {
            alert('Больше!\n(Количество попыток: ' + (++attempt) + ')');
          } else {
            alert('Правильно!');
          }
        } else {
          alert('Вы сделали больше 10 попыток. Начать заново?');
          randValue = randIntValue(1, 1000);
          attempt = 0;
        };
      }
    }

    randValue = randIntValue(1, 1000);
    do {
      yourValue = enterValue();
      printGameMessage(yourValue);
    } while (yourValue != randValue && yourValue != null);

  }
})();
