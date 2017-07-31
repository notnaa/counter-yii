<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = 'Результат тестирования №'.$model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Результаты тестирования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->test_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->test_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'test_id',
            'group.group_name',
            'user.lastname',
            'user.name',
            'user.thirdname',
            'results',
            [
                    'attribute' => 'created_at',
                    'format' =>  ['date', 'HH:mm:ss dd.MM.Y']
            ],
        ],
    ]) ?>

</div>
