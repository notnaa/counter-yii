<?php

/* @var $this yii\web\View */

$this->title = 'Тренажер поверки газового счетчика';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="col-md-4 gas-meter">
        <div class="odometer">
            <ul class="digits">
                <li class="digit" style="border-left: 0px solid #1c3c50 !important;">
          <span class="cou-item cou-item-anim">
            <ul>
              <li>0</li>
              <li>0</li>
              <li>1</li>
              <li>2</li>
              <li>3</li>
              <li>4</li>
              <li>5</li>
              <li>6</li>
              <li>7</li>
              <li>8</li>
              <li>9</li>
              <li>0</li>
            </ul>
          </span>
                </li>
                <li class="digit">
          <span class="cou-item">
            <ul>
              <li>0</li>
              <li>0</li>
              <li>1</li>
              <li>2</li>
              <li>3</li>
              <li>4</li>
              <li>5</li>
              <li>6</li>
              <li>7</li>
              <li>8</li>
              <li>9</li>
              <li>0</li>
            </ul>
          </span>
                </li>
                <li class="digit">
          <span class="cou-item">
            <ul>
              <li>0</li>
              <li>0</li>
              <li>1</li>
              <li>2</li>
              <li>3</li>
              <li>4</li>
              <li>5</li>
              <li>6</li>
              <li>7</li>
              <li>8</li>
              <li>9</li>
              <li>0</li>
            </ul>
          </span>
                </li>
                <li class="digit">
          <span class="cou-item">
            <ul>
              <li>0</li>
              <li>0</li>
              <li>1</li>
              <li>2</li>
              <li>3</li>
              <li>4</li>
              <li>5</li>
              <li>6</li>
              <li>7</li>
              <li>8</li>
              <li>9</li>
              <li>0</li>
            </ul>
          </span>
                </li>
                <li class="digit">
          <span class="cou-item">
            <ul>
              <li>0</li>
              <li>0</li>
              <li>1</li>
              <li>2</li>
              <li>3</li>
              <li>4</li>
              <li>5</li>
              <li>6</li>
              <li>7</li>
              <li>8</li>
              <li>9</li>
              <li>0</li>
            </ul>
          </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="scheme-device">
            <div  class="popup" onclick="myFunction()">
                <img class="rotate" src="img/circle-animate.png">
                <span class="popuptext" id="myPopup">A Simple Popup!</span>
            </div>
        </div>
    </div>
    <div class="col-md-8 on-start">
        <button class="start" id="start">Запуск</button>
    </div>
    <div class="col-md-8 panel">
        <div class="panel-use">
            <div class="indication-1">
          <span id="temperature">
            0
          </span>
            </div>
            <div class="indication-2">
          <span id="chastota">
            0
          </span>
            </div>
            <div class="indication-3">
          <span id="davlenie">
            2206
          </span>
            </div>
            <div class="indication-4">
          <span id="timer">
            <span id="hour">00</span>:<span id="minute">00</span>:<span id="second">00</span>:<span id="milsecond">00</span>
          </span>
            </div>
            <div class="indication-5">
          <span id="zadvijka">
            49.7
          </span>
            </div>
            <div class="indication-6">
          <span id="vakuum">
            24.07
          </span>
            </div>
        </div>
    </div>
</div>
<!--<script>-->
<!--    // When the user clicks on div, open the popup-->
<!--    // function myFunction() {-->
<!--    //     var popup = document.getElementById("myPopup");-->
<!--    //     popup.classList.toggle("show");-->
<!--    // }-->
<!--</script>-->

<?php
$script = <<< JS
    document.getElementById('start').onclick = function() {
        if (i == 0){
            onStart();
            i++;
        }
    }
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
<!--     var i = 0;-->
<!--       if (i == 0){-->
<!--         var script = document.createElement('script');-->
<!--         script.src = "js/counter.js";-->
<!--         document.getElementsByTagName('head')[0].appendChild(script);-->
<!--       }-->
<!--     i++;-->
<!--     onStart();-->
<!--     }-->