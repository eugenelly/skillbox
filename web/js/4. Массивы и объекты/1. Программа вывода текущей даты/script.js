'use strict';

let date;

let day = [
  'воскресенье',
  'понедельник',
  'вторник',
  'среда',
  'четверг',
  'пятница',
  'суббота'
];
let month = [
  'января',
  'февраля',
  'марта',
  'апреля',
  'мая',
  'июня',
  'июля',
  'августа',
  'сентября',
  'октября',
  'ноября',
  'декабря'
];

let printTime = () => {
  let time = [
    date.getHours(),
    date.getMinutes(),
    date.getSeconds()
  ];

  let timeText = '';

  for (let i = 0; i < time.length; i++) {

    timeText += time[i];

    if (time[i] >= 11 && time[i] <= 14) {
      if (i == 0) timeText += ' часов'
      else if (i == 1) timeText += ' минут'
      else timeText += ' секунд';
    } else if (String(time[i])[String(time[i]).length - 1] == '1') {
      if (i == 0) timeText += ' час'
      else if (i == 1) timeText += ' минута'
      else timeText += ' секунда';
    } else if (String(time[i])[String(time[i]).length - 1] >= '2' &&
               String(time[i])[String(time[i]).length - 1] <= '4') {
      if (i == 0) timeText += ' часа'
      else if (i == 1) timeText += ' минуты'
      else timeText += ' секунды';
    } else {
      if (i == 0) timeText += ' часов'
      else if (i == 1) timeText += ' минут'
      else timeText += ' секунд';
    }
    if (i != 2) timeText += ', ';
  }
  return timeText;
}

let printMessage = () => {
  date = new Date();
  let dateFull = date.getDate() + ' ' +
      month[date.getMonth()] + ' ' +
      date.getFullYear() + ' года, ' +
      day[date.getDay()] + ', ' +
      printTime();
  console.log ('Сегодня ' + dateFull);
}

//Main
let timer = setInterval(() => printMessage(),1000);
