<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-8 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин'); ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-md-8\">{input} {label}</div>\n<div class=\"col-md-8\">{error}</div>",
        ])->label('Оставаться в системе'); ?>
        <div class="form-group">
            <div class="col-md-8 reset-pass">
                <?= Html::a('Восстановление пароля', ['site/request-password-reset']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        <div class="form-group onsignup">
            <div class="col-md-8 signup_link">
                <a href="<?= Yii::$app->getUrlManager()->createUrl(['site/signup']); ?>">Зарегистрироваться</a>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
