<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatenteventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patentevents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patentevents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patentevents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eventID',
            'eventAbstract',
            'eventContent:ntext',
            'eventNote:ntext',
            'eventFileLinks:ntext',
            // 'patentID',
            // 'eventCreatedDatetime',
            // 'eventDeadline',
            // 'eventCreator',
            // 'eventSatus',
            // 'eventSatusUpdatedDatetime',
            // 'eventSatusUpdatedByWho',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
