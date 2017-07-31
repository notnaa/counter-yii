<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестирования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Добавить тест', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'test_id',
                'label'=>'Номер теста',
            ],
            [
                'attribute'=>'user_id',
                'label'=>'Группа',
                'value' => 'user.group',
            ],
            [
                'attribute'=>'user_id',
                'label'=>'Фамилия',
                'value' => 'user.lastname',
            ],
            [
                'attribute'=>'user_id',
                'label'=>'Имя',
                'value' => 'user.name',
            ],
            [
                'attribute'=>'user_id',
                'label'=>'Отчество',
                'value' => 'user.thirdname',
            ],
            [
                'attribute'=>'results',
                'label'=>'Результат',
            ],
            [
                'attribute'=>'created_at',
                'label'=>'Дата прохождения',
                'format' =>  ['date', 'HH:mm:ss dd.MM.Y'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}{link}',],
        ],
    ]); ?>
</div>
