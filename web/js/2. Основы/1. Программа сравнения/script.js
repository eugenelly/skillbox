'use strict';

let a, b;

//isFinite - проверка на число
while (isNaN(Number(a)) || a === '') a = prompt('Введите первое число:');
while ((isNaN(Number(b)) || b === '') && a != null) b = prompt('Введите второе число:');

if (a != null && b != null) {
    if (a > b) alert('Первое число больше второго (' + a + ' > ' + b + ')');
    else if (a < b) alert('Второе число больше первого (' + a + ' < ' + b + ')');
    else if (a === b) alert('Числа равны (' + a + ' = ' + b + ')');
}
