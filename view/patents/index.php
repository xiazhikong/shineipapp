<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'patentID',
            'patentApplicant',
            'patentEACNumber',
            'patentApplicationCode',
            'patentType',
            // 'patentPendingEvents',
            // 'patentTitle',
            // 'patentContact',
            // 'patentNote:ntext',
            // 'patentAgent',
            // 'patentProcessManager',
            // 'clientID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
