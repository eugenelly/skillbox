'use strict'

// 1 задание
try {
  let codeJS = prompt('Введите JavaScript-код:');
  eval (codeJS);
}
catch(ex) {console.log('Возникла ошибка: ' + ex)}

// 2 задание
function filterByType() {
  let args = Array.prototype.slice.call(arguments);
  let type = args[0];

  let result = [];
  let i = 0;
  args.forEach(
    function() {
      i++;
      if (typeof(args[i]) == type) {
        result.push(args[i]);
      }
    });
  console.log(result);
}

filterByType('number', 10, 20, 'a', 'b', true, false);
filterByType('string', 10, 20, 'a', 'b', true, false);
filterByType('boolean', 10, 20, 'a', 'b', true, false);
