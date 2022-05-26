'use strict';

let startYear, finishYear;
let leapYear;

while (isNaN(Number(startYear))) {
    startYear = prompt('Введите начальный год:\n(по умолчанию 1900)');
    if (startYear === '') startYear = 1900;
}

while (isNaN(Number(finishYear)) && startYear != null) {
  finishYear = prompt('Введите конечный число:\n(по умолчанию 2016)');
  if (finishYear === '') finishYear = 2016;
}

if (startYear != null && finishYear != null) {
  startYear = Number(startYear);
  finishYear = Number(finishYear);

  if (startYear > finishYear){
    startYear -= finishYear;
    finishYear += startYear;
    startYear = finishYear - startYear;
  }

  console.log('Список всех високосных годов начиная с ' + startYear + 'г. и заканчивая ' + finishYear + 'г.:');

  for (let i = startYear; i <= finishYear; i++) {
    if (i % 4 === 0) {
      leapYear = i;
      console.log(leapYear);
    }
  }
}
