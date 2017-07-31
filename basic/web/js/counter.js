var i = 0;  //  Временный костыль для запрета множественного одновременного запуска функции onStart
var status="none";  //  пока никак не задействована. Думаю хранить там состояние установки: работает или нет (следовательно, если один из статусов принят, то она уже включалась хотя бы раз)
var num;  //  Переменная показаний счетчика. Пришлось как глобальную объявить, чтобы у функций был к ней доступ

function onStart(){ //  Основная функция, которая запускает установку (можно сказать, это main)
  document.addEventListener('DOMContentLoaded', onDomReady);  //  нужно подгружать до функции onDomReady
  document.addEventListener('DOMContentLoaded', timerPanel);  //  нужно подгружать до функции timerPanel
  count();  //  Запуск счетчика
  randomInteger();  //  Запуск рандома для показаний температуры/влажности
  onDomReady(); //  Вывод данных температуры/влажности. В функции описал почему данный этап разбит на две функции
  timerPanel(); //  Запуск и вывод таймера
}

function count(){ //  Функция счетчика (Codepen)
  // num = parseInt(Math.random() * 100000, 10);
  num = 0;
  setTimeout(function(){
    $('.cou-item').find('ul').each(function(i, el){
      var val = pad(num, 5, 0).split("");
      var $el = $(this);
      $el.removeClass();
      $el.addClass('goto-' + val[i]);
    })
  }, 1000);

  setTimeout(function(){
    counter();
  }, 0)
}

function pad(n, width, z) { //  Функция счетчика (Codepen)
  z = z || '0';
  n = n + '';
  
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function counter() { //  Функция счетчика (Codepen)
  setInterval(function(){
    $('.cou-item').find('ul').each(function(i, el){
      num += 1;
      var val = pad(num, 5, 0).split("");
      var $el = $(this);
      $el.removeClass();
      $el.addClass('goto-' + val[i]);
    })
  }, 250);
}

// custom

//  генерирует целое значение в нужном диапозоне
function randomInteger(min, max) {
    var rand = min - 0.5 + Math.random() * (max - min + 1)
    rand = Math.round(rand);
    return rand;
}

//  выводит значение в нужное место через заданный промежуток времени. Есть смысл дописать brake или придумать другой стопор функции (она зациклена)
function onDomReady(place) {
    var place = document.getElementById('temperature'); //  к примеру, температура. В идеале нужно передавать в функцию id нужного элемента для изменения
    (function iterate(i) {
        value = randomInteger(15, 25);  //  лучше передавать эти данные в функцию с помощью доп. параметра
        timeout = randomInteger(1000, 2000);  //  рандомная задержка между выводом значения 1000...2000 мсек
        place.innerHTML = value;
        // setTimeout(function() { iterate(i + 1); }, timeout);
    })(0);
}

function timerPanel(){ //  Функция создания и вывода таймера
  var hour = 0;
  var minute = 0;
  var second = 0;
  var milsecond = 0;
  var hour_zero = '0';
  var minute_zero = '0';
  var second_zero = '0';
  var milsecond_zero = '0';
  // var place = document.getElementById('timer');
  var place_hour = document.getElementById('hour');
  var place_minute = document.getElementById('minute');
  var place_second = document.getElementById('second');
  var place_milsecond = document.getElementById('milsecond');
  (function iterate(i) {
    milsecond++;

    if(milsecond == 100){
      milsecond = 0;
      second++;
    }
    if(second == 60){
      second = 0;
      minute++;
    }
    if(minute == 60){
      minute = 0;
      hour++;
    }
    if(milsecond > 9){
      milsecond_zero = '';
    }else{
      milsecond_zero = '0';
    }
    if(second > 9){
      second_zero = '';
    }else{
      second_zero = '0';
    }
    if(minute > 9){
      minute_zero = '';
    }else{
      minute_zero = '0';
    }
    if(hour > 9){
      hour_zero = '';
    }else{
      hour_zero = '0';
    }
    // console.log(hour+' | '+minute+' | '+second+' | '+milsecond);
    place_hour.innerHTML = hour_zero+hour;
    place_minute.innerHTML = minute_zero+minute;
    place_second.innerHTML = second_zero+second;
    place_milsecond.innerHTML = milsecond_zero+milsecond;
    // place.innerHTML = hour_zero+hour+':'+minute_zero+minute+':'+second_zero+second+':'+milsecond_zero+milsecond;
    
    setTimeout(function() { iterate(i + 1); }, 10);
  })(0);
}