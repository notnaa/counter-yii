<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация нового пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-8">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'lastname')->label('Фамилия'); ?>
            <?= $form->field($model, 'name')->label('Имя'); ?>
            <?= $form->field($model, 'thirdname')->label('Отчество'); ?>
            <?= $form->field($model, 'group')->label('Номер группы')->dropDownList([
                '0' => 'У-134',
                '1' => 'У-133',
                '2' => 'А-155',
            ]);
            ?>
            <?= $form->field($model, 'username')->label('Логин'); ?>
            <?= $form->field($model, 'email')->label('Email'); ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>