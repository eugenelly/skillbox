'use strict';

let a, i, sum, sumText;

a = '';
i = 0;
sum = null;

while (a != null) {
  a = '';
  i++;

  while (isNaN(Number(a)) || a === '') {
    a = prompt('Введите ' + i + '-e число:');
  }

 if (a != null) {
   sum += Number(a);

   if (i === 1) sumText = a
   else if (a != null) sumText += '+' + a;
 }
}

if (sum == null) alert ('Не введено ни одного числа')
else if (i === 2) alert ('Введенно только одно число ('+ sumText + ')')
else alert ('Сумма всех введенных чисел (' + sumText + ') равна: ' + sum);
