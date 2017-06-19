<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patentevents */

$this->title = $model->eventID;
$this->params['breadcrumbs'][] = ['label' => 'Patentevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patentevents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->eventID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->eventID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eventID',
            'eventAbstract',
            'eventContent:ntext',
            'eventNote:ntext',
            'eventFileLinks:ntext',
            'patentID',
            'eventCreatedDatetime',
            'eventDeadline',
            'eventCreator',
            'eventSatus',
            'eventSatusUpdatedDatetime',
            'eventSatusUpdatedByWho',
        ],
    ]) ?>

</div>
