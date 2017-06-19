<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patentevents */

$this->title = 'Update Patentevents: ' . $model->eventID;
$this->params['breadcrumbs'][] = ['label' => 'Patentevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventID, 'url' => ['view', 'id' => $model->eventID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patentevents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
