<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedra */

$this->title = 'Update Kafedra: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kafedras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->kafedra_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kafedra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
